<?php 
/**
 * Plugin Name: My plugin
 * Description: this is my first plugin.
 * Version: 1.7.2
 * Author: Sunil Khinchi
 * Author URI: sunil.khinchi.com
 */

 if(!defined('ABSPATH')){
    header("Location: /AurigaCus");
    die("");
 }

function my_plugin_activation(){
    global $wpdb,$table_prefix;
    $wp_emp = $table_prefix.'emp';
    $query = "CREATE TABLE IF NOT EXISTS `$wp_emp` ( `id` INT NOT NULL AUTO_INCREMENT , `name`
               VARCHAR(50) NOT NULL , `email` VARCHAR(100) NOT NULL , `phone` VARCHAR(15) NOT NULL , `status` BOOLEAN NOT NULL ,
                PRIMARY KEY (`id`)) ENGINE = InnoDB;";
     $wpdb->query($query); 

   // $query = "INSERT INTO `$wp_emp` ( `name`, `email`, `status`) VALUES ( 'sunil khinchi', 'sunilkhhinchi543@gmail.com', 1);";
   // $wpdb->query($query); 
     $data = array(
           'name' => 'sunil',
           'email'=>'mp17sunil97@gmail.com',
           'phone'=> "9999888833",
           'status'=>1
     );
      $wpdb->insert($wp_emp, $data);
 }

 register_activation_hook( __FILE__, 'my_plugin_activation');

function my_plugin_deactivation(){
    global $wpdb,$table_prefix;
    $wp_emp = $table_prefix.'emp';
    $query = "TRUNCATE `$wp_emp`";
    $wpdb->query($query);
    
}
register_deactivation_hook( __FILE__, 'my_plugin_deactivation' );

function shortcode_funtion($atts){
   $atts = array_change_key_case($atts,CASE_LOWER);
   $atts = shortcode_atts(array(
      'massage'=> 'defualt massage',
      'age'=>18,
      'type'=> 'img_gallery'
   ),$atts);
   
   // include 'notice.php';
   // include 'img_gallery.php';
   include $atts['type'].'.php';
  
//   return $atts['massage'] ." test ". $atts['age'] ;
 }

 add_shortcode('first_shortcode','shortcode_funtion');

//  add_action('wp_enqueue_scripts','my_cus_script');

// function my_cus_script(){
   // $path = plugins_url('js/main.js', __FILE__);
   // $dep = array('jquery');
   // $var = filemtime(plugin_dir_path(__FILE__).'js/main.js');
   // wp_enqueue_script('my-custom-js' , $path, $dep, $var, true);

// }


// add_action('wp_enqueue_scripts','my_custom_scripts');
// function my_custom_scripts(){

  $path_js = plugins_url('js/main.js', __FILE__);
  $path_style = plugins_url('css/style.css', __FILE__);
  $dep = array('jquery',);
  $ver_js = filemtime(plugin_dir_path(__FILE__).'js/main.js');
  $ver_style = filemtime(plugin_dir_path(__FILE__).'css/style.css');
//   $is_login = is_user_logged_in() ? 1 : 0;

  wp_enqueue_style('my-custom-style',$path_style, '', $ver_style,'all' );
  wp_enqueue_script('my-custom-js', $path_js ,$dep ,$ver_js,true);
  wp_add_inline_script('my-custom-js','var ajaxUrl = "'.admin_url('admin-ajax.php').'";','before');

// }



function youtube_fun(){
  global $wpdb , $table_prefix;
  $wp_emp = $table_prefix.'emp';

  $query = "SELECT * FROM `$wp_emp`;";
  $results = $wpdb->get_results($query);

   ob_start()
   ?>
  <table class="m-auto">
   <thead>
      <tr>
         <th class="p-4 border">ID</th>
         <th class="p-4 border">Name</th>
         <th class="p-4 border">Email</th>
         <th class="p-4 border">Phone</th>
      </tr>  
   </thead>
   <tbody>
      <?php
      foreach($results as $row):
      ?>
      <tr>
         <td class="p-4 border"><?php echo $row->id; ?></td>
         <td class="p-4 border"><?php echo $row->name; ?></td>
         <td class="p-4 border"><?php echo $row->email; ?></td>
         <td class="p-4 border"><?php echo $row->phone; ?></td>
      </tr>

      <?php
      endforeach;
      ?>
   </tbody>
  </table>

   <?php
   $html = ob_get_clean();
   return $html; 
}

 add_shortcode('youtube','youtube_fun');

 function posts_fun_plugin(){
      $args = array(
         'post_type' => 'post',
         "category_name"=>'Inside' ,
         // 'tag'=>'testTage',
         // 'posts_per_page'=>3,
         // 'orderby'=>'id',
         // 'order'=>'ASC',
         // 'offset'=>3,
         // 's'=>'TMCC7'
         // 'meta_query'=>array(
         //    array(
         //       'key'=>'views',
         //       'value'=>'2',
         //       'compare'=>'>='
         //    )
         // )
      );
     $query = new WP_Query($args);

      ob_start();
      if($query->have_posts()):
         ?>
         <ul>
            <?php
            while($query->have_posts()){
               $query->the_post();
               echo '<li><a href="'.get_the_permalink().'">'.get_the_title(). '</a></li>';
               // echo get_post_meta($post->ID, 'views',true);
            }
             ?>
         </ul>
         <?php
         endif;
         wp_reset_postdata();
         $html = ob_get_clean();
         return  $html;
 }


 add_shortcode('my_posts', 'posts_fun_plugin');

