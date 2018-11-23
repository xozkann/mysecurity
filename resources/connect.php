<?php
ob_start();
if(!isset($_SESSION)) : session_start(); endif;
try {

    date_default_timezone_set('Europe/Istanbul');
    $db = NEW pdo('mysql:host=localhost;dbname=sql;charset=utf8', 'root', 'Sananelan2003!');
    //echo 'Bağlantı başarılı.';

} catch(Exception $e) {

    echo 'Hata: '.$e->getMessage();

}
?>