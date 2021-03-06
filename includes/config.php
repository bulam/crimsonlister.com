<?php

    /***********************************************************************
     * config.php
     *
     * Configures pages.
     **********************************************************************/

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("constants.php");
    require("functions.php");

    // enable sessions
    session_start();

    // require authentication for some pages
    if (!preg_match("{(?:login|logout|register|index|books|category|email_seller|search|book_details|confirm|email_success|register_submitted)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    }

?>
