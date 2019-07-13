<body>
    <h1 class="mt-5 text-center"><strong>Detail Shop Coffee Beans Konakito</strong></h1>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="card mt-4">
                    <img class="card-img-top img-fluid" src="<?= base_url('assets/img/' . $shop['foto_produk'] . ''); ?>" alt="img">
                    <div class="card-body">
                        <h3 class="card-title"><?= $shop['nama_produk']; ?></h3>
                        <h4><?= $shop['harga_produk']; ?></h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
                        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9733;</span>
                        5.0 stars
                    </div>
                </div>
                <a href="<?= base_url('shop/index_shop'); ?>" class="btn btn-primary mt-3 mb-3">Back</a>
                <!-- /.card -->


                <!-- /.card -->

            </div>

            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->