<?php
require_once 'connect.php';

$db->query("DELETE FROM vt_lisanslar WHERE vt_bitarihi = curdate();", PDO::FETCH_ASSOC);
?>
