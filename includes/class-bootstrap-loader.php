<?php
class BootstrapLoader {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_bootstrap'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_datatables'));
    }

    public function enqueue_bootstrap() {
        wp_enqueue_style('bootstrap-css', plugins_url('../public/css/bootstrap.min.css', __FILE__));
        wp_enqueue_script('bootstrap-js', plugins_url('../public/js/bootstrap.bundle.min.js', __FILE__), array('jquery'), null, true);
    }
    
    public function enqueue_datatables() {
        // Base DataTables
        wp_enqueue_style('datatables-css', 'https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css');
        wp_enqueue_script('datatables-js', 'https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js', array('jquery'), null, true);
        
        // Responsive extension
        wp_enqueue_style('datatables-responsive-css', 'https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css');
        wp_enqueue_script('datatables-responsive-js', 'https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js', array('datatables-js'), null, true);
        
        // Buttons extension for exports
        wp_enqueue_style('datatables-buttons-css', 'https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css');
        wp_enqueue_script('datatables-buttons-js', 'https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js', array('datatables-js'), null, true);
        wp_enqueue_script('datatables-buttons-html5-js', 'https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js', array('datatables-buttons-js'), null, true);
        wp_enqueue_script('datatables-buttons-print-js', 'https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js', array('datatables-buttons-js'), null, true);
        wp_enqueue_script('jszip-js', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js', array(), null, true);
        wp_enqueue_script('pdfmake-js', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js', array(), null, true);
        wp_enqueue_script('pdfmake-fonts-js', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js', array('pdfmake-js'), null, true);
        
        // Custom script
        wp_enqueue_script('sortable-tables-js', plugins_url('../public/js/sortable-tables.js', __FILE__), array('jquery', 'datatables-js', 'datatables-buttons-js'), '1.1', true);
    }
}
?>