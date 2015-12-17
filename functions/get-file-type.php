<?php
function getFileMimeType ($file)
{
    switch(mime_content_type($file)) {
        // Plain Text (txt)
        case 'text/plain':
            return "<i class=\"fa fa-file-text-o\"></i>";
            break;

        // Compressed files
        case 'application/zip':
        case 'application/x-7z':
        case 'application/x-rar':
        case 'application/x-tar':
        case 'application/x-gzip':
        case 'application/x-bzip2':
            return "<i class=\"fa fa-file-archive-o\"></i>";
            break;

        // PDF files
        case 'application/pdf':
            return "<i class=\"fa fa-file-pdf-o\"></i>";
            break;

        // MS Word files
        case 'application/msword':
        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            return "<i class=\"fa fa-file-word-o\"></i>";
            break;

        // MS PowerPoint
        case 'application/vnd.ms-powerpoint':
        case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
            return "<i class=\"fa fa-file-powerpoint-o\"></i>";
            break;

        // MS Excel
        case 'application/vnd.ms-excel':
        case 'application/vnd.ms-office':
        case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
            return "<i class=\"fa fa-file-excel-o\"></i>";
            break;

        // Audios
        case 'audio/mpeg':
        case 'audio/ogg':
        case 'audio/midi':
            return "<i class=\"fa fa-file-audio-o\"></i>";
            break;

        // Images JPEG, PNG, SVG+XML, GIF
        case 'image/jpeg':
        case 'image/png':
        case 'image/svg+xml':
        case 'image/gif':
            return "<i class=\"fa fa-file-image-o\"></i>";
            break;

        // Videos
        case 'video/mp4':
        case 'video/ogg':
            return "<i class=\"fa fa-file-video-o\"></i>";
            break;

        // Source Code  files (Python, Makefile, html, c, shell, TeX)
        case 'text/x-python':
        case 'text/x-makefile':
        case 'text/html':
        case 'text/x-c':
        case 'text/x-c++':
        case 'text/x-shellscript':
        case 'text/x-tex':
        case 'text/x-latex':
            return "<i class=\"fa fa-file-code-o\"></i>";
            break;

        // Exec files
        case 'application/x-dosexec': // TODO: ask Font Awesome about a exec file icon

        // XML
        case 'application/xml': // TODO: asj FA about a XML file icon

        // BitTorrent
        case 'application/x-bittorrent': // TODO: ask FA about a bittorrent icon

        // DMG (ZLIB)
        case 'application/zlib': // TODO: ask FA about a macos exec file icon

        // OCTET STREAM
        case 'application/octet-stream': // TODO: ??

        // inode/x-empty

        // ISO
        case 'application/x-iso9660-image':

        // Java JAR
        case 'application/java-archive':

        // All files not listed before
        default:
            return "<i class=\"fa fa-file-o\"></i>";
            break;
    }
}