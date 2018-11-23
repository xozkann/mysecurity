<?php
ob_start();
if(!isset($_SESSION)) : session_start(); endif;
try {

    date_default_timezone_set('Europe/Istanbul');
    $db = NEW pdo('mysql:host=localhost;dbname=veritabanı adı;charset=utf8', 'veritabanı kullanıcı adı', 'veritabanı şifre');
    //echo 'Bağlantı başarılı.';

} catch(Exception $e) {

    echo 'Hata: '.$e->getMessage();

}
?>
