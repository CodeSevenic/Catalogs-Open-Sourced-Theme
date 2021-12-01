 </div>
 <footer id="footer" role="contentinfo">
   <?php get_template_part('template-parts/footer/widgets') ?>
   <?php get_template_part('template-parts/footer/info') ?>
 </footer>

 <?php wp_footer(); ?>
 <!-- Swiper JS -->
 <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
 <script>
   const drop_btn = document.querySelector('.menu-ham');
   const menu_wrapper = document.querySelector('.menu-wrapper');
   const menu_bar = document.querySelector('.menu-bar');

   //  Main category Items
   const groceries_list = document.querySelector('.groceries-list');
   const electronics_list = document.querySelector('.electronics-list');

   const home_and_garden_list = document.querySelector('.home-list');
   const clothing_list = document.querySelector('.clothing-list');

   const health_list = document.querySelector('.health-list');
   const vehicles_list = document.querySelector('.vehicles-list');
   // Category child items
   const groceries_drop = document.querySelector('.groceries-drop');
   const electronics_drop = document.querySelector('.electronics-drop');

   const home_drop = document.querySelector('.home-drop');
   const clothing_drop = document.querySelector('.clothing-drop');

   const health_drop = document.querySelector('.health-drop');
   const vehicles_drop = document.querySelector('.vehicles-drop');
   //  Back Buttons
   const back_groceries_btn = document.querySelector('.back-groceries-btn');
   const back_electronics_btn = document.querySelector('.back-electronics-btn');

   const back_home_btn = document.querySelector('.back-home-btn');
   const back_clothing_btn = document.querySelector('.back-clothing-btn');

   const back_health_btn = document.querySelector('.back-health-btn');
   const back_vehicles_btn = document.querySelector('.back-vehicles-btn');

   //  ==================================== //

   const toggleWrapper = drop_btn.onclick = () => {
     menu_wrapper.classList.toggle('show');
   };

   document.addEventListener('click', function(event) {
     const isClickInsideElement = menu_wrapper.contains(event.target);
     const isClickInsideElement2 = drop_btn.contains(event.target)
     if (!isClickInsideElement && !isClickInsideElement2) {
       menu_wrapper.classList.remove('show')
     }
   });
   // Main Categories action functions
   groceries_list.onclick = () => {
     menu_bar.style.display = 'none';
     groceries_drop.style.display = 'block';
   };

   electronics_list.onclick = () => {
     menu_bar.style.display = 'none';
     electronics_drop.style.display = 'block';
   };

   home_and_garden_list.onclick = () => {
     menu_bar.style.display = 'none';
     home_drop.style.display = 'block';
   };

   clothing_list.onclick = () => {
     menu_bar.style.display = 'none';
     clothing_drop.style.display = 'block';
   };

   health_list.onclick = () => {
     menu_bar.style.display = 'none';
     health_drop.style.display = 'block';
   };

   vehicles_list.onclick = () => {
     menu_bar.style.display = 'none';
     vehicles_drop.style.display = 'block';
   };

   //  Back action functions
   back_groceries_btn.onclick = () => {
     groceries_drop.style.display = 'none';
     menu_bar.style.display = 'block';

   };

   back_electronics_btn.onclick = () => {
     electronics_drop.style.display = 'none';
     menu_bar.style.display = 'block';
   };

   back_home_btn.onclick = () => {
     home_drop.style.display = 'none';
     menu_bar.style.display = 'block';

   };

   back_clothing_btn.onclick = () => {
     clothing_drop.style.display = 'none';
     menu_bar.style.display = 'block';
   };

   back_health_btn.onclick = () => {
     health_drop.style.display = 'none';
     menu_bar.style.display = 'block';

   };

   back_vehicles_btn.onclick = () => {
     vehicles_drop.style.display = 'none';
     menu_bar.style.display = 'block';
   };
 </script>
 </body>

 </html>