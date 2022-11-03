<?php 
get_header();
the_post();


?>
<div class="container py-5">
    <div class="row">
        
        <?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		?>
        <div class="col-4"> <?php
        the_title();
        ?> </div>
        <?php
	} // end while
} // end if
?>        
    
    </div>
</div>


<?php
get_footer();
?> 