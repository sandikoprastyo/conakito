<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="<?= base_url('https://code.jquery.com/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js'); ?>" type="text/javascript"></script>
    <link href="<?= base_url('https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css'); ?>'" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/scss/mdb.scss'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/mdb.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/mdb.min.js'); ?>" charset="utf-8"></script>
    <link rel="icon" href="<?= base_url('https://pbs.twimg.com/profile_images/808258644038983680/5OOAp25v_400x400.jpg'); ?>">
    <title><?php echo $judul; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/a.png'); ?>" alt="logo" width="100px" height="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Home/index'); ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Menu/index_menu'); ?>">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Shop/index_shop'); ?>">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Event/index_event'); ?>">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Reservation/index_reservation'); ?>">Reservation</a>
                </li>
            </ul>
            <ul class="nav">
                <li class="nav-item">
                    <i class="fa fa-shopping-cart justify-content-end" data-toggle="modal" data-target=".bd-example-modal-lg" style="font-size:20px;color:white"><span><?php $cart = $this->cart->total_items() ?> <?= $cart ?></span></i>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col1">No</th>
                                            <th scope="col2">Produk</th>
                                            <th scope="col2">Quantity</th>
                                            <th scope="col3">Berat</th>
                                            <th scope="col4">Harga</th>
                                            <th scope="col5">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($this->cart->contents() as $items) :
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $items['name'] ?></td>
                                                <td><?= $items['qty'] ?></td>
                                                <td><?= $items['berat'] ?> Gram</td>
                                                <td><?= number_format($items['price'], 0, ',', '.') ?></td>
                                                <td><?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="text-right" colspan="5">
                                                <?php if ($this->cart->total_items() > 0) { ?>
                                                    <strong>Total Rp.
                                                <td><?= number_format($this->cart->total(), 0, ',', '.'); ?></td></strong>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div align="center">
                                    <?= anchor('Shop/clear_cart', 'Clear Cart', ['class' => 'btn btn-danger']) ?>
                                    <?= anchor(base_url('Shop/index_shop'), 'Continue Shopping', ['class' => 'btn btn-primary']) ?>
                                    <?= anchor('invoice/checkOut', 'Check Out', ['class' => 'btn btn-success']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>