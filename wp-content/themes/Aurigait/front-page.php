<?php 
get_header();
// hello(); echo get_template_directory_uri();
?>
  <div class="container container-top d-lg-flex align-items-lg-center content-space-t-3 content-space-lg-0 min-vh-lg-100">
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
          <div class="row">
            <div class="col-6"><img class="w-100" src="http://localhost/AurigaCus/wp-content/uploads/2022/10/featured-image.png" alt=""></div>
            <div class="col-6 right-section px-4 d-flex justify-content-center flex-column align-items-start ">
                <h3>Data analytics for Volkswagen : A Classic Case of Load balancing</h3>
                <div class="tags">
                  <p><span class="single-tags">Java</span> . <span class="single-tags">Artificial Intelligence</span> . <span class="single-tags">Automobile</span></p>
                </div>
                <p>We upgraded the Volkswagen’s data entry system to the next level. Increased the system security by 24%.</p>
               <div class="btn-div"> <a class="btn btn-site px-6" href="Case-study">View Case Study</a> </div>
            </div>
          </div>
          <div class="row">

          </div>
         </div>
      </div>



      <div class="container">

    <?php  echo do_shortcode ("[case_study]"); ?>
         
      </div>

      <div class="container tab-section-out"> 
           <?php echo do_shortcode ('[what_we_serve]') ?>
      </div>


      
<?php
get_footer();
?> 