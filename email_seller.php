<?php

// configuration
require("includes/config.php");

// if logged in prefill some fields in the email form
if (!empty($_SESSION["id"]))
{
    // if the email the seller form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {

        
        // retreive the seller's email using his id
        $seller_id = $_SESSION['sellerid'];
        
        // query for the seller's email
        $user_query = query("SELECT * FROM users WHERE id = ?", $seller_id);
        
        $to = $user_query[0]["username"]; 
        
        // send an email to the seller
	require_once("PHPMailer/class.phpmailer.php");

        // instantiate mailer
        $mail = new PHPMailer();
         
        /* use your ISP's SMTP server (e.g., smtp.fas.harvard.edu if on campus or 
        smtp.comcast.net if off campus and your ISP is Comcast) */
        $mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "184.172.170.159"; // SMTP server
	$mail->SMTPDebug  = 1;
	$mail->SMTPAuth   = true;               
	$mail->Host       = "mail.crimsonlister.com";
	$mail->Port       = 26;      
	$mail->Username   = "webmaster@crimsonlister.com"; // SMTP account username
	$mail->Password   = "crimsonlister2012";        // SMTP account password
        
        $_POST['buyer_email'] = htmlspecialchars($_POST['buyer_email']);
        
        if (empty($_POST["buyer_email"]))
        {
            apologize("You must enter a return email address.");
        }
         
        // set From:
        $mail->SetFrom($_POST['buyer_email']);
         
        // set To:
        $mail->AddAddress($to);
    
        // set Subject:
        $mail->Subject = 'Someone is interested in buying your textbook listed on Crimson Lister!';
        
        $_POST['message'] = htmlspecialchars($_POST['message']);
        
        if (empty($_POST["message"]))
        {
            apologize("Your message cannot be empty.");
        }
         
        // set body
        $mail->Body = $_POST['message'];
        
        // set alternative body, in case user's mail client doesn't support HTML
        $mail->AltBody = "Please view this message in an HTML-enabled browser.";
         
        // send mail
        if ($mail->Send() === false)
            die($mail->ErrorInfo . "\n");
            
        // display confirmation message
        else
            redirect("email_success.php");
          
    }    

    else
    {    
        // query for the buyer's info
        $buyer_query = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        
        // render template
        render("email_seller_template.php", array("title" => "Email seller", "buyer_query" => $buyer_query));
    }    
}

// else load an unprefilled form
else
{
    // if the email the seller form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // retreive the seller's email using his id
        $seller_id = $_SESSION['sellerid'];
        
        // query for the seller's email
        $user_query = query("SELECT * FROM users WHERE id = ?", $seller_id);
        
        $to = $user_query[0]["username"]; 
        
        // send an email to the seller
	require_once("PHPMailer/class.phpmailer.php");

        // instantiate mailer
        $mail = new PHPMailer();
         
        /* use your ISP's SMTP server (e.g., smtp.fas.harvard.edu if on campus or 
        smtp.comcast.net if off campus and your ISP is Comcast) */
        $mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "184.172.170.159"; // SMTP server
	$mail->SMTPDebug  = 1;
	$mail->SMTPAuth   = true;               
	$mail->Host       = "mail.crimsonlister.com";
	$mail->Port       = 26;      
	$mail->Username   = "webmaster@crimsonlister.com"; // SMTP account username
	$mail->Password   = "crimsonlister2012";        // SMTP account password
         
        $_POST['buyer_email'] = htmlspecialchars($_POST['buyer_email']);
        
        if (empty($_POST["buyer_email"]))
        {
            apologize("You must enter a return email address.");
        }
        
        
        // set From:
        $mail->SetFrom($_POST['buyer_email']);
         
        // set To:
        $mail->AddAddress($to);
    
        // set Subject:
        $mail->Subject = 'Someone is interested in buying your textbook listed on Crimson Lister!';
          
        $_POST['message'] = htmlspecialchars($_POST['message']);
        
        if (empty($_POST["message"]))
        {
            apologize("Your message cannot be empty.");
        }
    
        // set body
        $mail->Body = $_POST['message'];
        
        // set alternative body, in case user's mail client doesn't support HTML
        $mail->AltBody = "Please view this message in an HTML-enabled browser.";
         
        // send mail
        if ($mail->Send() === false)
            die($mail->ErrorInfo . "\n");
            
        // display confirmation message
        else
            redirect("email_success.php");          
    }    

    else
    {  
        // render template
        render("email_seller_template_guest.php", array("title" => "Email seller"));
    } 
}
?>