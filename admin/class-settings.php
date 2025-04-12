<?php
class Settings {
    private $options;

    public function __construct() {
        $this->options = get_option('sortable_tables_plugin_options');
    }

    public function get_options() {
        return $this->options;
    }

    public function save_options($options) {
        update_option('sortable_tables_plugin_options', $options);
    }

    public function register_settings() {
        register_setting('sortable_tables_plugin_options_group', 'sortable_tables_plugin_options');
    }

    public function settings_page() {
        ?>
        <div class="wrap">
            <h1>Sortable Tables Plugin Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('sortable_tables_plugin_options_group');
                do_settings_sections('sortable_tables_plugin_options_group');
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Option Name</th>
                        <td><input type="text" name="sortable_tables_plugin_options[option_name]" value="<?php echo esc_attr($this->options['option_name'] ?? ''); ?>" /></td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}
?>