<!-- Page Content -->
<h1 class="mt-5 text-center"><strong>Shop Coffee Beans Konakito</strong></h1>


<!-- <div class="list-group">
            <a data-toggle="tab" href="#SEMANG" class="list-group-item text-light bg-dark">ROBUSTA SEMANG</a>
            <a data-toggle="tab" href="#LANANG" class="list-group-item text-light bg-dark">ROBUSTA LANANG</a>
            <a data-toggle="tab" href="#GRADE1" class="list-group-item text-light bg-dark">ROBUSTA SUPER GRADE 1</a>
            <a data-toggle="tab" href="#GRADE2" class="list-group-item text-light bg-dark">ROBUSTA SUPER GRADE 2</a>
            <a data-toggle="tab" href="#TRADISIONAL" class="list-group-item text-light bg-dark">ROBUSTA TRADISIONAL</a>
            <a data-toggle="tab" href="#ARABICA" class="list-group-item text-light bg-dark">ARABICA</a>
            <a data-toggle="tab" href="#LUWAK" class="list-group-item text-light bg-dark">ARABICA LUWAK</a>
        </div>

    </div> -->
<!-- /.col-lg-5 -->
<!--    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div id="carouselExampleIndicators" class="carousel slide my-6 mx-auto" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?= base_url('assets/img/sb.jpg'); ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url('assets/img/sd.jpg'); ?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url('assets/img/sc.jpg'); ?>" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div> -->

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
                        <p><?= $shp->berat_produk ?></p>
                        <p><?= 'Rp ' . number_format($shp->harga_produk); ?></p>
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
<script>
    $(document).ready(function() {
                $(#show).click(function()) {
                    $("span").after("0 ++ < 1 ");
                }

            }
</script>