<?php

$data = [
    'Item 1', 'Item 2', 'Item 3',
    'Item 4', 'Item 5', 'Item 6',
    'Item 7', 'Item 8', 'Item 9',
    'Item 10', 'Item 11'
]; // Sample data

$cols_per_row = 3; // Define how many columns per row
$counter = 0; // Initialize a counter

echo '<table>'; // Start the HTML table

foreach ($data as $item) {
    if ($counter % $cols_per_row === 0) {
        // Start a new row every 'cols_per_row' items
        echo '<tr>'; 
    }

    echo '<td>' . $item . '</td>'; // Display the item in a table data cell

    $counter++; // Increment the counter

    if ($counter % $cols_per_row === 0) {
        // Close the row after 'cols_per_row' items
        echo '</tr>';
    }
}

// Handle any remaining items in the last row if the total count is not a multiple of 'cols_per_row'
if ($counter % $cols_per_row !== 0) {
    // Fill remaining cells with empty ones to complete the row
    $remaining_cells = $cols_per_row - ($counter % $cols_per_row);
    for ($i = 0; $i < $remaining_cells; $i++) {
        echo '<td>&nbsp;</td>'; // Add empty cells
    }
    echo '</tr>'; // Close the last row
}

echo '</table>'; // End the HTML table

?>