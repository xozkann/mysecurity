<?php
require_once 'connect.php';
include 'sql-data.php';

$db->query("DELETE FROM vt_lisanslar WHERE vt_bitarihi = curdate();", PDO::FETCH_ASSOC);

$ihbar = $ihbarlar->rowCount();
if ($ihbar > 0) {
  require("mail/class.phpmailer.php");
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 1;
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = "smtp.gmail.com"; // Gelen Posta Sunucusu
  $mail->Port = 465;
  $mail->IsHTML(true);
  $mail->SetLanguage("tr", "phpmailer/language");
  $mail->CharSet  ="utf-8";
  $mail->Username = "test@gmail.com"; // Kullanıcı Adı
  $mail->Password = "test"; // Şifre
  $mail->SetFrom($mail->Username, "MySecurity");
  $mail->AddAddress("epostaadresin@gmail.com"); // Gönderilecek E-Posta
  $mail->Subject = "MySecurity | İhbar";
  $mail->Body = "Merhaba,<br>MySecurity lisans sisteminiz üzerinde gözüken toplam <b>".$ihbar."</b> adet ihbar var. Panele giriş yapıp tüm ihbarları kontrol edebilirsiniz.<br><hr><a href=".$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, 12).">Panele giriş yap!</a><br><i>(Bu e-posta Cron yapılandırılması tarafından gönderilmiştir.)</i>";
  if(!$mail->Send()){
    echo $mail->ErrorInfo;
  }
}
?>
