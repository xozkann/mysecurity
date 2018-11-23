<?php $sayfaADI = 'Giriş Yap'; include 'templates/header.php'; ?>
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                            <?php
                                if($_GET['durum']=="hata") {
                                    echo '<div class="alert alert-danger"><strong>Başarısız!</strong> E-Posta Adresi veya Şifre yanlış, lütfen tekrar deneyin.</div>';
                                }elseif($_GET['durum']=="izinsiz") {
                                    echo '<div class="alert alert-danger"><strong>Başarısız!</strong> Bilgileri doldurmadan giriş yapamazsınız.</div>';
                                }
                            ?>
                                <form method="POST" action="resources/post.php">
                                    <div class="form-group">
                                        <label>E-Posta Adresi:</label>
                                        <input type="email" name="vt_eposta" class="form-control input-sm" />
                                    </div>
                                    <div class="form-group">
                                        <label>Şifre:</label>
                                        <input type="password" name="vt_sifre" class="form-control input-sm" />
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="sistem_giris" class="btn btn-primary btn-sm btn-block">MySecurity'e Giriş Yap</button>
                                    </div>
                                    <div class="form-group text-center mt_10">
                                        MySecurity lisans yönetim sistemi tamamen ücretsizdir, barda bulunan R10 konusuna tıklayarak gidebilir ve indirip kullanmaya başlayabilirsiniz. Kullanmadan önce talimatları okumanız gerekmekte!
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'templates/footer.php'; ?>
