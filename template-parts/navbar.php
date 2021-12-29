<div class="container mx-auto px-1 sm:px-5 flex justify-between parent-wrapper">
  <a class="home_icon" href="<?php echo home_url() ?>">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
      <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z" />
    </svg>
  </a>
  <?php
  $term_id = get_queried_object_id();
  if (get_queried_object()) {
    $term_name = get_queried_object()->name;
  } else {
    $term_name = '';
  }
  // if (is_front_page() || term_exists($term_id, 'store_type')) {
  // Get All Taxonomies
  $tax = get_terms(array(
    'taxonomy' => 'store_type',
    'hide_empty' => false
  ));
  ?>
  <div class="cat-dropdown">
    <input id="cat_input" type="text" class="textBox" placeholder="<?php echo $term_name ?  $term_name : 'Catagories' ?>" readonly />
    <div class="option">
      <?php if ($tax) {
        foreach ($tax as $t) {
          $the_term_link = get_term_link($t->term_id, 'store_type');
      ?>

          <div onclick="show('<?php echo $t->name ?>', '<?php echo $the_term_link ?>')" href="<?php echo $the_term_link ?>">
            <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" />
            </svg><?php echo $t->name ?>
          </div>
      <?php }
      } ?>
    </div>
  </div>
  <?php // } 
  ?>
  <nav class="nav-mobile">
    <div class="menu-wrapper">
      <ul class="menu-bar">
        <li class="menu-title">
          <a href="#">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M464 480H48c-26.51 0-48-21.49-48-48V80c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v352c0 26.51-21.49 48-48 48zM128 120c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm0 96c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zm288-136v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12zm0 96v-32c0-6.627-5.373-12-12-12H204c-6.627 0-12 5.373-12 12v32c0 6.627 5.373 12 12 12h200c6.627 0 12-5.373 12-12z" />
              </svg>
            </div>
            Menu
          </a>
        </li>
        <li class="groceries-list">
          <a href="#">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                <path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z" />
              </svg>
            </div>
            Groceries <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
              <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
            </svg>
          </a>
        </li>
        <li class="electronics-list">
          <a href="#">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                <path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z" />
              </svg>
            </div>
            Electronics <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
              <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
            </svg>
          </a>
        </li>

        <li class="home-list">
          <a href="#">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                <path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z" />
              </svg>
            </div>
            Home & Garden <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
              <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
            </svg>
          </a>
        </li>
        <li class="clothing-list">
          <a href="#">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                <path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z" />
              </svg>
            </div>
            Clothing <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
              <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
            </svg>
          </a>
        </li>
        <li class="health-list">
          <a href="#">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                <path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z" />
              </svg>
            </div>
            Health & Beauty <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
              <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
            </svg>
          </a>
        </li>
        <li class="vehicles-list">
          <a href="#">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                <path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z" />
              </svg>
            </div>
            Vehicles <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
              <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
            </svg>
          </a>
        </li>
        <li class="other-list">
          <a href="#">
            <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">

                <path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z" />
              </svg>
            </div>
            Other <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
              <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z" />
            </svg>
          </a>
        </li>
      </ul>
      <!-- Groceries list -->
      <ul class="groceries-drop children-drops">
        <li class="arrow back-groceries-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg>Back
        </li>
        <li><a href="/bluff-meat-supply/">Bluff Meat Supply</a></li>
        <li><a href="/boxer/">Boxer</a></li>
        <li><a href="/cambridge-foods/">Cambridge Foods</a></li>
        <li><a href="/checkers/">Checkers</a></li>
        <li><a href="/food-lovers-market/">Food Lover's Market</a></li>
        <li>
          <a href="/kit-kat-cash-carry/">KIT KAT Cash &amp; Carry</a>
        </li>
        <li><a href="/kwikspar/">KWIKSPAR</a></li>
        <li><a href="/makro/">Makro</a></li>
        <li><a href="/ok-foods/">OK Foods</a></li>
        <li><a href="/oxford-freshmarket/">Oxford Freshmarket</a></li>
        <li><a href="/pick-n-pay/">Pick n Pay</a></li>
        <li><a href="/president-hyper/">President Hyper</a></li>
        <li><a href="/shoprite/">Shoprite</a></li>
        <li><a href="/spar/">Spar</a></li>
        <li><a href="/superspar/">Superspar</a></li>
        <li><a href="/take-n-pay/">Take n Pay</a></li>
        <li><a href="/ultra-liquors/">Ultra Liquors</a></li>
        <li><a href="/woolworths/">Woolworths</a></li>
      </ul>
      <!-- Electronics list -->
      <ul class="electronics-drop children-drops">
        <li class="arrow back-electronics-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg>Back
        </li>
        <li><a href="/bt-games/">BT Games</a></li>
        <li><a href="/cash-crusaders/">Cash Crusaders</a></li>
        <li><a href="/cell-c/">Cell C</a></li>
        <li><a href="/dion-wired/">Dion Wired</a></li>
        <li><a href="/game/">Game</a></li>
        <li><a href="/matrix-warehouse/">Matrix Warehouse</a></li>
        <li><a href="/mtn/">MTN</a></li>
        <li><a href="/teljoy/">Teljoy</a></li>
        <li><a href="/telkom/">Telkom</a></li>
        <li><a href="/vodacom/">Vodacom</a></li>
      </ul>
      <!-- Home & Garden list -->
      <ul class="home-drop children-drops">
        <li class="arrow back-home-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg>Back
        </li>
        <li><a href="/agrimark/">Agrimark</a></li>
        <li><a href="/bradlows/">Bradlows</a></li>
        <li><a href="/build-it/">Build It</a></li>
        <li><a href="/builders/">Builders</a></li>
        <li><a href="/cashbuild/">Cashbuild</a></li>
        <li><a href="/coricraft/">Coricraft</a></li>
        <li><a href="/ctm/">CTM</a></li>
        <li><a href="/decofurn/">Decofurn</a></li>
        <li><a href="/dial-a-bed/">Dial-a-Bed</a></li>
        <li>
          <a href="/every-body-wants-that/">Every Body Wants That</a>
        </li>
        <li><a href="/fair-price/">Fair Price</a></li>
        <li><a href="/house-and-home/">House and Home</a></li>
        <li><a href="/k-carrim/">K. Carrim</a></li>
        <li><a href="/lewis-stores/">Lewis Stores</a></li>
        <li><a href="/mrp-home/">MRP Home</a></li>
        <li><a href="/ok-furniture/">OK Furniture</a></li>
        <li><a href="/russels/">Russels</a></li>
        <li><a href="/schulmans-home/">Schulman's Home</a></li>
        <li><a href="/sheet-street/">Sheet Street</a></li>
        <li><a href="/tafelberg-furnishers/">Tafelberg Furnishers</a></li>
      </ul>
      <!-- clothing list -->
      <ul class="clothing-drop children-drops">
        <li class="arrow back-clothing-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg>Back
        </li>
        <li><a href="/ackermans/">Ackermans</a></li>
        <li><a href="/cape-union-mart/">Cape Union Mart</a></li>
        <li><a href="/foschini/">Foschini</a></li>
        <li><a href="/jet/">Jet</a></li>
        <li><a href="/mr-price/">Mr Price</a></li>
        <li><a href="/mrp-sport/">MRP Sport</a></li>
        <li><a href="/spitz/">Spitz</a></li>
        <li><a href="/sportscene/">Sportscene</a></li>
        <li><a href="/sportsmans-warehouse/">Sportsmans Warehouse</a></li>
        <li><a href="/superbalist/">Superbalist</a></li>
        <li><a href="/totalsports/">Totalsports</a></li>
        <li><a href="/truworths/">Truworths</a></li>
      </ul>
      <!-- Health & Beauty list -->
      <ul class="health-drop children-drops">
        <li class="arrow back-health-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg>Back
        </li>
        <li><a href="/avon/">Avon</a></li>
        <li><a href="/clicks/">Clicks</a></li>
        <li><a href="/dis-chem/">Dis-Chem</a></li>
        <li><a href="/justine/">Justine</a></li>
      </ul>
      <!-- Vehicles list -->
      <ul class="vehicles-drop children-drops">
        <li class="arrow back-vehicles-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg></span>Back
        </li>
        <li><a href="#">Car Magazines</a></li>
      </ul>
      <!-- Other list -->
      <ul class="other-drop children-drops">
        <li class="arrow back-other-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg>Back
        </li>
        <li><a href="/aliexpress/">AliExpress</a></li>
        <li><a href="/autozone/">AutoZone</a></li>
        <li><a href="/babies-r-us/">Babies R Us</a></li>
        <li><a href="/baby-boom/">Baby Boom</a></li>
        <li><a href="/baby-city/">Baby City</a></li>
        <li><a href="/crazy-store/">Crazy Store</a></li>
        <li><a href="/edgars/">Edgars</a></li>
        <li><a href="/pep-stores/">PEP Stores</a></li>
        <li><a href="/toys-r-us/">Toys R Us</a></li>
        <li><a href="/tupperware/">Tupperware</a></li>
      </ul>
      <!-- Settings and Privacy Menu-items -->
      <ul class="settings-drop children-drops">
        <li class="arrow back-setting-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg>Settings & Privacy
        </li>
        <li>
          <a href="#">
            <div class="icon"><span class="fas fa-user"></span></div>
            Personal info
          </a>
        </li>
        <li>
          <a href="#">
            <div class="icon"><span class="fas fa-lock"></span></div>
            Password
          </a>
        </li>
        <li>
          <a href="#">
            <div class="icon">
              <span class="fas fa-address-book"></span>
            </div>
            Activity log
          </a>
        </li>

        <li>
          <a href="#">
            <div class="icon"><span class="fa fa-globe-asia"></span></div>
            Languages
          </a>
        </li>
        <li>
          <a href="#">
            <div class="icon"><span class="fa fa-sign-out-alt"></span></div>
            Logout
          </a>
        </li>
      </ul>
      <!-- Help and Support Menu-items -->
      <ul class="help-drop children-drops">
        <li class="arrow back-help-btn">
          <svg class="back-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" />
          </svg>Help & Support
        </li>
        <li>
          <a href="#">
            <div class="icon">
              <span class="fas fa-question-circle"></span>
            </div>
            Help Center
          </a>
        </li>
        <li>
          <a href="#">
            <div class="icon"><span class="fas fa-envelope"></span></div>
            Support inbox
          </a>
        </li>
        <li>
          <a href="#">
            <div class="icon">
              <span class="fas fa-comment-alt"></span>
            </div>
            Send feedback
          </a>
        </li>

        <li>
          <a href="#">
            <div class="icon">
              <span class="fa fa-exclamation-circle"></span>
            </div>
            Report problems
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="drop-btn">
    <div class="toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>