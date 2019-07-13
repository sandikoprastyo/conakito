<style>
    .section {
        position: relative;
        height: 100vh;
    }

    .section .section-center {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    #booking {
        font-family: 'Montserrat', sans-serif;
        background-image: url('assets/img/background.jpg');
        background-size: cover;
        background-position: center;
    }

    #booking::before {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: rgba(47, 103, 177, 0.6);
    }

    .booking-form {
        background-color: #fff;
        padding: 50px 20px;
        -webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
        border-radius: 20px;
    }

    .booking-form .form-group {
        position: relative;
        margin-bottom: 30px;
    }

    .booking-form .form-control {
        background-color: #ebecee;
        border-radius: 4px;
        border: none;
        height: 40px;
        -webkit-box-shadow: none;
        box-shadow: none;
        color: #3e485c;
        font-size: 14px;
    }

    .booking-form .form-control::-webkit-input-placeholder {
        color: rgba(62, 72, 92, 0.3);
    }

    .booking-form .form-control:-ms-input-placeholder {
        color: rgba(62, 72, 92, 0.3);
    }

    .booking-form .form-control::placeholder {
        color: rgba(62, 72, 92, 0.3);
    }

    .booking-form input[type="date"].form-control:invalid {
        color: rgba(62, 72, 92, 0.3);
    }

    .booking-form select.form-control {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .booking-form select.form-control+.select-arrow {
        position: absolute;
        right: 0px;
        bottom: 4px;
        width: 32px;
        line-height: 32px;
        height: 32px;
        text-align: center;
        pointer-events: none;
        color: rgba(62, 72, 92, 0.3);
        font-size: 14px;
    }

    .booking-form select.form-control+.select-arrow:after {
        content: '\279C';
        display: block;
        -webkit-transform: rotate(90deg);
        transform: rotate(90deg);
    }

    .booking-form .form-label {
        display: inline-block;
        color: #3e485c;
        font-weight: 700;
        margin-bottom: 6px;
        margin-left: 7px;
    }

    .booking-form .submit-btn {
        display: inline-block;
        color: #fff;
        background-color: #1e62d8;
        font-weight: 700;
        padding: 14px 30px;
        border-radius: 4px;
        border: none;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .booking-form .submit-btn:hover,
    .booking-form .submit-btn:focus {
        opacity: 0.9;
    }

    .booking-cta {
        margin-top: 80px;
        margin-bottom: 30px;
    }

    .form-btn {
        border-radius: 10px;
    }

    .booking-cta h1 {
        font-size: 52px;
        text-transform: uppercase;
        color: #fff;
        font-weight: 700;
    }

    .booking-cta p {
        font-size: 16px;
        color: rgba(255, 255, 255, 0.8);
    }

    @media screen and (max-width: 600px) {

        .booking-form,
        .form-group,
        input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
    }
</style>
</head>

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-push-5">
                        <div class="booking-cta">
                            <h1>ANY QUESTION? CONTACT US</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
                                ad sint fugit architecto incidunt iste culpa perspiciatis possimus voluptates aliquid consequuntur cumque quasi.
                                Perspiciatis.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-pull-7">
                        <div class="booking-form">
                            <?= $this->session->flashdata('message'); ?>
                            <form class="booking" method="post" action="<?= base_url('Contact/send'); ?>">
                                <div class="form-group">

                                    <div class="col-md-12">
                                        <span class="form-label">Name</span>
                                        <input class="form-control" name="nama" id="name" type="text" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <span class="form-label">Email</span>
                                        <input class="form-control" name="email" id="email" type="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">Phone</span>
                                        <input class="form-control" name="no_tlp" id="telpon" type="number" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <span class="form-label">Question</span>
                                        <textarea class="form-control" name="question" id="desk" type="textarea"></textarea>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>


                                <div class="form-btn">
                                    <button type="submit" class="submit-btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>