<?php

    // configuration
    require("includes/config.php");
    
    // query for the listings
    $rows = query("SELECT submission, name, author, edition, price, course, `date` FROM books"); 
   
    // query for the categories to display   
    $categories = query("SELECT id, category FROM categories ORDER BY category ASC"); 
    
    // render template
    render ("books_template.php", array("title" => "Book market", "rows"=>$rows, "categories"=> $categories));
          
?>
