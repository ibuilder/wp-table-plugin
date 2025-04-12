# Sortable Tables Plugin for WordPress

A powerful WordPress plugin that creates responsive, sortable, and filterable tables using shortcodes. Built on the robust DataTables jQuery plugin with Bootstrap styling.

## Features

- ✅ Sortable columns with customizable default sorting
- ✅ Search filtering across all columns
- ✅ Column-specific filtering options
- ✅ Export to CSV, Excel, PDF, and print
- ✅ Responsive tables that work on all devices
- ✅ Custom styling options and themes
- ✅ Pagination with customizable page lengths
- ✅ State saving (remembers user's sorting preferences)

## Installation

1. Download the plugin ZIP file
2. Go to WordPress Admin > Plugins > Add New > Upload Plugin
3. Browse for the ZIP file and click "Install Now"
4. Activate the plugin through the 'Plugins' menu

## Basic Usage

Insert a table using the `sortable_table` shortcode:

```
[sortable_table data="your_data_source"]
```

Replace `your_data_source` with the appropriate data source or parameters as defined in the plugin documentation.

## Customization

You can customize the appearance of the tables by modifying the CSS in `public/css/sortable-tables-public.css`.

## Advanced Options

The shortcode accepts multiple parameters to customize your tables:

```
[sortable_table data='[{"Product": "Widget A", "Price": "$10.99", "Stock": "25"},{"Product": "Widget B", "Price": "$14.99", "Stock": "10"}]' export="true" theme="striped" caption="Product Inventory" ]
```

## Available Parameters

| Parameter | Options | Default | Description |
|-----------|---------|---------|-------------|
| `data` | JSON array | required | Table data in JSON format |
| `export` | true/false | false | Enable export buttons (CSV, Excel, PDF, etc.) |
| `responsive` | true/false | true | Make table responsive on mobile devices |
| `paging` | true/false | true | Enable pagination |
| `searching` | true/false | true | Enable search functionality |
| `state_save` | true/false | false | Remember user's sorting and filtering preferences |
| `page_length` | number | 10 | Number of rows per page |
| `default_sort` | [column, order] | [] | Default sorting (column index and 'asc' or 'desc') |
| `column_filters` | true/false | false | Enable per-column filtering |
| `theme` | string | default | Table styling theme (options: default, dark, striped, bordered, hover, striped-hover) |
| `caption` | string | '' | Table caption/title |

## Example: Table with Export Options

```
[sortable_table data='[{"Name": "John", "Sales": "1200", "Region": "North"},{"Name": "Mary", "Sales": "1800", "Region": "South"}]' default_sort='[1,"desc"]' ]
```

## Example: Table with Column Filters

## Support

For support, please visit the plugin's support forum or contact the developer.

## Troubleshooting

**Table not displaying correctly?**
- Ensure your JSON data is properly formatted
- Try using a JSON validator to check your data structure
- Check browser console for JavaScript errors

**Export buttons not showing?**
- Make sure `export="true"` is set in your shortcode

**Need help?**
- [Open an issue](link-to-github-issues) on our GitHub repository

## Credits

This plugin is built using:
- [DataTables](https://datatables.net/) jQuery plugin
- [Bootstrap](https://getbootstrap.com/) framework

## Changelog

- **1.0.0**: Initial release of the Sortable Tables Plugin.