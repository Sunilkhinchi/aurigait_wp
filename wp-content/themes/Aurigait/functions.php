<?php
function hello() {
    echo "hello function";
}

function load_stylesheet() {
    wp_register_style('style', get_template_directory_uri().'/style.css', array(), 1,'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts','load_stylesheet');


function load_bootstrapcss() {
    wp_register_style('style_bootstrap',get_template_directory_uri().'/css/bootstrap/bootstrap.min.css');
    wp_enqueue_style('style_bootstrap');
}
add_action('wp_enqueue_scripts','load_bootstrapcss');


function  load_bootstrapjs() {
    wp_register_script('script_bootstrap_js',get_template_directory_uri().'/js/bootstrapjs/bootstrap.min.js');
    wp_enqueue_script('script_bootstrap_js');
}
add_action('wp_enqueue_scripts','load_bootstrapjs');


function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

register_nav_menus(
    array('primary-menu'=>'Top menu',
          'first-menu'=>'bottom-first-menu',
          "second-menu"=>'bottom-second-menu',
          'third-menu'=>'bottom-thirds-menu')
);


// hook create

add_action('aurigait_after_content','content_funtion');

function content_funtion() {
    echo "content through custom hook first";
}

add_action('aurigait_after_content','content_funtion_two',8);

function content_funtion_two() {
    echo "content through custom hook 2nd";
}

// function theme_excerpt_length( $length ) {
//     return 10;
// }
// add_filter( 'excerpt_length', 'theme_excerpt_length', 999 );

// remove_action('aurigait_after_content','content_funtion_two',8);

// add_filter('the_title','filter_fun');
// function filter_fun($example) {
//     $example .= 'extra content';

//     return $example;
// }

// function save_test($post_id,$post){
//     echo "Dt";
// }
// add_action('save_post','save_test',10,2);


// register_nav_menus(
//     array(')
// );

;




add_theme_support('post-thumbnails');
add_theme_support('custom-header');
add_theme_support('custom-background');
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_post_type_support('page','excerpt');



function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}


// add shortcode for case study 

add_shortcode('case_study', 'case_study_function');
function case_study_function(){
    ?>
   <div class="slider-section-home border-bottom">
   <div class="case-study-slider owl-carousel owl-theme py-5">

     
     <?php 
$args = array( 'post_type' => 'casestudies', 'posts_per_page' => -1 );
$the_query = new WP_Query( $args ); 
 if ( $the_query->have_posts() ) : 
 while ( $the_query->have_posts() ) : $the_query->the_post();
 $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
 
 ?>
    <div class="item">
        <div class="case-study-box flex-column row">
            <div class="image-box"><img class="w-100" src="<?php echo $imagepath[0] ?>" alt=""></div>
            <div class="text-box right-section-case pt-4 d-flex justify-content-center flex-column align-items-start">
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
                </div>
                <p><?php the_excerpt();  ?> </p>
               <div class="btn-div"> <a class="btn btn-site px-6" href="<?php echo get_permalink(); ?>">View Case Study</a> </div>               
 
            </div>
        </div>
    </div>
            <?php endwhile;
        wp_reset_postdata();  else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>

    </div>
    <div class="btn-div mt-4 text-center"> <a class="btn btn-site px-6" href="<?php the_permalink(134); ?>">All Case Studies</a> </div>  
    </div>

    <?php
}

add_shortcode('get_started', 'get_started_fun');
function get_started_fun() { 
     ?>
     <div class="container let-connect">
    <div class="row">
      <div class="col-12 text-center ">
          <h3 class="mb-5">Ready to get started?  </h3>
          <div class="btn-div text-center"> <a class="btn btn-site px-6" href="">Let’s connect</a> </div>
      </div>
    </div>
  </div>   
     <?php
}


// add shortcode for What we serve  

