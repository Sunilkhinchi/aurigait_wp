<?php
global $wpdb , $table_prefix;
  $wp_emp = $table_prefix.'emp';
if(isset($_GET['my_search_term'])){
    $query = "SELECT * FROM `$wp_emp` WHERE `name` LIKE '%".$_GET['my_search_term']."%';";
}else{
    $query = "SELECT * FROM `$wp_emp`;";
}
  
  $results = $wpdb->get_results($query);

   ob_start()
   ?>
   <div id="wpwrap">
    <h2>My first plugin page</h2>
    <div class="my-form">
        <form id="my-search-form" action="<?php echo admin_url('admin.php'); ?>">
             <input type="hidden" name="page" value="my-plugin-page">
            <input type="text" name="my_search_term" id="my-search_term">
            <input type="submit" value="search" name="search" id="testtesttesttse"  />
        </form>
    </div>
  <table class="m-auto wp-list-table widefat fixed striped table-view-list posts">
   <thead>
      <tr>
         <th class="p-4 border">ID</th>
         <th class="p-4 border">Name</th>
         <th class="p-4 border">Email</th>
         <th class="p-4 border">Phone</th>
      </tr>  
   </thead>
   <tbody id="my-table-result">
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
    </div>
   <?php
   echo  ob_get_clean();