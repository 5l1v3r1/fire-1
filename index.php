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
            <nav class="container-fluid navbar navbar-default drop-shadow">
			<a href="index.php"><i class="fa fa-fire fa-2x"></i><span id="fire">FIRE</span></a>
                <form id="login" class="form-inline navbar-right">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                <button type="button" class="btn btn-primary"><i class="fa fa-user"></i> Log in</button>
            </form></nav>
		</header>
		
		<section class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
             <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row container">
                        <i class="fa fa-folder-open-o"></i> <a href="">Public/</a>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <button type="button" class="btn btn-default"><i class="fa fa-download"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-upload"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-star"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-share-square"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-clone"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-ban"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-exclamation-triangle"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-level-down"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-level-up"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-times-circle"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-folder-open"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-folder-open"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-folder-open"></i></button>
                            <button type="button" class="btn btn-default"><i class="fa fa-folder-open"></i></button>
                        </div>
                        <div class="col-md-4">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control"  placeholder="Search" >
                        <span class="input-group-addon">
                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>
                            </div>
                    </div>

                </div>
                <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Filename <i class="fa fa-sort-desc"></i></th>
                            <th class="text-right">Modified</th>
                            <th class="text-right">Size</th>
                            <!--<th class="text-center">Type</th>-->
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
                                        echo "<tr>";
                                        echo "<td style='vertical-align: middle'><a href='functions/sendfile.php?file=$path".str_replace(' ', '%20', $file) . "'>" . getFileMimeType($path.$file) . " $file</a></td>";
                                        echo "<td style='vertical-align: middle' class='text-right'>" . date ("M d Y H:i:s",filemtime($path.$file)) . "</td>";
                                        echo "<td style='vertical-align: middle' class='text-right'>" . getFileSize($path.$file) . "</td>";
                                        //echo "<td class='text-center' style='vertical-align: middle'>" . getFileMimeType($path.$file). "</td>";
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
                                echo "<div class='panel-footer text-center'><strong>$total_files files, $total_filesize.</strong></div>";
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
	