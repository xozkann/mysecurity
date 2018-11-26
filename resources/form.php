<?php
require_once 'connect.php';

if (isset($_POST['submit'])){

  if (empty($_POST['alan_adi'] && $_POST['sunucu_ip'] && $_POST['tarih'])) {
    exit;
  }

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

  if ($kaydet) {
    exit;
  }else{
    exit;
  }

}
?>

<form action="" method="post">
  <input type="hidden" name="alan_adi">
  <input type="hidden" name="sunucu_ip">
  <input type="hidden" name="tarih">
  <button type="submit" name="submit" value="1" hidden> Gönder </button>
</form>
