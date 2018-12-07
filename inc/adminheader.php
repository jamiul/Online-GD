<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/../lib/Session.php';
Session::init();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="inc/bootstrap.min.js"></script>
        <script src="inc/jquery.min.js"></script>
    </head>
    <?php
if (isset($_GET['action']) && ($_GET['action']) == "logout") {
 	Session::destroy();
 } 
?>

        <body>
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header"> <a class="navbar-brand" href="index.php">HOME
					</a> </div>
                        <ul class="nav navbar-nav pull-right">
                            <?php
				$id = Session::get("id");
				$userlogin = Session::get("login");
				if ($userlogin == true) {
				?>
                                <li><a href="AdminMain.php">Home</a></li>
                                <li><a href="lostfound.php">Lost & Found</a></li>
                                <li><a href="?action=logout">Logout</a></li>
                                <?php }else{ ?>
                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="register.php">Register</a></li>
                                    <?php } ?>
                        </ul>
                    </div>
                </nav>