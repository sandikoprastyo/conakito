<!-- Page Content -->
<h1 class="mt-5 text-center"><strong>Shop Coffee Beans Konakito</strong></h1>
<!-- Tampilkan semua produk -->
<div class="container">
    <div class="row">

        <!-- looping products -->
        <?php foreach ($shop as $shp) : ?>
            <div class="col-lg-3 col-md-3 col-sm-3 mt-5 mb-5">
                <div class="card" style="width: 15rem;">
                    <img src="<?= base_url('assets/img/' . $shp->foto_produk . ''); ?>" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h5 class="card-title"><?= $shp->nama_produk ?></h5>

                        <p><?= 'Rp ' . number_format($shp->harga_produk); ?></p>
                        <p><?= $shp->berat_produk ?></p>
                        <p>
                            <?= anchor('Shop/addcart/' . $shp->id_produk, 'Buy', [
                                'class'    => 'btn btn-primary',
                                'role'    => 'button',
                                'id'     => 'show'
                            ]) ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end looping -->
    </div>
</div>