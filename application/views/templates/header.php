<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="<?= base_url('assets/scss/mdb.scss'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/mdb.min.css'); ?>" rel="stylesheet">
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
                    <a class="nav-link" href="<?= base_url('Contact/index_contact'); ?>">Contact</a>
                </li>
            </ul>
        </div>
    </nav>