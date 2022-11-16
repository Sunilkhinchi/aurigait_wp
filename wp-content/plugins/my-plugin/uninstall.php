<?php 

if(!defined('WP_UNINSTALL_PLUGIN')){
    header("Location: /AurigaCus");
    die("");
 }

 global $wpdb,$table_prefix;
 $wp_emp = $table_prefix.'emp';

 $query = "DROP TABLE `$wp_emp`;";
 $wpdb->query($query);