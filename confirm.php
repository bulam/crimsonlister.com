<?php

    // configuration
    require("includes/config.php");
    
    $_GET['email'] = htmlspecialchars($_GET['email']);
    
	// set the user to confirmed
	$email = $_GET['email'];
	        
	$query = query ("UPDATE users SET confirmed = 1 WHERE username = ?", $email);
	
    // render template
    render("confirm_template.php", array("title" => "Confirmation success"));
?>
