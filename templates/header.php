<?php
if(basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {
    header('Location:../index.php');
    exit;
}
                                        

error_reporting(E_ERROR | E_PARSE);

//Veritabanı Bağlantısı
require_once 'resources/post.php';

//SQL Data
include 'resources/sql-data.php';

$kullanicisor = $db->prepare('SELECT * FROM vt_kullanicilar WHERE vt_eposta=:eposta');
$kullanicisor->execute(array(
  'eposta' => $_SESSION['vt_eposta']
  ));

$sorgula = $kullanicisor->rowCount();


if(basename($_SERVER['PHP_SELF'])=="login.php") {

    if ($sorgula==1) {
 
        header("Location:index.php");
        exit;
       
    }

}else{

    if ($sorgula==0) {
 
        header("Location:login.php?durum=izinsiz");
        exit;
    
    }

}

$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <title><?php echo $sayfaADI; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MySecurity proje veya dosyalarınızı uzaktan yönetmeniz için kodlanmış bir sistemdir. Bu sistem sayesinde proje veya dosyalarınızı güvenli bir şekilde lisanslayıp yönetebilirsiniz. (ÜCRETSİZ)" />
    <meta name="keywords" content="MySecurity, Security, Güvenlik, Güvenli, Proje, Lisans, Lisanslama, Ücretsiz, Kolay, Uzaktan Yönetim" />
    <link rel="shortcut icon" href="templates/assets/favicon.png" />
    <!-- # STYLES # -->
    <link rel="stylesheet" href="templates/assets/styles/cyborg.bootstrap.min.css" />
    <link rel="stylesheet" href="templates/assets/styles/alertify.css" />
    <link href="templates/assets/summernote/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="templates/assets/styles/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
        body {
            background-color: hsla(202, 50%, 6%, 1);
            background-image: url('data:image/svg+xml;utf8,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><circle opacity="0.5" fill="%23FFFFFF" cx="28.75" cy="22.338" r="0.713"/><circle opacity="0.2" fill="%23FFFFFF" cx="26.75" cy="79.443" r="0.307"/><circle opacity="0.5" fill="%23FFFFFF" cx="50" cy="41.884" r="0.308"/><circle fill="%23FFFFFF" cx="12.883" cy="42.25" r="0.367"/><circle opacity="0.4" fill="%23FFFFFF" cx="80" cy="72.818" r="0.307"/><circle opacity="0.5" fill="%23FFFFFF" cx="55.625" cy="12.375" r="0.308"/><circle opacity="0.2" fill="%23FFFFFF" cx="73.307" cy="89.375" r="0.308"/><circle opacity="0.5" fill="%23FFFFFF" cx="73" cy="53.884" r="0.308"/><circle opacity="0.5" fill="%23FFFFFF" cx="38.875" cy="89.432" r="0.385"/></svg>');
            background-size: 20rem 20rem;
            background-position: center 0;
            animation: bg 10s linear infinite;
        }
        @keyframes bg {
          to { background-position: center 20rem; }
        }
    </style>
</head>

<body>
    <div class="darkbgg"></div>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Menü</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-lock"></i> MySecurity</a>
            </div>
            <?php if($sorgula==0) { ?>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Giriş Yap</a></li>
                </ul>
            </div>
            <?php }else{ ?>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="resources/quit.php"><i class="fa fa-power-off"></i></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="create-license.php">Lisans Oluştur</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="licenses.php">Lisanslar</a></li>
                </ul>
		<ul class="nav navbar-nav navbar-left">
                    <li><a href="function.php">Fonksiyon Kodu</a></li>
                </ul>
                <?php if($kullanicicek['vt_yetki']=="2") { ?>
                <ul class="nav navbar-nav navbar-left">
                    <li><a>|</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="admins.php">Yetkililer</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="create-admin.php">Yetkili Oluştur</a></li>
                </ul>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </nav>
    <style type="text/css">
        .darkbgg {
        	position: absolute;
        	z-index: 99998;
        	background: rgba(0, 0, 0, .5);
        	width: 100%;
        	height: 100%;
        	top: 0;
        	display: none;
        }
        .toggle{
        	background: rgb(0, 216, 166);
            width: 60px;
            line-height: 60px;
            height: 60px;
            text-align: center;
            border-radius: 50%;
            color: #fff;
        	position: fixed;
        	right: 15px;
        	bottom: 15px;
        	font-size: 25px;
        	display: inline-block;
        	cursor: pointer;
        	transition:all 0.5s;-webkit-transition:all 0.5s;
        	z-index: 99999;
        }
        .sidebar{
        	transition:all 0.5s;-webkit-transition:all 0.5s;
        	position:fixed;
        	width:350px;
        	right:-500px;
        	box-shadow:0px 0px 10px 3px black;
        	background-color:#f7f7f7;
        	border-left:1px solid black;
        	height:100%;
        	top:0px;
        	z-index: 99999;
        }
        .sidebar h2{
        	color:white;
        	text-align:center;
        	font-family: 'Roboto', sans-serif;
        }
        
        .sidebar.active{
        	right:0px;
        }
        .notibox{
        	color:#000;
        	font-family: 'Roboto', sans-serif;
        	background-color:#fff;
        	width:calc(calc(100% - 30px));
        	padding:15px;
        	margin:15px;
        	border-radius:4px;
        	box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
        }
        .notibox>.top {
        	margin: 5px 0;
        }
        .notibox>.top + div {
        	margin: 10px 0;
        }
        .sidebar>.title {
        	background: #00d8a6;
            padding: 10px 0;
        	box-shadow: 0 1px 3px rgba(0,0,0,.12), 0 1px 2px rgba(0,0,0,.24);
        }
        .sidebar>.title>h2 {
        	margin: 0;
        }
        #closeSidebar {
        	color: #fff;
            position: absolute;
            right: 15px;
            top: 25px;
        	cursor: pointer;
        }
    </style>

    <div class="container wrapper">
        <div class="row">
            <style type="text/css">
                body {
                    font-size: 12px;
                    font-weight: 400;
                    line-height: 1.5;
                	}
                	@keyframes bg {
                  to { background-position: center 20rem; }
                }
            </style>