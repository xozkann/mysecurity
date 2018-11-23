<?php $sayfaADI = 'Lisans Düzenle : '.$_GET['id']; include 'templates/header.php'; 



?>

            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                    <?php
                        $alanadisor = $db->prepare("SELECT * FROM vt_lisanslar WHERE vt_id=:id");
                        $alanadisor->execute(array(
                            'id' => $_GET['id']
                        ));
                        $alanadicek = $alanadisor->fetch(PDO::FETCH_ASSOC);

if($alanadicek['vt_id']==$_GET['id']) {
                    ?>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                            <?php
                                if($_GET['durum']=="uyari") {
                                    echo '<div class="alert alert-warning"><strong>Uyarı!</strong> Lütfen alan adını boş bırakmayınız.</div>';
                                }elseif($_GET['durum']=="basarisiz") {
                                    echo '<div class="alert alert-danger"><strong>Başarısız!</strong> Lisans düzenlenemedi, tekrar deneyin.</div>';
                                }elseif($_GET['durum']=="basarili") {
                                    header('Refresh:2; url=licenses.php');
                                    echo '<div class="alert alert-success"><strong>Başarılı!</strong> Lisans düzenlendi, lütfen bekleyin.</div>';
                                }
                            ?>
                                <form method="POST" action="resources/post.php">
                                    <div class="form-group">
                                        <label>Alan Adı</label>
                                        <input type="text" name="vt_alan_adi" class="form-control input-sm" value="<?php echo $alanadicek['vt_alan_adi']; ?>" />
                                    </div>
                                    <div class="form-group text-center mt_10">
                                    Alan Adınızı sade şekilde yazınız. <code>www</code>, <code>http://</code> veya <code>https://</code> koymayınız.
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Bitiş Tarihi:</label>
                                        <input type="date" name="vt_bitarihi" class="form-control input-sm" value="<?php echo $alanadicek['vt_bitarihi']; ?>" />
                                        <input type="hidden" name="vt_id" class="form-control input-sm" value="<?php echo $alanadicek['vt_id']; ?>" />
                                    </div>
                                    <div class="form-group text-center mt_10">
                                    Boş bırakırsanız otomatik olarak sınırsız sayılır.
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="lisans_duzenle" class="btn btn-primary btn-sm btn-block"><?php echo $_GET['id']; ?> Numaralı Lisansı Düzenle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php include 'templates/footer.php'; }else{ header('Location:licenses.php'); exit; } ?>