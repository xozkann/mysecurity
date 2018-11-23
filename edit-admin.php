<?php $sayfaADI = 'Yetkili Düzenle : '.$_GET['id']; include 'templates/header.php'; if($kullanicicek['vt_yetki']!="2") { header('Location:index.php'); exit; } ?>
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                    <?php
                        $yetkilisor = $db->prepare("SELECT * FROM vt_kullanicilar WHERE vt_id=:id");
                        $yetkilisor->execute(array(
                            'id' => $_GET['id']
                        ));
                        $yetkilicek = $yetkilisor->fetch(PDO::FETCH_ASSOC);
if($yetkilicek['vt_id']==$_GET['id']) {
                    ?>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                            <?php
                                if($_GET['durum']=="uyari") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı!</strong> Lütfen boş alan bırakmayınız.</div>';
                                }elseif($_GET['durum']=="basarisiz") {
                                    echo '<div class="alert alert-danger"><strong>Başarısız!</strong> Yetkili düzenlenemedi, tekrar deneyin.</div>';
                                }elseif($_GET['durum']=="basarili") {
                                    header('Refresh:2; url=admins.php');
                                    echo '<div class="alert alert-success"><strong>Başarılı!</strong> Yetkili düzenlendi, lütfen bekleyin.</div>';
                                }
                            ?>
                                <form method="POST" action="resources/post.php">
                                    <div class="form-group">
                                        <label>Ad Soyad</label>
                                        <input type="text" name="vt_adsoyad" class="form-control input-sm" value="<?php echo $yetkilicek['vt_adsoyad']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>E-Posta</label>
                                        <input type="text" name="vt_eposta" class="form-control input-sm" value="<?php echo $yetkilicek['vt_eposta']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Şifre</label>
                                        <input type="password" name="vt_sifre" class="form-control input-sm" />
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <input type="text" name="vt_telefon" class="form-control input-sm" value="<?php echo $yetkilicek['vt_telefon']; ?>" />
                                        <input type="hidden" name="vt_id" class="form-control input-sm" value="<?php echo $yetkilicek['vt_id']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Yetki Seviyesi</label>
                                        <select class="form-control" name="vt_yetki" id="exampleFormControlSelect1">
                                        <?php if($yetkilicek['vt_yetki']=="1") { ?>
                                            <option selected value="1">1</option>
                                            <option value="2">2</option>
                                        <?php }elseif($yetkilicek['vt_yetki']=="2") { ?>
                                            <option value="1">1</option>
                                            <option selected value="2">2</option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="yetkili_duzenle" class="btn btn-primary btn-sm btn-block"><?php echo $yetkilicek['vt_adsoyad']; ?> (<?php echo $yetkilicek['vt_id']; ?>) Adlı Yetkiliyi Düzenle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'templates/footer.php'; }else{ header('Location:admins.php'); exit; } ?>