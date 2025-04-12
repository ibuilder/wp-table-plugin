<?php
/**
 * Plugin Name: Sortable Tables Plugin
 * Description: A WordPress plugin that provides filterable and sortable tables using Bootstrap.
 * Version: 1.0
 * Author: Your Name
 * License: GPL2
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Include necessary files
require_once plugin_dir_path( __FILE__ ) . 'includes/class-bootstrap-loader.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-shortcode-manager.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-sortable-tables.php';

// Initialize the plugin
function stp_init() {
    // Load Bootstrap
    $bootstrap_loader = new BootstrapLoader();
    
    // Register shortcodes
    $shortcode_manager = new ShortcodeManager();
    
    // The constructor methods already register what's needed
}
add_action( 'init', 'stp_init' );
?>