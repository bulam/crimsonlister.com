<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Book Exchange: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Book Exchange</title>
        <?php endif ?>

        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>
        
        <?php 

function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri)
        echo 'class="active"';
}

?>

    </head>

    <body>

        <div class="container">
            <div id="top">
                <a href="/"><img alt="textbook exchange" src="img/logo2.png"/></a>
            </div>
            
            <div id="top" class="container">
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="nav">
                            <li <?=echoActiveClassIfRequestMatches("index")?>><a href="/">Home</a></li>
                            <li class="divider-vertical"></li>
                            <li <?=echoActiveClassIfRequestMatches("books")?>><a href="books.php">Used books exchange</a></li>
                            <li class="divider-vertical"></li>
                            <li <?=echoActiveClassIfRequestMatches("submit")?>><a href="submit.php">Submit a listing</a></li>
                            <li class="divider-vertical"></li>
                            <li <?=echoActiveClassIfRequestMatches("account")?>><a href="account.php">My account</a></li>
                            <?php if (!empty($_SESSION["id"]))
                    {
                    print('<li class="divider-vertical"></li><li><a href="logout.php">Log out</a></li>');
                    } ?>
                        </ul>
                    </div> 
                </div>
            </div>

            <br/>
            
            <div id="middle">

