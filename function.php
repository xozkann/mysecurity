<?php $sayfaADI = 'Fonksiyon Dosyası'; include 'templates/header.php'; ?>
<div class="container" style="margin-top: 50px;">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form method="POST">
            <div class="form-group">
              <label>Fonksiyon Kodu (CTRL +A <i>sonra</i> CTRL +C)</label>
              <textarea name="kod" class="form-control" cols="30" rows="20">
                date_default_timezone_set('Europe/Istanbul');
                $tarih = date('d.m.Y H:i:s');
                $lisans['site'] = getenv('HTTP_HOST');
                if(substr($lisans['site'], 0, 4) == "www.")
                $lisans['site'] = substr($lisans['site'],4);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "<?php echo 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['SCRIPT_NAME'], 0, 12); ?>resources/control.php?site=".$lisans['site']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $headers = array();
                $headers[] = "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1";
                $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                $result = curl_exec($ch);
                curl_close ($ch);
                if(strstr($result, "2")) {
				  $ch = curl_init('<?php echo 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['SCRIPT_NAME'], 0, 12); ?>resources/form.php');
                  curl_setopt_array($ch, [
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_POST => true,
                  CURLOPT_POSTFIELDS => [
                  'alan_adi' => $lisans['site'],
                  'sunucu_ip' => $_SERVER['SERVER_ADDR'],
                  'tarih' => $tarih,
                  'submit' => 1
                  ]
                  ]);
                  $source = curl_exec($ch);
                  curl_close($ch);
                  echo $source;
                  echo file_get_contents('<?php echo 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['SCRIPT_NAME'], 0, 12); ?>resources/control.php?access_denied');
				  exit;
                }
              </textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'templates/footer.php'; ?>
