<?php $sayfaADI = 'Yetkililer'; include 'templates/header.php'; if($kullanicicek['vt_yetki']!="2") { header('Location:index.php'); exit; } ?>
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ad Soyad</th>
                        <th scope="col">E-Posta</th>
                        <th scope="col">Telefon</th>
                        <th scope="col">Yetki Seviyesi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($kullanicilar as $yetkilicek) { ?>
                    <tr>
                        <td><?php echo $yetkilicek['vt_id']; ?></td>
                        <td><?php echo $yetkilicek['vt_adsoyad']; ?></td>
                        <td><?php echo $yetkilicek['vt_eposta']; ?></td>
                        <td><?php echo $yetkilicek['vt_telefon'] ?></td>
                        <td><?php echo $yetkilicek['vt_yetki'] ?></td>
                        <td><a class="btn btn-primary btn-xs" href="edit-admin.php?id=<?php echo $yetkilicek['vt_id']; ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a class="btn btn-danger btn-xs" href="resources/post.php?yetkili_sil=basarili&id=<?php echo $yetkilicek['vt_id']; ?>"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
        <?php include 'templates/footer.php'; ?>