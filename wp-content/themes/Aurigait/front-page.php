<?php 
get_header();
// hello(); echo get_template_directory_uri();

?>
  <div class="container container-top mb-5 d-lg-flex align-items-lg-center content-space-t-3 content-space-lg-0 min-vh-lg-100">
        <!-- Heading -->
        <div class="w-100" style="margin-top: 10rem;">
          <div class="row row-home-top">
            <div class="col-lg-5">
              <div class="mb-5">
                <h1 class="display-4 mb-3 fw-bold">
                Creating a better tomorrow together.
                </h1>

                <p class="lead">A technology consultancy that integrates design, software engineering and data to build applications that matters</p>
              </div>

              <div class="d-grid d-sm-flex gap-3">
                <a class="btn btn-site px-6" href="zzl">Say Hello</a>
            
              </div>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Row -->
        </div>
        <!-- End Title & Description -->

     
        <div class="col-lg-7 col-xl-6 d-none d-lg-block position-absolute top-0 end-0 pe-0" style="margin-top: 11rem;">
          <img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/home1.png" class=" position-absolute top-0 end-0 pe-0" alt="">
        </div>
      
      </div>
      <div class="container-fluid py-5 container-second-home">
         <div class="container">
          <h5 class="test-heading-small mb-4">Our work</h2>

          <?php 
            $args = array( 'post_type' => 'casestudies', 'post_status'=>'publish', 'posts_per_page' => 1 );
            $the_query = new WP_Query( $args ); 
            if ( $the_query->have_posts() ) : 
            while ( $the_query->have_posts() ) : $the_query->the_post();
            $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
            
            ?>
          
                <div class="row">              
                  <div class="col-6"><img class="w-100" src="<?php echo $imagepath[0] ?>" alt=""></div>
                  <div class="col-6 right-section px-4 d-flex justify-content-center flex-column align-items-start ">
                      <h3><?php the_title(); ?></h3>
                      <div class="tags">
                        <p class="m-0">
                      <?php
                          $posttags = get_the_tags();
                          if ($posttags) {
                            foreach($posttags as $tag) {
                              ?>
                              <span class="single-tags">
                              <?php
                              echo $tag->name . ' . '; 
                              ?>
                              </span>
                              <?php
                            }
                          }
                      ?>
                      </p>
                        <!-- <p>
                          <span class="single-tags">Java</span> . <span class="single-tags">Artificial Intelligence</span> . <span class="single-tags">Automobile</span>
                        </p> -->
                      </div>
                      <?php the_excerpt(); ?>
                    <div class="btn-div"> <a class="btn btn-site px-6" href="<?php echo get_permalink();  ?>">View Case Study</a> </div>
                  </div>
                </div>
                <?php endwhile;
                  wp_reset_postdata();  else:  ?>
                  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                  <?php endif; ?>  
         </div>
      </div>



      <div class="container">

    <?php  echo do_shortcode ("[case_study]"); ?>
         
      </div>

      <div class="container tab-section-out"> 
           <?php echo do_shortcode ('[what_we_serve]') ?>
      </div>

  <div class="container py-5">
    <div class="row">
      <div class="col-12 d-flex flex-wrap justify-content-between align-item-center log-image-cover">
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/googlePay.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/maestro.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/verified-visa.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/robokassa.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/wester-union.svg" alt=""></div>

        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/belcart.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/visa-1.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/paypal.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/paypass.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/mir.svg" alt=""></div>
        <div class="log-image d-flex align-items-center"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/vorkasse.svg" alt=""></div>

     
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-12"></div>
    </div> -->
  </div>

  <div class="container projectandyear-text">
    <div class="row justify-content-between">
      <div class="col-7">
          <h5 class="test-heading-small ">Who we are</h5>
          <p>A group of people who just could not leave their college-life behind and the inception of Auriga was solely based on a desire to keep working together with friends to make quality and innovative tech solutions and keep enjoying the extended college life.</p>
          <a class="btn btn-site px-6 mt-4" href="Case-study">Learn More</a>
      </div>
      <div class="col-2 projectandyear">
        <div class="projects">
             <h3>500+</h3>
             <p>Projects delivered</p>
        </div>
        <div class="years">
             <h3>11</h3>
             <p>years in business</p>
        </div>
      </div>
      
    </div>
  </div>

 

  <div class="gallery-section owl-carousel owl-theme py-5 my-5">
       
  <?php 
$args = array( 'post_type' => 'casestudies', 'posts_per_page' => -1 );
$the_query = new WP_Query( $args ); 
 if ( $the_query->have_posts() ) : 
 while ( $the_query->have_posts() ) : $the_query->the_post();
 $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
 
 ?>
         <div class="item inner-images">
             <img src="<?php echo $imagepath[0]; ?>" alt="" class="w-100">
         </div>

         <?php endwhile;
        wp_reset_postdata();  else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>         
       
   </div>  



 


  <div class="container-fluid career-section">
       <div class="row career-inner">
        <div class="col-6 p-0"><img src="http://localhost/AurigaCus/wp-content/uploads/2022/10/austin-distel-mpN7xjKQ_Ns-unsplash-1.png" alt="left-image" class="w-100"></div>
        <div class="col-6 position-relative">
            <div class="text-part position-absolute">
                <h5 class="test-heading-small mb-3">Career</h5>
                 <h3 class="mb-2">Join our team</h3>
                <p class="mb-5">Our people are our most valuable asset—a fact that's reflected in our values-driven organization in which new perspectives are integral and new ideas are celebrated.</p>
               <div class="btn-div"> <a class="btn btn-site px-6" href="Case-study">View Open Positions</a> </div>   
            </div>              
        </div>
       </div>
  </div>

  <div class="container insideauriga">
       <div class="row py-5">
           <div class="col-12 p-0">
              <h5 class="test-heading-small mb-3">Inside Auriga</h5>
              <h3 class="mb-4">Tagline about Insights</h3>
                  

                  <?php echo do_shortcode ('[categoryposts]') ?>
               
                  
                <div class="btn-div text-center py-5"> <a class="btn btn-site px-6" href="">Read our blog</a> </div>     
           </div>
       </div>
  </div>
  
  <?php echo do_shortcode('[get_started]'); ?>

  
<?php
get_footer();
?> 