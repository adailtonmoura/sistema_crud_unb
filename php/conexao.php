<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    //settando a região do horário
    date_default_timezone_set('America/Sao_Paulo');
    // pegando a data e hora do erro
    $data =  date("Y:m:d h:i:s");
    // dizendo qual o arquivo que o sistema deve abrir
    $arquivo = "log.txt";

    // formatando a mensagem
    $texto = "DATA: ".$data."\n";
    $texto .= "ERRO: ".$e->getMessage()."\n";
    
    //file open ou Abrir Arquivo
    $fp = fopen($arquivo, "a+");
    // file write ou Escrever no arquivo
    fwrite($fp,$texto);
    // fechar o arquivo
    fclose($fp);
}
