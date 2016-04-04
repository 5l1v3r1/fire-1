<?php if(!isset($_SESSION)) session_start();
var_dump($_SESSION);
?>

<!DOCTYPE html>
<!--
	FIRE - File Repository (v0.1.0 alpha)
	Copyright (c) 2015, Adjamilton Junior (jr@ieee.org).
	
	Licensed under MIT License.	
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Adjamilton Junior">
		<meta name="description" content="Fire is a web application for sharing files.">
		<meta name="keywords" content="Fire, File Repository, share, file, server">

        <title>FIRE - File Repository</title>

        <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		
		<!-- CSS -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">

        <!-- JS -->
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/main.js"></script>
    </head>
	<body>

        <?php $_SESSION['logged'] = false; ?>

        <!-- Including Header -->
        <?php include "header.inc.php"; ?>

        <!-- Including Main Page -->
        <?php
            if ( !isset($_REQUEST['content']) )
                include("public.php");
            else {
                $content = $_REQUEST['content'];
                $nextpage = $content . ".inc.php";
                include($nextpage);
            }
        ?>

        <!-- Including Header -->
        <?php include "footer.inc.php"; ?>
    
	</body>
</html>
	