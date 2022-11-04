<?php 
//Template Name: T-Industries 
get_header();


$cat = get_categories(
    array('taxonomy'=>'category')
);
// echo '<pre>';
// print_r($cat);
// echo '</pre>';

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php
           foreach ($cat as $value){
            ?>
           <ul class="category-ul">
            <li>
                <a href="<?php echo get_category_link( $value->term_id); ?>" class="text-decoration-none"><?php echo $value->name; ?> (<?php echo $value->count ?>)</a>  
            </li>
           </ul> 


            <?php
           }
            ?>
        </div>
    </div>
</div>

<?php 
 $cus_cat = get_terms(['texonomy'=>'category','hide_empty'=>false,'orderby'=>'name','order'=>'DESC','number'=>4]);

?>

<div class="container">
    <div class="row">
        <div class="col-12">
   <?php 
   foreach($cus_cat as $cus_value){
    ?>
    <ul class="category-ul">
     <li>
     <?php $meta_image = get_wp_term_image($cus_value->term_id);  ?>
        <a href="<?php echo get_category_link( $cus_value->term_id); ?>" class="text-decoration-none"><img src="<?php echo $meta_image ?>" alt=""> <?php echo $cus_value->name; ?> (<?php echo $cus_value->count ?>)</a> 
     </li>
    </ul> 


     <?php
   }
   ?>
        </div>
    </div>
</div>

<?php
get_footer();
?> 