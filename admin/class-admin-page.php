<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class AdminPage {
    private $settings;

    public function __construct() {
        $this->settings = new Settings();
        add_action( 'admin_menu', array( $this, 'add_admin_page' ) );
    }

    public function add_admin_page() {
        add_menu_page(
            'Sortable Tables',
            'Sortable Tables',
            'manage_options',
            'sortable_tables',
            array( $this, 'create_admin_page' ),
            'dashicons-table-col-after',
            100
        );
    }

    public function create_admin_page() {
        if ( isset( $_POST['submit'] ) ) {
            $this->settings->save_settings();
        }
        include_once plugin_dir_path( __FILE__ ) . 'views/admin-page.php';
    }
}
?>