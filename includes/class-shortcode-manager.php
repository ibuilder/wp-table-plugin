<?php
class ShortcodeManager {
    public function __construct() {
        add_shortcode('sortable_table', [$this, 'render_sortable_table']);
    }

    public function render_sortable_table($atts) {
        $atts = shortcode_atts([
            'data' => '',
            'export' => 'false',
            'responsive' => 'true',
            'paging' => 'true',
            'searching' => 'true',
            'state_save' => 'false',
            'page_length' => '10',
            'default_sort' => '',  // Format: [column_index, 'asc'|'desc']
            'column_filters' => 'false',
            'theme' => 'default',  // default, dark, striped, etc.
            'caption' => '',
        ], $atts);

        if (empty($atts['data'])) {
            return '<p>No data provided for the table.</p>';
        }

        $data = json_decode($atts['data'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return '<div class="alert alert-danger" role="alert">
                        <strong>Error:</strong> Invalid data format. Please provide valid JSON.
                        <br><small>Error details: ' . json_last_error_msg() . '</small>
                    </div>';
        }
        
        if (empty($data) || !is_array($data)) {
            return '<div class="alert alert-warning">The table data is empty.</div>';
        }

        // Convert string attributes to appropriate types for JS
        $table_id = 'sortable-table-' . uniqid();
        $table_classes = 'table sortable-table';
        
        // Add theme classes
        switch($atts['theme']) {
            case 'dark':
                $table_classes .= ' table-dark';
                break;
            case 'striped':
                $table_classes .= ' table-striped';
                break;
            case 'bordered':
                $table_classes .= ' table-bordered';
                break;
            case 'hover':
                $table_classes .= ' table-hover';
                break;
            case 'striped-hover':
                $table_classes .= ' table-striped table-hover';
                break;
            default:
                // Default theme
                $table_classes .= ' table-bordered table-striped';
        }
        
        // Pass data to the template
        $template_data = [
            'data' => $data,
            'table_id' => $table_id,
            'table_classes' => $table_classes,
            'export' => $atts['export'],
            'responsive' => $atts['responsive'],
            'paging' => $atts['paging'],
            'searching' => $atts['searching'],
            'state_save' => $atts['state_save'],
            'page_length' => $atts['page_length'],
            'default_sort' => $atts['default_sort'],
            'column_filters' => $atts['column_filters'],
            'caption' => $atts['caption']
        ];

        ob_start();
        include plugin_dir_path(__FILE__) . '../public/views/table-template.php';
        return ob_get_clean();
    }
}
?>