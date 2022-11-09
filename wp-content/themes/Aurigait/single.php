<?php 
get_header();
the_post();


?>
<div class="container py-5">
    <div class="row">
        <div class="col-12"><?php get_breadcrumb(); ?></div>
    </div>
</div>

<div class="container post-single-page">
    <div class="row">
        <div class="col-12 mb-4"> <?php the_post_thumbnail(); ?></div>
        <div class="col-12 mb-4"> <p> <span><?php the_author(); ?></span> | <span><?php echo get_the_date(); ?></span> </p></div>
        <div class="col-12 mb-1"><h2><?php the_title(); ?></h2></div>
        <div class="col-12 mb-3"><p><?php the_excerpt(); ?></p></div>
        <!-- <div class="col-12 mb-3"><p><?php the_content(); ?></p></div> -->
        <div class="col-12 mb-3 text-danger text-capitalize"><p><?php do_action('aurigait_after_content') ?></p></div>
        
    </div>
</div>

<div class="container post-single-page">
    <div class="row">
        <div class="col-12"> <?php Comment_form(); ?></div>
    </div>
</div>

<?php
get_footer();
?> 