<?php 
get_header();


?>
<main id="main" class="text-center" role="main">
<h1 class="test"> page title :<?php the_title(); ?></h1>
<div class="col-12 mb-4"> <?php the_post_thumbnail(); ?></div>
<p>page content : <?php the_content(); ?></p>
<p> <?php the_excerpt(); ?></p>

   <p> hello wordpress page</p>

</main> 

<?php
get_footer();
?> 