<?php

    // configuration
    require("includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }

        $_POST["username"] = htmlspecialchars($_POST["username"]);
        $_POST["password"] = htmlspecialchars($_POST["password"]);
        
        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // query for confirm status
        $confirmstatus = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // allow only confirmed or existing users to login
        if (@$confirmstatus[0]["confirmed"] == 0)
        {
            apologize("You are either not registered or have not confirmed your account.");
        }
            
            // if we found user, check password
            if (count($rows) == 1)
            {
                // first (and only) row
                $row = $rows[0];

                // compare hash of user's input against hash that's in database
                if (crypt($_POST["password"], $row["hash"]) == $row["hash"])
                {
                    // remember that user's now logged in by storing user's ID in session
                    $_SESSION["id"] = $row["id"];

                    // redirect to portfolio
                    redirect("/");
                }
            }

            // else apologize
            apologize("Invalid username and/or password.");
    }
    else
    {
        // else render form
        render("login_form.php", array("title" => "Log In"));
    }

?>
