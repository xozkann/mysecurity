<?php
require_once 'connect.php';
include 'sql-data.php';

if (isset($_POST['submit'])){

  if (empty($_POST['alan_adi'] && $_POST['sunucu_ip'] && $_POST['tarih'])) {
    exit;
  }

  foreach ($ihbarlar as $ihbarcek) {
    if ($ihbarcek['vt_alan_adi']==$_POST['alan_adi']) {
      $update = $db->prepare("UPDATE vt_ihbarlar SET
        vt_sunucu_ip=:sunucu_ip,
        vt_tarih=:tarih
        WHERE vt_id = {$ihbarcek['vt_id']}");

        $kaydet = $update->execute(array(
          'sunucu_ip' => $_POST['sunucu_ip'],
          'tarih' => $_POST['tarih']
        ));
      }
    }
    if ($ihbarcek['vt_alan_adi']!=$_POST['alan_adi']) {
      $insert = $db->prepare("INSERT INTO vt_ihbarlar SET
        vt_alan_adi=:alan_adi,
        vt_sunucu_ip=:sunucu_ip,
        vt_tarih=:tarih
        ");

        $kaydet = $insert->execute(array(
          'alan_adi' => $_POST['alan_adi'],
          'sunucu_ip' => $_POST['sunucu_ip'],
          'tarih' => $_POST['tarih']
        ));
    }
  }
  ?>

  <form action="" method="post">
    <input type="hidden" name="alan_adi">
    <input type="hidden" name="sunucu_ip">
    <input type="hidden" name="tarih">
    <button type="submit" name="submit" value="1" hidden> Gönder </button>
  </form>
