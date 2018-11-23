<?php $sayfaADI = 'Lisanslar'; include 'templates/header.php'; ?>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Alan Adı</th>
                        <th scope="col">Başlangıç Tarihi</th>
                        <th scope="col">Bitiş Tarihi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($lisanslar as $lisanscek) { ?>
                    <tr>
                        <td><?php echo $lisanscek['vt_id']; ?></td>
                        <td><?php echo $lisanscek['vt_alan_adi']; ?></td>
                        <td><?php echo $lisanscek['vt_batarihi']; ?></td>
                        <td><?php if($lisanscek['vt_bitarihi']=="suresiz") { echo '<b>∞</b>'; }else{ echo $lisanscek['vt_bitarihi']; } ?></td>
                        <td><a class="btn btn-primary btn-xs" href="edit-license.php?id=<?php echo $lisanscek['vt_id']; ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a class="btn btn-danger btn-xs" href="resources/post.php?lisans_sil=basarili&id=<?php echo $lisanscek['vt_id']; ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
        <?php include 'templates/footer.php'; ?>