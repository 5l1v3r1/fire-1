<?php
function getFileSize ($file)
{
    // Considering 1 kb = 1000 bytes.
    $kb = 1000;
    $mb = $kb * 1000;
    $gb = $mb * 1000;
    $tb = $gb * 1000;
    $pb = $tb * 1000;

    $size = filesize($file);

    if ($size < $kb) return $size . " bytes";
    elseif ($size < $mb) return number_format($size / $kb, 1) . " KB";
    elseif ($size < $gb) return number_format($size / $mb, 1) . " MB";
    elseif ($size < $tb) return number_format($size / $gb, 1) . " GB";
    elseif ($size < $pb) return number_format($size / $tb, 1) . " TB";
    else return number_format($size / $pb, 1) . " PB";
}