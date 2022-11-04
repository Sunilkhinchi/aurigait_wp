<?php 
get_header();
the_post();
get_queried_object();

?>
<div class="container py-5">
    <div class="row">
    <div class="col-8 taxonomy">   
        <?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?>
        <?php
        the_title();
        ?> 
        <?php
	} // end while
} // end if
?>        
   </div> 
   <div class="col-4">
    <?php get_sidebar(); ?>
   
   </div>
    </div>
</div>


<?php
get_footer();
?> 