<?php $sayfaADI = 'Yetkili Oluştur'; include 'templates/header.php'; if($kullanicicek['vt_yetki']!="2") { header('Location:index.php'); exit; } ?>
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                            <?php
                                if($_GET['durum']=="uyari") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı!</strong> Lütfen boş alan bırakmayınız.</div>';
                                }elseif($_GET['durum']=="basarisiz") {
                                    echo '<div class="alert alert-danger"><strong>Başarısız!</strong> Yetkili oluşturulamadı, tekrar deneyin.</div>';
                                }elseif($_GET['durum']=="basarili") {
                                    header('Refresh:2; url=admins.php');
                                    echo '<div class="alert alert-success"><strong>Başarılı!</strong> Yetkili oluşturuldu, lütfen bekleyin.</div>';
                                }
                            ?>
                                <form method="POST" action="resources/post.php">
                                    <div class="form-group">
                                        <label>Ad Soyad</label>
                                        <input type="text" name="vt_adsoyad" class="form-control input-sm"/>
                                    </div>
                                    <div class="form-group">
                                        <label>E-Posta</label>
                                        <input type="text" name="vt_eposta" class="form-control input-sm" />
                                    </div>
                                    <div class="form-group">
                                        <label>Şifre</label>
                                        <input type="password" name="vt_sifre" class="form-control input-sm" />
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon</label>
                                        <input type="text" name="vt_telefon" class="form-control input-sm" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Yetki Seviyesi</label>
                                        <select class="form-control" name="vt_yetki" id="exampleFormControlSelect1">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="yetkili_olustur" class="btn btn-primary btn-sm btn-block">Yeni Yetkili Oluştur</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'templates/footer.php'; ?>