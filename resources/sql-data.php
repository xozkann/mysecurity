<?php
//Veritabanı Bağlantısı
require 'connect.php';

$kullanicilar = $db->query('SELECT * FROM vt_kullanicilar WHERE vt_durum = 1', PDO::FETCH_ASSOC);

$lisanslar = $db->query('SELECT * FROM vt_lisanslar', PDO::FETCH_ASSOC);

$ihbarlar = $db->query('SELECT * FROM vt_ihbarlar', PDO::FETCH_ASSOC);
?>