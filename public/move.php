<?php
//ambil file
$content = file_get_contents("https://abimanyutour.id/wp-content/abimanyu.zip");
 
//simpan di server hosting baru.
$fp = fopen("/home/pshtsing/public_html/abimanyu.zip", "w");
 
fwrite($fp, $content);
fclose($fp);
 