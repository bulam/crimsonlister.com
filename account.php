<?php

    // configuration
    require("includes/config.php");
    
    // query for the user's books
    $rows = query("SELECT submission, name, author, edition, price, course, date FROM books WHERE id = ?", $_SESSION["id"]);
    
    // render template
    render("account_template.php", array("title" => "My account", "rows"=>$rows));

?>
