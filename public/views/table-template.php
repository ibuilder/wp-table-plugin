<?php
// This is a template file - it should NOT include its own HTML, DOCTYPE, or body tags!
// It will be included inside regular WordPress content.
?>
<?php if (!empty($data) && is_array($data)): ?>
    <div class="table-responsive">
        <?php if (!empty($template_data['caption'])): ?>
            <div class="h4 mb-3"><?php echo esc_html($template_data['caption']); ?></div>
        <?php endif; ?>
        
        <table id="<?php echo esc_attr($template_data['table_id']); ?>" 
               class="<?php echo esc_attr($template_data['table_classes']); ?>"
               data-export="<?php echo esc_attr($template_data['export']); ?>"
               data-responsive="<?php echo esc_attr($template_data['responsive']); ?>"
               data-state-save="<?php echo esc_attr($template_data['state_save']); ?>"
               data-page-length="<?php echo esc_attr($template_data['page_length']); ?>"
               data-default-sort='<?php echo esc_attr($template_data['default_sort']); ?>'
               data-column-filters="<?php echo esc_attr($template_data['column_filters']); ?>">
            <thead>
                <tr>
                    <?php foreach (array_keys(reset($data)) as $header): ?>
                        <th scope="col"><?php echo esc_html($header); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($row as $cell): ?>
                            <td><?php echo esc_html($cell); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>