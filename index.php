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
		
		<section class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
             <div class="panel panel-default">
                <div class="panel-heading">Motherfuck options goes here... =)</div>
                <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Filename <i class="fa fa-sort-desc"></i></th>
                            <th>Modified</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once "functions/get-file-size.php";
                            require_once "functions/get-file-type.php";

                            // Configuration
                            $ini_array = parse_ini_file("config.ini");
                            $path = $ini_array['path'];

                            // Files to be ignored
                            $ignoredFiles = array(".DS_Store",".localized");

                            $total_files = 0;
                            $total_filesize = 0;

                            // scandir function automatically sort the array
                            if ( $files = scandir($path) ) {
                                foreach ($files as $file)
                                    if ( is_file($path.$file) && !in_array($file,$ignoredFiles) ) {
                                        echo "<tr class='pull-middle'>";
                                        echo "<td><a href='functions/sendfile.php?file=$path$file'>$file</a></td>";
                                        echo "<td>" . date ("M d Y H:i:s",filemtime($path.$file)) . "</td>";
                                        echo "<td class='text-right'>" . getFileSize($path.$file) . "</td>";
                                        echo "<td class='text-center'>" . getFileMimeType($path.$file). "</td>";
                                        echo "</tr>";

                                        $total_files++;
                                        $total_filesize += filesize($path.$file);
                                    }

                                $kb = 1000;
                                $mb = $kb * 1000;
                                $gb = $mb * 1000;
                                $tb = $gb * 1000;
                                $pb = $tb * 1000;

                                if ($total_filesize < $kb) $total_filesize = $total_filesize . " bytes";
                                elseif ($total_filesize < $mb) $total_filesize =  number_format($total_filesize / $kb, 1) . " KB";
                                elseif ($total_filesize < $gb) $total_filesize =  number_format($total_filesize / $mb, 1) . " MB";
                                elseif ($total_filesize < $tb) $total_filesize =  number_format($total_filesize / $gb, 1) . " GB";
                                elseif ($total_filesize < $pb) $total_filesize =  number_format($total_filesize / $tb, 1) . " TB";
                                else $total_filesize =  number_format($total_filesize / $pb, 1) . " PB";

                                echo "</tbody></table></div>";
                                echo "<div class='panel-footer text-center'>$total_files files, $total_filesize.</div>";
                                // unsetting variables
                                unset($path,$file,$total_files,$total_filesize);
                            }
                            else {
                                echo "<tr><td class='rowspan: 4'>File not found</td></tr>";
                            }
                        ?>


            </div> <!-- panel -->
            </div>
            <div class="col-md-1"></div>
		</section>
		
		<footer class="text-center">
			FIRE is made with <i class="fa fa-heart-o"></i> by Adjamilton Junior. Enjoy it! ;)<br>
            For more information visit the <a href="https://github.com/ajunior/fire">Github</a> repository.
		</footer>

	</body>
</html>
	