function head_function(){
   if(is_single()){
      global $post;
      // echo $post->ID;
      $views = get_post_meta($post->ID, 'views' ,true);

      if($views == ''){
         add_post_meta($post->ID, 'views',1);
      }else {
         $views++;
         update_post_meta($post->ID, 'views',$views);
      }  
      
      // echo get_post_meta($post->ID, 'views',true);
   }
    
}
 add_action('wp_head','head_function');


 add_shortcode('post_count','post_count_func');
function post_count_func(){
   global $post;
   echo get_post_meta($post->ID, 'views',true);
}



add_action('admin_menu','my_plugin_menu');

function my_plugin_menu(){
   add_menu_page('My Plugin page', 'My Plugin page','manage_options', 'my-plugin-page',
   'my_plugin_page_fun','','6');
   add_submenu_page('my-plugin-page','Main Plugin page','All Emp' ,'manage_options', 'my-plugin-page','my_plugin_page_fun');
   add_submenu_page('my-plugin-page','My Plugin Sub page','My Plugin Sub page' ,'manage_options', 'my-plugin-subpage','my_plugin_subpage_fun');
}

function my_plugin_page_fun(){
   include 'admin/main-page.php';
}

function my_plugin_subpage_fun(){
   echo 'dfdsf';
}
add_action('wp_ajax_nopriv_my_search_fun','my_search_fun');
add_action('wp_ajax_my_search_fun','my_search_fun');
function my_search_fun(){

   global $wpdb , $table_prefix;
   $wp_emp = $table_prefix.'emp';
   $search_term = $_POST['search_term'];

      if(!empty($search_term)){
         $query = "SELECT * FROM `$wp_emp` WHERE
          `name` LIKE '%".$search_term."%' OR
          `email` LIKE '%".$search_term."%' OR
          `phone` LIKE '%".$search_term."%'
          ;";
      }else{
         $query = "SELECT * FROM `$wp_emp`;";
      }
      

      $results = $wpdb->get_results($query);
      // dd($results);
      ob_start();
      foreach($results as $row):
      ?>
      
      <tr>
         <td class="p-4 border"><?php echo $row->id; ?></td>
         <td class="p-4 border"><?php echo $row->name; ?></td>
         <td class="p-4 border"><?php echo $row->email; ?></td>
         <td class="p-4 border"><?php echo $row->phone; ?></td>
      </tr>

      <?php
      endforeach;
      echo ob_get_clean();
   // echo $search_term;
   wp_die();
}

function my_table_data_short(){
   include 'admin/main-page.php';
}
add_shortcode('my-data-table','my_table_data_short');


function register_my_cpt(){
   $labels = array(
     'name'=>'Team',
     'singular_name' => 'Team'
   );
   $supports = array('title','editor','thumbnail','comments','excerpt','revisions');
   $options = array(
      'labels' => $labels,
       'public'=> true,
       'has_archive'=>true,
       'rewrite'=>array('slug'=>'teams'),
       'show_in_rest' => true,
       'supports'=> $supports,
       'taxonomies'=>array('team'),
       'publicly_queryable'=>true,
   );
   register_post_type('team',$options);
}
add_action('init','register_my_cpt');

function register_team_type(){
   $labels = array(
      'name'=>'Team type',
      'singular_name' => 'Team type'
    );
   $options = array(
     'labels'=>$labels,
     'hierarchical'=> true,
     'rewrite'=>array('slug'=>'team-type'),
     'show_in_rest' => true,
   );
   register_taxonomy('team-type',array('team'), $options);
}
add_action('init','register_team_type');


 








