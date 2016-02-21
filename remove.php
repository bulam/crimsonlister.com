<?php

    // configuration
    require("includes/config.php");
    
    $_GET["submission"] = htmlspecialchars($_GET["submission"]);
    
    // check whether the user owns the book
    $ownercheck = query("SELECT * FROM books WHERE submission = ? AND id = ?", $_GET["submission"], $_SESSION["id"]);
    if (empty($ownercheck))
    {
        apologize("You do not own this book.");
    }
    
    else
    {
        // remove the book from the database
        query ("DELETE FROM books WHERE id = ? AND submission = ?", $_SESSION["id"], $_GET["submission"]);
        
        // redirect to the my account page
        redirect("account.php");   
    }
?>
