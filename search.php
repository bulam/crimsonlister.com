<?php

    // configuration
    require("includes/config.php");
    
    $search = (isset($_GET['search']) ? $_GET['search'] : null);
    
    $_GET["search"] = htmlspecialchars($_GET["search"]);
    
    if (empty($_GET["search"]))
    {
        apologize("No search term entered.");
    }
    
    // find the listings with the keyword
    $rows = query("SELECT * FROM books WHERE name LIKE '%$search%' OR author LIKE '%$search%' OR course LIKE '%$search%' OR description LIKE '%$search%'"); 
    
    // render the template
    render("search_template.php", array("title" => "Search Results", "rows" => $rows));   
    
?>
