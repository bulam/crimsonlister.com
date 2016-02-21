<?php

    // configuration
    require("includes/config.php");
    
    $_GET["submission"] = htmlspecialchars($_GET["submission"]);
    
    // query for the listing
    $listing = query("SELECT name, author, id, edition, price, course, date, `condition`, description FROM books WHERE submission = ?", $_GET["submission"]); 
       
    // store the seller's id
    $seller_id = $listing[0]["id"];

    // store the seller id and the listing info in the session   
    $_SESSION['sellerid'] = $listing[0]["id"];
    $_SESSION['listinginfo'] = $listing;
    
    // render template
    render("book_details_template.php", array("title" => "Book details", "listing" => $listing, "seller_id" => $seller_id));

?>
