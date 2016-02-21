<div id=middle>

<!--The algorithm below has been adapted from http://stackoverflow.com/questions/6938094/data-from-database-with-foreach-from-top-to-down#6938762 -->
<?php
$columns = 3;
$rows = ceil(count($categories) / $columns);

echo '<table class="table table-striped" style="width: 65%; margin: 0 auto">';

for ($row = 0; $row < $rows; $row++) {
    
    echo '<tr>';
    foreach ($categories as $k => $category) {
        if ($k % $rows == $row) {
            echo '<td><a href="category.php?category='.$category["id"].'">'.$category["category"].'</a></td>';
        }
    }

    echo '</tr>';
}

echo '</table>';

?>


</div>
