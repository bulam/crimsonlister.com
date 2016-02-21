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
            apologize("You must provide the course name.");
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
        
        // add the book to the user's portfolio
        query ("INSERT INTO books (id, name, author, edition, price, course, `date`, `condition`, `description`, `category`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
        $_SESSION["id"], strtoupper($_POST["name"]), $_POST["author"], $_POST["edition"], $_POST["price"], $_POST["course"], $time, $_POST["condition"], $_POST["description"], $cat_id[0]["id"]);
        
        // redirect to submit successful page
        redirect ("submit_success.php"); 
            
}
else
{
    // query for categories in the dropdown menu
    $dropcategories = query("SELECT * FROM categories ORDER BY category ASC");
    
    // render template
    render("submit_template.php", array("title" => "Submit a listing", "dropcategories" => $dropcategories));
}
?>
