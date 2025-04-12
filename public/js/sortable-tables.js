(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Initialize all sortable tables
        $('.sortable-table').each(function() {
            // Get custom options from data attributes
            const tableId = $(this).attr('id');
            const exportOptions = $(this).data('export') === 'true';
            const responsive = $(this).data('responsive') !== 'false';
            const stateSave = $(this).data('state-save') === 'true';
            const defaultPageLength = parseInt($(this).data('page-length')) || 10;
            const defaultOrder = $(this).data('default-sort') ? 
                JSON.parse($(this).data('default-sort')) : [];
                
            if (!$.fn.DataTable.isDataTable(this)) {
                // Base configuration
                let config = {
                    responsive: responsive,
                    order: defaultOrder,
                    pageLength: defaultPageLength,
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    stateSave: stateSave,
                    language: {
                        search: "Filter records:",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        emptyTable: "No data available in table"
                    },
                    initComplete: function() {
                        // Add advanced column-specific filters
                        if ($(this).data('column-filters') === 'true') {
                            this.api().columns().every(function() {
                                const column = this;
                                const header = $(column.header());
                                
                                // Skip columns marked as not filterable
                                if (header.hasClass('no-filter')) return;
                                
                                const select = $('<select class="form-control form-control-sm"><option value="">All</option></select>')
                                    .appendTo(header)
                                    .on('change', function() {
                                        const val = $.fn.dataTable.util.escapeRegex($(this).val());
                                        column.search(val ? '^'+val+'$' : '', true, false).draw();
                                    });
                                
                                column.data().unique().sort().each(function(d) {
                                    if (d) select.append('<option value="'+d+'">'+d+'</option>');
                                });
                            });
                        }
                    }
                };
                
                // Add export buttons if enabled
                if (exportOptions && $.fn.dataTable.Buttons) {
                    config.dom = 'Blfrtip';
                    config.buttons = [
                        {
                            extend: 'collection',
                            text: 'Export',
                            buttons: [
                                'copy', 
                                'csv', 
                                'excel', 
                                'pdf', 
                                'print'
                            ]
                        }
                    ];
                }
                
                // Initialize the table
                $(this).DataTable(config);
                
                // Add accessibility improvements
                $(this).find('input, select').attr('aria-label', 'Search and filter controls');
            }
        });
    });
    
})(jQuery);