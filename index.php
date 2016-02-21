<?php

    // configuration
    require("includes/config.php");
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
{    
    // ensure that symbol entered; pass into template if entered
    if (empty($_GET["search"]))
    {
        apologize("Enter a search term.");
    }
    
    $_GET["search"] = htmlspecialchars($_GET["search"]);
    
    // redirect to search results
    redirect("/search.php");
        
}
else
{
    // render template
    render("index_template.php");
}

?>
