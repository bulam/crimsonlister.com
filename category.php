<?php

    // configuration
    require("includes/config.php");
    
    $_GET["category"] = htmlspecialchars($_GET["category"]);
    
    // query for the listings
    $rows = query("SELECT submission, name, author, edition, price, course, `date` FROM books WHERE category = ?", $_GET["category"]); 
    
    // render template
    render ("category_template.php", array("title" => "Book market", "rows"=>$rows));
          
?>
