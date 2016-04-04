<?php
    require_once "functions/getFileSize.php";
    require_once "functions/getFileType.php";
?>

<section id="panel-files" class="row">
    <div class="container">

        <div class="panel panel-default">

            <!-- Panel Heading -->
            <div class="panel-heading">

                <!-- Breadcrumb bar -->
                <div class="row container">
                    <i class="fa fa-folder-open-o"></i>
                    <ol class="breadcrumb">
                        <li><a href="#">Public</a></li>
                    </ol>
                </div>

                <hr>

                <div class="row">

                    <!-- Buttons bar -->
                    <div class="col-md-9">
                        <?php
                            session_start();
                            //if($_SESSION['logged'] == false) {
                             if(false) {
                        ?>
                                <button type="button" class="btn btn-default download"><i class="fa fa-download"></i></button>
                        <?php
                            } else {
                        ?>
                                <button type="button" class="btn btn-default download"><i class="fa fa-download"></i></button>
                                <button id="delete" type="button" class="btn btn-default"><i class="fa fa-trash"></i></button>
                        <?php
                            }
                        ?>
                    </div>

                    <!-- Search bar -->
                    <div class="col-md-3">
                        <form class="input-group stylish-input-group">
                            <input type="text" class="form-control"  placeholder="Search">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </form>
                    </div>

                </div>

            </div>

            <!-- Panel Body-->
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr style="width: 100%">
                            <th style='width: 65%' class="text-left">Filename <i class="fa fa-sort-desc"></i></th>
                            <th style='width: 20%' class="text-right">Modified</th>
                            <th style='width: 10%' class="text-right">Size</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once "functions/getFileSize.php";
                    require_once "functions/getFileType.php";

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
                            if ( is_file($path.$file) && !in_array($file,$ignoredFiles) ) { ?>
                                <tr style='width: 100%'>
                                <td style='vertical-align: middle; width: 65%;' class='text-left'>
                                    <a class="trigger" href="<?php echo "functions/sendFile.php?file=" . $path . urlencode($file) ?>"><?php echo getFileMimeType($path.$file) . " " . $file; ?></a></td>
                                <td style='vertical-align: middle; width: 20%;' class='text-right'><?php echo date ("M d Y H:i",filemtime($path.$file)); ?></td>
                                <td style='vertical-align: middle; width: 10%;' class='text-right'><?php echo getFileSize($path.$file); ?></td>
                                </tr>
                        <?php
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
                    ?>
                        </tbody>
                </table>
            </div>

            <div class='panel-footer text-center'>
                <p><strong><?php echo $total_files ?> files, <?php echo $total_filesize; ?>.</strong></p>
            </div>

            <?php
                    // unsetting variables
                        unset($path,$file,$total_files,$total_filesize);
                    }

            ?>

        </div> <!-- panel -->
    </div> <!-- container -->
</section>