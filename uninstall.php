<?php
// If this file is called directly, abort.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Clean up options and data associated with the plugin.
$option_name = 'sortable_tables_plugin_options';
delete_option( $option_name );

// If you have custom database tables, you can drop them here.
// global $wpdb;
// $table_name = $wpdb->prefix . 'your_custom_table';
// $wpdb->query( "DROP TABLE IF EXISTS $table_name" );
?>