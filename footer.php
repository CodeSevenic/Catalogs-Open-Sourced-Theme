 </div>
 <footer id="footer" role="contentinfo">
   <?php get_template_part('template-parts/footer/widgets') ?>
   <?php get_template_part('template-parts/footer/info') ?>
 </footer>

 <?php wp_footer(); ?>
 <!-- Swiper JS -->
 <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
 <script>
   const menuToggle = document.querySelector('.toggle');

   const drop_btn = document.querySelector('.toggle');
   const menu_wrapper = document.querySelector('.menu-wrapper');
   const menu_bar = document.querySelector('.menu-bar');

   //  Main category Items
   const menu_list = document.querySelectorAll('.menu-list');

   const groceries_list = document.querySelector('.groceries-list');
   const electronics_list = document.querySelector('.electronics-list');

   const home_and_garden_list = document.querySelector('.home-list');
   const clothing_list = document.querySelector('.clothing-list');

   const health_list = document.querySelector('.health-list');
   const vehicles_list = document.querySelector('.vehicles-list');
   const other_list = document.querySelector('.other-list');
   // Category child items
   const menu_list_drop = document.querySelectorAll('.menu-list-drop');

   const groceries_drop = document.querySelector('.groceries-drop');
   const electronics_drop = document.querySelector('.electronics-drop');

   const home_drop = document.querySelector('.home-drop');
   const clothing_drop = document.querySelector('.clothing-drop');

   const health_drop = document.querySelector('.health-drop');
   const vehicles_drop = document.querySelector('.vehicles-drop');
   const other_drop = document.querySelector('.other-drop');
   //  Back Buttons
   const back_btn = document.querySelectorAll('.back-btn');

   const back_electronics_btn = document.querySelector('.back-electronics-btn');

   const back_home_btn = document.querySelector('.back-home-btn');
   const back_clothing_btn = document.querySelector('.back-clothing-btn');

   const back_health_btn = document.querySelector('.back-health-btn');
   const back_vehicles_btn = document.querySelector('.back-vehicles-btn');
   const back_other_btn = document.querySelector('.back-other-btn');

   //  ============ Categories Dropdown =============== //
   const textBox = document.querySelector('.textBox')
   const cat_input = document.getElementById('cat_input')

   function redirect(goto) {
     window.location.href = goto;
   }

   if (textBox) {

     function show(anything, href) {
       textBox.value = anything;
       console.log(href)
       redirect(href)
     }
   }

   let cat_dropdown = document.querySelector('.cat-dropdown');
   if (cat_dropdown) {

     cat_dropdown.onclick = function() {
       cat_dropdown.classList.toggle('active');
     };
   }

   //  ======== End of Categories Dropdown========= //

   drop_btn.onclick = () => {
     menu_wrapper.classList.toggle('show');
     drop_btn.classList.toggle('active')
   };

   document.addEventListener('click', function(event) {
     const menuWrapper = menu_wrapper.contains(event.target);
     const menuToggle = drop_btn.contains(event.target)
     if (!menuWrapper && !menuToggle) {
       menu_wrapper.classList.remove('show')
       drop_btn.classList.remove('active')

     }
     if (cat_dropdown) {
       const catToggle = cat_dropdown.contains(event.target)
       if (!catToggle) cat_dropdown.classList.remove('active')
     }
   });
   // Main Categories action functions
   console.log(menu_list)
   menu_list.forEach((element, key) => {
     element.onclick = () => {
       menu_bar.style.display = 'none';
       menu_list_drop[key].style.display = 'block';
     };
   });

   //  Back action functions
   back_btn.forEach((element, key) => {
     element.onclick = () => {
       menu_list_drop[key].style.display = 'none';
       menu_bar.style.display = 'block';
     };
   });
 </script>
 </body>

 </html>