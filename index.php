<?php $sayfaADI = 'Anasayfa'; include 'templates/header.php'; ?>
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="alert alert-danger col-md-1"><center><i class="fa fa-users"></i> Yetkililer: <?php echo $kullanicilar->rowCount(); ?></center></div>
                    <div class="alert alert-success col-md-1"><center><i class="fa fa-link"></i> Lisanslar: <?php echo $lisanslar->rowCount(); ?></center></div>
                </div>
            </div>
        <?php include 'templates/footer.php'; ?>