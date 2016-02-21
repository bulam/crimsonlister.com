<?php

    // configuration
    require("includes/config.php");
    
    unset($_SESSION['category_book']);
    
    // render template
    render("edit_success_template.php");

?>
