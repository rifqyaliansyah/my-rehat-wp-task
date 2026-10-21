document.addEventListener('DOMContentLoaded', function () {
  var mainSearch = document.getElementById('main-search');
  var searchBox = document.getElementById('search-box');
  var category = document.getElementById('category');
  var cards = document.querySelectorAll('.trail-card');
  var emptyMsg = document.getElementById('trails-no-results');
  var bookingForm = document.getElementById('booking-form');
  var totalEl = document.getElementById('trails-total');
  var confirmation = document.getElementById('trails-confirmation');
  var planInputs = document.querySelectorAll('input[name="plan"]');

  var DAILY_RATE = 350;
  var MONTHLY_TOTAL = (DAILY_RATE * 30 * 80) / 100;

  function applyFilter() {
    var q = searchBox.value.trim().toLowerCase();
    var cat = category.value;
    var shown = 0;

    cards.forEach(function (card) {
      var matchText = card.textContent.toLowerCase().includes(q);
      var matchCategory = cat === 'all' || card.dataset.category === cat;
      var visible = matchText && matchCategory;
      card.style.display = visible ? '' : 'none';
      if (visible) shown++;
    });

    emptyMsg.hidden = shown > 0;
  }

  function formatRM(value) {
    return 'RM ' + value.toLocaleString('en-US');
  }

  function updateTotal() {
    var selected = bookingForm.querySelector('input[name="plan"]:checked');
    var total = selected && selected.value === 'monthly' ? MONTHLY_TOTAL : DAILY_RATE;
    totalEl.textContent = 'Total: ' + formatRM(total);
  }

  function showMessage(text) {
    confirmation.textContent = text;
    confirmation.hidden = false;
  }

  mainSearch.addEventListener('input', function () {
    searchBox.value = mainSearch.value;
    applyFilter();
  });

  searchBox.addEventListener('input', function () {
    mainSearch.value = searchBox.value;
    applyFilter();
  });

  category.addEventListener('change', applyFilter);

  planInputs.forEach(function (radio) {
    radio.addEventListener('change', updateTotal);
  });

  bookingForm.addEventListener('submit', function (e) {
    e.preventDefault();
    confirmation.hidden = true;

    fetch(window.location.href, {
      method: 'POST',
      body: new FormData(bookingForm),
      credentials: 'same-origin'
    })
      .then(function (response) {
        return response.json();
      })
      .then(function (result) {
        if (result.success) {
          showMessage('Thank you, ' + result.data.name + '! Your booking request has been received. We will contact you soon.');
          bookingForm.reset();
          updateTotal();
        } else {
          showMessage(result.data && result.data.message ? result.data.message : 'Something went wrong. Please try again.');
        }
      })
      .catch(function () {
        showMessage('Something went wrong. Please try again.');
      });
  });

  updateTotal();
});