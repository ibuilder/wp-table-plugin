<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sortable Tables Settings</title>
    <?php wp_enqueue_style('bootstrap-css', plugins_url('../public/css/bootstrap.min.css', __FILE__)); ?>
    <link rel="stylesheet" href="<?php echo plugins_url('../public/css/sortable-tables-public.css', __FILE__); ?>">
</head>
<body>
    <div class="container">
        <h1>Sortable Tables Plugin Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('sortable_tables_options_group'); ?>
            <?php do_settings_sections('sortable_tables'); ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Example Input</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="example_input" value="<?php echo esc_attr(get_option('example_input')); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    <script src="<?php echo plugins_url('../public/js/bootstrap.bundle.min.js', __FILE__); ?>"></script>
</body>
</html>