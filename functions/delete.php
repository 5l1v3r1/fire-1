<?php
    $file = $_GET['file'];
    echo shell_exec("rm '$file'");
