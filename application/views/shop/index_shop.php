<!-- Page Content -->
<h1 class="mt-5 text-center"><strong>Shop Coffee Beans Konakito</strong></h1>
<!-- Tampilkan semua produk -->
<div class="container text-center mt-5">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Pembayaran Anda <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
            Pesanan Anda Sedang Diproses.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        <? endif; ?>
    </div>

    <div class="container text-center">

        <div class="row">
            <!-- looping products -->
            <?php foreach ($shop as $shp) : ?>
                <div class="col-lg-4 col-md-6 col-sm-7 mt-5 mb-5 p-2">
                    <div class="card" style="width: 20rem;">
                        <img src="<?= base_url('assets/img/' . $shp->foto_produk . ''); ?>" class="card-img-top" style="width:20rem; height: 20rem;" alt="img">
                        <div class="card-body">
                            <h4 class="card-title"><?= $shp->nama_produk ?></h4>
                            <p><?= 'Rp ' . number_format($shp->harga_produk); ?></p>
                            <p><?= $shp->berat_produk ?> Gram</p>
                            <div class="card-footer badge">
                                <?= anchor('Shop/addcart/' . $shp->id_produk, 'Buy', [
                                    'class'    => 'btn btn-primary',
                                    'onclick'     => "alert('Silakan cek Keranjang Anda !')"
                                ]) ?>

                                <?= anchor('Shop/detailMenu/' . $shp->id_produk, 'Detail', [
                                    'class'    => 'btn btn-info'
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- end looping -->
        </div>
    </div>