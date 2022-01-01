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

   // Category child items
   const menu_list_drop = document.querySelectorAll('.menu-list-drop');

   //  Back Buttons
   const back_btn = document.querySelectorAll('.back-btn');

   //  ============ Categories Dropdown =============== //
   const textBox = document.querySelector('.textBox')
   const cat_input = document.getElementById('cat_input')

   function redirect(goto) {
     window.location.href = goto;
   }

   if (textBox) {

     function show(anything, href) {
       textBox.value = anything;
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
   // View Category
   menu_list.forEach((element, key) => {
     element.onclick = () => {
       menu_bar.style.display = 'none';
       menu_list_drop[key].style.display = 'block';
     };
   });

   //  Back action 
   back_btn.forEach((element, key) => {
     element.onclick = () => {
       menu_list_drop[key].style.display = 'none';
       menu_bar.style.display = 'block';
     };
   });
 </script>
 </body>

 </html>