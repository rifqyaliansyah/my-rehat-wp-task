<?php
/* Template Name: Trails Test Page */
get_header();
?>
<div class="contact-bar">
  <a class="contact-wa" href="https://wa.me/60123456789" target="_blank" rel="noopener noreferrer">WhatsApp</a>
  <a class="contact-line" href="https://line.me/ti/p/~myrehat" target="_blank" rel="noopener noreferrer">LINE</a>
</div>

<header class="site-header-trails">
  <h1>Tropic Hiking Trails</h1>
  <p>Find your next trail with MyRehat</p>
  <input id="main-search" type="text" placeholder="Search homepage...">
</header>

<div class="trails-promo">
  <strong>Limited offer:</strong> 20% off all guided hikes this month.
</div>

<main class="trails-main">
  <div class="trails-search-row">
    <input id="search-box" type="text" placeholder="Search trails...">
    <select id="category">
      <option value="all">All categories</option>
      <option value="mountain">Mountain</option>
      <option value="beach">Beach</option>
      <option value="forest">Forest</option>
    </select>
  </div>
  <p id="trails-no-results" hidden>No trails found.</p>

  <div class="trails-cards">
    <article class="trail-card" data-category="mountain">
      <h3>Mount Rinjani Sunrise</h3>
      <p>2-day guided summit trek, Lombok.</p>
      <span class="price">RM 350 / pax</span>
    </article>
    <article class="trail-card" data-category="beach">
      <h3>Pulau Perhentian Coastal Walk</h3>
      <p>Easy coastal trail, Terengganu.</p>
      <span class="price">RM 120 / pax</span>
    </article>
    <article class="trail-card" data-category="forest">
      <h3>Taman Negara Canopy Trail</h3>
      <p>Rainforest walk, Pahang.</p>
      <span class="price">RM 180 / pax</span>
    </article>
    <article class="trail-card" data-category="mountain">
      <h3>Mount Kinabalu Base Trek</h3>
      <p>Highland trek, Sabah.</p>
      <span class="price">RM 420 / pax</span>
    </article>
    <article class="trail-card" data-category="beach">
      <h3>Langkawi Sunset Ridge</h3>
      <p>Evening ridge walk, Kedah.</p>
      <span class="price">RM 95 / pax</span>
    </article>
    <article class="trail-card" data-category="forest">
      <h3>Belum Mossy Forest</h3>
      <p>Misty forest trail, Perak.</p>
      <span class="price">RM 150 / pax</span>
    </article>
  </div>

  <section class="trails-booking">
    <h2><?php echo esc_html(myrehat_test_booking_title()); ?></h2>
    <form id="booking-form" method="post">
      <?php wp_nonce_field('trails_booking_action', 'trails_nonce', false); ?>
      <input type="hidden" name="trails_booking" value="1">

      <label>Name <input type="text" name="name" required></label>
      <label>Date <input type="date" name="date" required></label>

      <fieldset>
        <legend>Digital Nomad?</legend>
        <label><input type="radio" name="digital_nomad" value="yes" required> Ya</label>
        <label><input type="radio" name="digital_nomad" value="no" required> Tidak</label>
      </fieldset>

      <fieldset>
        <legend>Plan</legend>
        <label><input type="radio" name="plan" value="daily" checked> Daily</label>
        <label><input type="radio" name="plan" value="monthly"> Monthly</label>
      </fieldset>

      <p id="trails-total">Total: RM 350</p>

      <label><input type="checkbox" name="host_terms" value="1" required> I agree to the Host Terms</label>

      <button type="submit">Request booking</button>
    </form>
    <div id="trails-confirmation" hidden></div>
  </section>
</main>

<footer class="trails-footer">
  <nav>
    <a href="#">FAQ</a>
    <a href="#">Contact Us</a>
    <a href="#">PDPA</a>
    <a href="#">Privacy Policy</a>
    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">Facebook</a>
    <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer">LinkedIn</a>
    <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">Instagram</a>
    <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer">TikTok</a>
    <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer">YouTube</a>
  </nav>
  <p>&copy; 2026 MyRehat</p>
</footer>
<?php get_footer(); ?>