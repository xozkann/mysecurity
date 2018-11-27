<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="MySecurity ücretsiz lisans yönetim sistemi lisans sorgulama sayfası.">
    <meta name="author" content="MySecurity">
    <link rel="icon" href="templates/assets/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <title>Lisans Sorgula</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.1/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST">
      <?php
      $alan_adi = $_SERVER['HTTP_HOST'];
      $alan_adi_klasor = substr($_SERVER['SCRIPT_NAME'], 0, 12);
      if (isset($_POST['lisans_sorgula'])) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://".$alan_adi.$alan_adi_klasor."resources/control.php?site=".$_POST['alan_adi']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1";
        $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close ($ch);
        if(strstr($result, "2")) { echo '<div class="alert alert-danger"><b><i class="fas fa-times fa-2x"></i></b><br> <a href="http://'.$_POST['alan_adi'].'" target="_blank">'.$_POST['alan_adi'].'</a> alan adı lisanssız!</div>'; }else{ echo '<div class="alert alert-success"><b><i class="fas fa-check fa-2x"></i></b><br> <a href="http://'.$_POST['alan_adi'].'" target="_blank">'.$_POST['alan_adi'].'</a> alan adı lisanslı.</div>'; }
      }
      ?>
      <?php if(!isset($_POST['lisans_sorgula'])) { echo '<h1 class="h3 mb-3 font-weight-normal">Lütfen alan adı girin</h1>'; } ?>
      <input type="text" class="form-control" placeholder="Alan Adı" name="alan_adi" required autofocus>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="lisans_sorgula">Sorgula</button>
      <p class="mt-5 mb-3 text-muted">&copy; MySecurity</p>
    </form>
  </body>
</html>