add_shortcode('what_we_serve', 'what_we_serve_fun');
function what_we_serve_fun() {
    ?>
    <div class="row tab-section-left d-flex align-items-start">
                <div class="nav flex-column nav-pills col-4 align-self-stretch align-items-baseline btn-cover-tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <div class="heading mb-3 mt-5"><h2>What we serve</h2></div>
                  <button class="btn-tab nav-link active" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Enterprise" type="button" role="tab" aria-controls="v-pills-Enterprise" aria-selected="false">Enterprise & Automobile</button>
                  <button class="btn-tab nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-Data" type="button" role="tab" aria-controls="v-pills-Data" aria-selected="false">Data analytics & AI</button>
                  <button class="btn-tab nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Product Analysis</button>
                  <button class="btn-tab nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Product Design</button>
                  <button class="btn-tab nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Cloud</button>
                  <button class="btn-tab nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Ecommerce</button>

                </div>
                <div class="tab-content tab-section-right col-8 p-0" id="v-pills-tabContent">
                  
                  <div class="tab-pane fade show active for-bg-image" id="v-pills-Enterprise" role="tabpanel" aria-labelledby="v-pills-Enterprise-tab" tabindex="0">
                    <img class="image-bg-tab-home" src="http://localhost/AurigaCus/wp-content/uploads/2022/10/Rectangle-362.png" alt="bg-image">
                    <div class="text-inner">
                      <h4>Enterprise IT Transformation & Automation</h4>
                      <div class="praAndbtn">
                        <p>Automation is a defining factor for any digital product these days. We’re a user experience and UI design agency
                           focused on improving conversion and increasing customer engagement.</p>
                        <button class="btn-inner-text">Learn more</button>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade for-bg-image" id="v-pills-Data" role="tabpanel" aria-labelledby="v-pills-Data-tab" tabindex="0"><img class="image-bg-tab-home" src="http://localhost/AurigaCus/wp-content/uploads/2022/10/Rectangle-362.png" alt="bg-image"></div>
                    <div class="tab-pane fade for-bg-image" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0"><img class="image-bg-tab-home" src="http://localhost/AurigaCus/wp-content/uploads/2022/10/Rectangle-362.png" alt="bg-image"></div>
                  <div class="tab-pane fade for-bg-image" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0"><img class="image-bg-tab-home" src="http://localhost/AurigaCus/wp-content/uploads/2022/10/Rectangle-362.png" alt="bg-image"></div>
                </div>
            </div>    
    <?php
}


function wpb_postsbycategory() {
    // the query
    $the_query = new WP_Query( array( 
        'category_name' => 'Inside', 
        'posts_per_page' => 3 
    ) ); 

       
    // The Loop
    $string = "";
    $post_id = "";
    if ( $the_query->have_posts() ) {
        $string .= '<div class="inside-outer-div d-flex ">';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
                if ( has_post_thumbnail() ) {
                $string .= '<div class="inside-posts d-flex flex-column ">';
                // $string .= '<a href="' . get_the_permalink() .'" rel="bookmark" class="testing">' . get_the_post_thumbnail($post_id, array( 50, 50) ) . get_the_title() .'</a></div>';
                $string .= '<div class="image-div"><img class="w-100" src="'. $imagepath[0] .'" alt="inside-post-image"></div>
                <h5 class="m-0">'. get_the_title() .'</h5>
                <p class="m-0 test">'.  get_the_excerpt() .'</p>
                <a href="' . get_the_permalink() .'" >Read more</a></div>';
                } else { 
                // if no featured image is found
                $string .= '<li><a href="' . get_the_permalink() .'" rel="bookmark">'. get_the_title().'</a></li>';
                }
                }
        } else {
        // no posts found
     $string .= '<li>No Posts Found</li>';
    }
    $string .= '</div>';
       
    return $string;
       
    /* Restore original Post Data */
    wp_reset_postdata();
    }
    // Add a shortcode
    add_shortcode('categoryposts', 'wpb_postsbycategory');
/*
* Creating a function to create our CPT
*/
  
function custom_post_type() {
  
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Case studies ', 'Post Type General Name', 'aurigacus' ),
            'singular_name'       => _x( 'Case Study', 'Post Type Singular Name', 'aurigacus' ),
            'menu_name'           => __( 'Case studies ', 'aurigacus' ),
            'parent_item_colon'   => __( 'Parent Case Study', 'aurigacus' ),
            'all_items'           => __( 'All Case studies', 'aurigacus' ),
            'view_item'           => __( 'View Case Study', 'aurigacus' ),
            'add_new_item'        => __( 'Add New Case Study', 'aurigacus' ),
            'add_new'             => __( 'Add New', 'aurigacus' ),
            'edit_item'           => __( 'Edit Case Study', 'aurigacus' ),
            'update_item'         => __( 'Update Case Study', 'aurigacus' ),
            'search_items'        => __( 'Search Case Study', 'aurigacus' ),
            'not_found'           => __( 'Not Found', 'aurigacus' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'aurigacus' ),
        );
          
    // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'Case studies', 'aurigacus' ),
            'description'         => __( 'Case Study news and reviews', 'aurigacus' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres','category','post_tag','topics' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
            
      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'Case Studies', $args );
      
    }
      
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
      
    add_action( 'init', 'custom_post_type', 0 );



    // show widget option
   register_sidebar(
    array(
        'name'=>"Sidebar Location",
        'id'=> "sidebar"
    )
   );

   function dd($test){
echo '<pre>';
print_r($test);
echo '</pre>';
   }

?>