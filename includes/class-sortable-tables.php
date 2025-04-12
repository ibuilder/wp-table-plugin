<?php

class SortableTables {
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function render_table() {
        if (empty($this->data)) {
            return '<p>No data available.</p>';
        }

        $table = '<table class="table table-striped table-bordered">';
        $table .= $this->render_table_header();
        $table .= $this->render_table_body();
        $table .= '</table>';

        return $table;
    }

    private function render_table_header() {
        $header = '<thead><tr>';
        foreach (array_keys($this->data[0]) as $column) {
            $header .= '<th>' . esc_html($column) . '</th>';
        }
        $header .= '</tr></thead>';
        return $header;
    }

    private function render_table_body() {
        $body = '<tbody>';
        foreach ($this->data as $row) {
            $body .= '<tr>';
            foreach ($row as $cell) {
                $body .= '<td>' . esc_html($cell) . '</td>';
            }
            $body .= '</tr>';
        }
        $body .= '</tbody>';
        return $body;
    }

    public function filter_data($criteria) {
        // Implement filtering logic based on criteria
        // This is a placeholder for the actual filtering implementation
        return $this->data; // Return filtered data
    }

    public function sort_data($column, $order = 'asc') {
        usort($this->data, function($a, $b) use ($column, $order) {
            if ($order === 'asc') {
                return $a[$column] <=> $b[$column];
            } else {
                return $b[$column] <=> $a[$column];
            }
        });
        return $this->data;
    }
}