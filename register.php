<?php

    // configuration
    require("includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // request username if not provied
        if (empty($_POST["username"]))
        {
            apologize("You must provide a username.");
        }
        // request password if not provided
        else if (empty($_POST["password"]))
        {
            apologize("You must provide a password.");
        }
        
        
        // request first name if not provided
        else if (empty($_POST["firstname"]))
        {
            apologize("Enter your first name.");
        }
        
        // request last name if not provided
        else if (empty($_POST["lastname"]))
        {
            apologize("Enter your last name.");
        }
       
        // warn that passwords don't match if different
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords don't match.");
        }
        
        $_POST["username"] = htmlspecialchars($_POST["username"]);
        $_POST["password"] = htmlspecialchars($_POST["password"]);
        $_POST["lastname"] = htmlspecialchars($_POST["lastname"]);
        $_POST["firstname"] = htmlspecialchars($_POST["firstname"]);
        
        $password = $_POST["password"];
        $firstname = $_POST["firstname"];
        
        // make sure the email address is a college.harvard.edu email address
        if(!preg_match("/@.*harvard\.edu$/", $_POST["username"]))
        {
            apologize("You must provide a Harvard email to register.");
        }       
        
        // insert a new user into the database
        $result = query("INSERT INTO users (username, hash, firstname, lastname) VALUES(?, ?, ?, ?)", $_POST["username"], crypt($_POST["password"]), $_POST["firstname"], $_POST["lastname"]);
        
        if ($result === false)
        {
            apologize("Your data could not be inserted into the database.");
        } 
        
        
        // send a verification email message
        $to = $_POST["username"];
		
	require_once("PHPMailer/class.phpmailer.php");
 
        // instantiate mailer
        $mail = new PHPMailer();
         
        /* use your ISP's SMTP server (e.g., smtp.fas.harvard.edu if on campus or 
        smtp.comcast.net if off campus and your ISP is Comcast) */
        $mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "184.172.170.159"; // SMTP server
	$mail->SMTPAuth   = true;               
	$mail->Host       = "mail.crimsonlister.com";
	$mail->Port       = 26;      
	$mail->Username   = "webmaster@crimsonlister.com"; // SMTP account username
	$mail->Password   = "crimsonlister2012";        // SMTP account password
         
        // set From:
        $mail->SetFrom("webmaster@crimsonlister.com");
         
        // set To:
        $mail->AddAddress("$to");
         
        // set Subject:
        $mail->Subject = 'Crimson Lister e-mail address confirmation';
         
        // set body
        $mail->Body = "<p>Hello $firstname! </br></br> Thanks for signing up for Crimon Lister. You are just a click away from being able to list your textbooks on Crimson Lister!
        Click <a href='http://www.crimsonlister.com/confirm.php?email=$to'>here</a> to confirm your e-mail address. 
        </br></br>This is your login information:
        </br><b>e-mail:</b> $to
        </br><b>password:</b> $password</p>";
         
        // set alternative body, in case user's mail client doesn't support HTML
        $mail->AltBody = "Please view this message in an HTML-enabled browser.";
         
        // send mail
        if ($mail->Send() === false)
            die($mail->ErrorInfo . "\n");
		     
	ini_set('session.bug_compat_warn', 0);
	ini_set('session.bug_compat_42', 0);
		     
        // find out which id was assigned to the user
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        

        // redirect to portfolio
        redirect("register_submitted.php");

        
    }
    else
    {
        // else render form
        render("register_form.php", array("title" => "Register"));
    }

?>