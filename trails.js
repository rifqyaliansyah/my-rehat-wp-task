document.addEventListener('DOMContentLoaded', function () {
  var mainSearch = document.getElementById('main-search');
  var searchBox = document.getElementById('search-box');
  var category = document.getElementById('category');
  var cards = document.querySelectorAll('.trail-card');
  var emptyMsg = document.getElementById('trails-no-results');
  var bookingForm = document.getElementById('booking-form');

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

  mainSearch.addEventListener('input', function () {
    searchBox.value = mainSearch.value;
    applyFilter();
  });

  searchBox.addEventListener('input', function () {
    mainSearch.value = searchBox.value;
    applyFilter();
  });

  category.addEventListener('change', applyFilter);

  bookingForm.addEventListener('submit', function (e) {
    e.preventDefault();
    alert('Booking request received!');
  });
});