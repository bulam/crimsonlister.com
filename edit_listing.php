<?php

    // configuration
    require("includes/config.php");
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
{    
        // request the name of the textbook if not provied
        if (empty($_POST["name"]))
        {
            apologize("Enter the name of your textbook.");
        }
        
        // request the author if not provided
        else if (empty($_POST["author"]))
        {
            apologize("Enter the author of the textbook");
        }
        
        // request the edition if not provied
        if (empty($_POST["edition"]))
        {
            apologize("Enter the edition of your textbook.");
        }
        
        // request the categroy if not provied
        if (empty($_POST["category"]))
        {
            apologize("Choose the category of your textbook.");
        }
        
        // request the price if not provided
        else if (empty($_POST["price"]))
        {
            apologize("You must provide the price of your textbook.");
        }
        
        // request the course name if not provided
        else if (empty($_POST["course"]))
        {
            apologize("You must provide the course name.");
        }
        
        // request the condition if not provided
        else if (empty($_POST["condition"]))
        {
            apologize("You must provide the condition of your book.");
        }
       
        // improve security
        $_POST["name"] = htmlspecialchars($_POST["name"]);
        $_POST["author"] = htmlspecialchars($_POST["author"]);
        $_POST["edition"] = htmlspecialchars($_POST["edition"]);
        $_POST["price"] = htmlspecialchars($_POST["price"]);
        $_POST["course"] = htmlspecialchars($_POST["course"]);
        $_POST["condition"] = htmlspecialchars($_POST["condition"]);
        $_POST["description"] = htmlspecialchars($_POST["description"]);
        $_POST["category"] = htmlspecialchars($_POST["category"]);
             
        // get the user's data from the database
        $user = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        
        // find out current time
        $time = date("F j, Y");
        
        // query for the id number of the category
        $cat_id = query("SELECT * FROM categories WHERE category = ?", $_POST["category"]);
        
        // check whether the user owns the book
        $ownercheck = query("SELECT * FROM books WHERE submission = ? AND id = ?", $_SESSION['submission_id'], $_SESSION["id"]);
        if (empty($ownercheck))
        {
            apologize("You do not own this book.");
        }
            
        // update the listing
        query ("UPDATE books SET id = '".$_SESSION['id']."', name = '".$_POST['name']."', author =  '".$_POST['author']."', 
        edition = '".$_POST['edition']."', price = '".$_POST['price']."', course = '".$_POST['course']."', 
        `updated` = '".$time."', `condition` =  '".$_POST['condition']."', `description` = '".$_POST['description']."',
         `category` = '".$cat_id[0]['id']."' WHERE submission = '".$_SESSION['submission_id']."'");
               
        // redirect to submit successful page
        redirect ("edit_success.php");             
}

else
{
    
    $_GET["submission"] = htmlspecialchars($_GET["submission"]);
    
    // check whether the user owns the book
    $ownercheck = query("SELECT * FROM books WHERE submission = ? AND id = ?", $_GET["submission"], $_SESSION["id"]);
    if (empty($ownercheck))
    {
        apologize("You do not own this book.");
    }
    
    // query for the listing
    $listing = query("SELECT name, author, id, edition, price, course, date, `condition`, `description`, 
    `category` FROM books WHERE submission = ?", $_GET["submission"]); 
    
    $listing_id = $listing[0]["category"];
    
    // store listing id in a session variable
    $_SESSION["submission_id"] = $_GET["submission"];
    
    // query for the listing's category
    $category = query("SELECT * FROM categories WHERE id = ?", $listing_id);
    
    // query for categories in the dropdown menu
    $dropcategories = query("SELECT * FROM categories ORDER BY category ASC");
    
    // render template
    render("edit_listing_template.php", array("title" => "Edit a listing", "listing" => $listing, "category" => $category, "dropcategories" => $dropcategories));
}
?>
