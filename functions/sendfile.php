<?php
    $file = $_GET['file'];
    if ( isset($file) && file_exists($file) ) {
        set_time_limit(0);
        $mimeType = mime_content_type($file);

        header( "Pragma: public" );
        header( "Expires: 0" );
        header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
        header( "Cache-Control: private", false );
        header( "Content-Type: $mimeType" );

        // A linha abaixo é responsável por dizer que o arquivo é para download
        header( "Content-Disposition: attachment; filename=\'".basename($file). "\'");

        header( "Content-Transfer-Encoding: binary" );
        header( "Content-Length: ".filesize($file));

        // Lê e escreve o conteúdo do arquivo para o buffer de saída
        readfile($file);

        exit;
    } else {
        // Para dar um erro 404 de arquivo não encontrado
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        header("Status: 404 Not Found");

        // Se as duas linhas acima não der um erro 404 exibe a mensagem abaixo
        die("Arquivo não encontrado");
    }
