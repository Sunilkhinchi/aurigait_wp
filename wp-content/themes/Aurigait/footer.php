<div class="container-fluid footer-outer-div mt-5">
<div class="container">  
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5">
    <div class="col mb-3">
     <ul class="icon-footer-outer  d-flex ">
        <li class="icon-footer"><a href="" class="for-link"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/linkedin-in.svg" class="w-100" alt="social-icon"></a></li>
        <li class="icon-footer"><a href="" class="for-link"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/twitter.svg" class="w-100" alt="social-icon"></a></li>
        <li class="icon-footer"><a href="" class="for-link"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10//facebook.svg" class="w-100" alt="social-icon"></a></li>
        <li class="icon-footer"><a href="" class="for-link"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/youtube.svg" class="w-100" alt="social-icon"></a></li>
        <li class="icon-footer"><a href="" class="for-link"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/instagram.svg" class="w-100" alt="social-icon"></a></li> 
     </ul>
    </div>

    <div class="col mb-3">

    </div>

    <div class="col mb-3">
    <?php wp_nav_menu(
                    array('theme_location'=>'first-menu',
                           'menu_class'=>'nav flex-column footer-nav',
                           'add_li_class'=> 'nav-item mb-3')) 
      ?>
    </div>

    <div class="col mb-3">
    <?php wp_nav_menu(
                    array('theme_location'=>'second-menu',
                           'menu_class'=>'nav flex-column footer-nav',
                           'add_li_class'=> 'nav-item mb-3')) 
      ?>
    </div>

    <div class="col mb-3">

      <?php wp_nav_menu(
                    array('theme_location'=>'third-menu',
                           'menu_class'=>'nav flex-column footer-nav',
                           'add_li_class'=> 'nav-item mb-3')) 
      ?>
    </div>
  </footer>
</div>  
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">

$('.case-study-slider').owlCarousel({
    loop:true,
    margin:50,
    nav:true,
    dots: false,
    responsiveClass: true,
				items: 2,
				nav:true,
})

$('.gallery-section').owlCarousel({
    loop:true,
    margin:50,
    nav:true,
    dots: false,
    responsiveClass: true,
				items: 4,
				nav:true,
})

</script>

<?php wp_footer(); ?>

</body>
</html>