<style>
    .hovereffect {
        width: 100%;
        height: 100%;
        float: left;
        overflow: hidden;
        position: relative;
        text-align: center;
        cursor: default;
        background: -webkit-linear-gradient(45deg, #ff89e9 0%, #05abe0 100%);
        background: linear-gradient(45deg, #ff89e9 0%, #05abe0 100%);
    }

    .hovereffect .overlay {
        width: 100%;
        height: 100%;
        position: absolute;
        overflow: hidden;
        top: 0;
        left: 0;
        padding: 3em;
        text-align: left;
    }

    .hovereffect img {
        display: block;
        position: relative;
        max-width: none;
        width: calc(100% + 60px);
        -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
        transition: opacity 0.35s, transform 0.45s;
        -webkit-transform: translate3d(-40px, 0, 0);
        transform: translate3d(-40px, 0, 0);
    }

    .hovereffect h2 {
        text-transform: uppercase;
        color: #fff;
        position: relative;
        font-size: 17px;
        font-weight: bold;
        background-color: transparent;
        padding: 80% 0 10px 0;
        text-align: center;
    }

    .hovereffect .overlay:before {
        position: absolute;
        top: 40px;
        right: 20px;
        bottom: 40px;
        left: 20px;
        border: 1px solid #fff;
        content: '';
        opacity: 0;
        filter: alpha(opacity=0);
        -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
        transition: opacity 0.35s, transform 0.45s;
        -webkit-transform: translate3d(-20px, 0, 0);
        transform: translate3d(-20px, 0, 0);
    }

    .hovereffect a,
    .hovereffect p {
        color: #FFF;
        opacity: 0;
        filter: alpha(opacity=0);
        -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
        transition: opacity 0.35s, transform 0.45s;
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0);
    }

    .hovereffect:hover img {
        opacity: 0.6;
        filter: alpha(opacity=60);
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .hovereffect:hover .overlay:before,
    .hovereffect:hover a,
    .hovereffect:hover p {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
</style><!-- Page Content -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<h1 class="mt-5 text-center"><strong>Event Konakito</strong></h1>
<!-- Tampilkan semua produk -->
<div class="container">
    <div class="row">

        <!-- looping products -->
        <?php foreach ($event as $ev) :  ?>
            <div class="col-lg-3 col-md-3 col-sm-3 mt-5 mb-5">
                <div class="card" width="300px" height="450px"">
        <div class=" hovereffect">
                    <img src=" <?= base_url('assets/img/event/' . $ev->foto_event . ''); ?>" width="300px" height="450px" class="card-img-top" alt="img">
                    <div class="overlay">
                        <a href="https://www.instagram.com/konakito/?hl=en">
                            <h2>More Info</h2>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><?= $ev->nama_event ?></h5>

                    <p><?= $ev->tanggal ?></p>
                    <p><?= $ev->deskripsi ?></p>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end looping -->
</div>
</div>