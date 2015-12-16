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
		
		<!-- Bootstrap 3.3.6
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">	-->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Local CSS -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
		
		<!-- Font Awesome 4.5.0 -->
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">

	</head>
	<body>
		<header>
            <nav class="container-fluid navbar navbar-default">
			<a href="index.php"><i class="fa fa-fire fa-2x"></i><span id="fire">FIRE</span></a>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form></nav>
		</header>
		
		<section class=" row">
            <div class="col-md-1"></div>
            <div class="col-md-10 panel panel-default">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Filename</th>
                            <th>Size</th>
                            <th>Modified</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $path = '/Users/ajr/Downloads/Zipped/';

                            // Files to be ignored
                            $ignoredFiles = array(".DS_Store");

                            // scandir function automatically sort the array
                            if ( $files = scandir($path) ) {
                                foreach ($files as $file)
                                    if ( is_file($path.$file) && !in_array($file,$ignoredFiles) ) {
                                        echo "<tr>";
                                        echo "<td><a href='download.php?file=$path$file'>$file</a></td>";
                                        echo "<td>" . number_format(filesize($path.$file), 2, '.', '') . "</td>";
                                        echo "<td>" . date ("F d Y H:i:s",filemtime($path.$file)) . "</td>";
                                        echo "<td>" . mime_content_type($path.$file). "</td>";
                                    }
                                // unsetting variables
                                unset($path,$file);
                            }
                            else {
                                include("error.php");
                            }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="col-md-1"></div>
		</section>
		
		<footer class="text-center">
			FIRE is made with <i class="fa fa-heart-o"></i> by Adjamilton Junior. Enjoy it! ;)<br>
            For more information visit the Github <a href="https://github.com/ajunior/fire">repository</a>.
		</footer>

	</body>
</html>
	