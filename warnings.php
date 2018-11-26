<?php $sayfaADI = 'İhbarlar'; include 'templates/header.php'; ?>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Alan Adı</th>
                        <th scope="col">Sunucu IP</th>
                        <th scope="col">Tarih</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($kullanicilar as $yetkilicek) { ?>
                    <tr>
                        <td><?php echo $yetkilicek['vt_id']; ?></td>
                        <td><?php echo $yetkilicek['vt_alan_adi']; ?></td>
                        <td><?php echo $yetkilicek['vt_sunucu_ip']; ?></td>
                        <td><?php echo $yetkilicek['vt_tarih'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
        <?php include 'templates/footer.php'; ?>