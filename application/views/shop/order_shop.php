<h1 class="mt-5 mb-5 text-center"><strong>Checkout Shop Konakito</strong></h1>
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Shipping address -->
            <div class="ship-info">
                <h4>Shipping Info</h4>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <form class="form-horizontal" action="<?= base_url('invoice/proses'); ?>" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class=" form-group">
                        <label class="control-label col-sm-2">Address:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Phone:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="no_tlp">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <!--  <div class=" form-group">
                        <label class="control-label col-sm-2">Weight:</label>
                        <div class="input-group-append col-sm-10">
                            <?php foreach ($this->cart->contents() as $items) :
                                ?>
                                                                                                                                                                                                                                                                                                                                <input type="number" value="<?= $items['qty'] * $items['berat'] ?>" class=" form-control" id="berat" name="berat">
                            <?php endforeach; ?>
                            <div class="input-group-append">
                                <span class="input-group-text">Gram</span>

                            </div>
                        </div>
                        <span class="col-sm-10">Note: 1Kg Sama Dengan 1000 Gram</span>
                    </div>
     -->
                <!-- <div class="form-group">
                        <label class="control-label col-sm-2">Lokasi Asal:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sel1">
                                <option value="Bengkulu" name="aprovinsi"> Pilih Provinsi</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10">
                            <select class="form-control" id="sel2" disabled>
                                <option value="Kota Bengkulu " name="akota"> Pilih Kota</option>
                            </select>
                        </div>
                    </div> -->


                <div class="form-group">
                    <label class="control-label col-sm-2">Lokasi Tujuan:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="sel11" name="tujuan_provinsi">
                            <option> Pilih Provinsi</option>
                        </select>
                    </div>
                </div>

                <!--    <div class="form-group">
                        <div class="col-sm-10">
                            <select class="form-control" id="sel22" name="tujuan_kota" disabled>
                                <option> Pilih Kota</option>
                            </select>
                        </div>
                    </div> -->

                <div class="form-group">
                    <label class="control-label col-sm-2">Pilih Kurir:</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="kurir" name="kurir">
                            <option value="">Pilih Kurir</option>
                            <option>JNE</option>
                            <option>TIKI</option>
                            <option>POS Indonesia</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Pilih Bank Transfer:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="bank_transfer" id="sel11">
                            <option> Pilih Bank</option>
                            <option> BCA - 123456789 a/n PT Konakito</option>
                            <option> BNI - 123456789 a/n PT Konakito</option>
                            <option> BRI - 123456789 a/n PT Konakito</option>
                            <option> MANDIRI - 123456789 a/n PT Konakito</option>
                        </select>
                    </div>
                </div>
                <!--    <div class="form-group">
                        <div class="col-sm-10">

                            <div id="hasil"></div>

                        </div>
                    </div> -->

                <div class="mb-5 footBtn">
                    <a href="<?= base_url('Shop/index_shop'); ?>" class="btn btn-primary orderBtn"><i class="glyphicon glyphicon-menu-right"></i>Back</a>
                    <button type="submit" class="btn btn-success orderBtn">Next <i class="glyphicon glyphicon-menu-right"></i></button>
                </div>
            </form>
            <script type="text/javascript">
                function getLokasi() {
                    var $op = $("#sel1"),
                        $op1 = $("#sel11");

                    $.getJSON("provinsi", function(data) {
                        $.each(data, function(i, field) {

                            $op.append('<option value="' + field.province_id + '">' + field.province + '</option>');
                            $op1.append('<option value="' + field.province_id + ' ' + field.province + '">' + field.province + '</option>');

                        });

                    });

                }


                getLokasi();

                $("#sel11").on("change", function(e) {
                    e.preventDefault();
                    var option = $('option:selected', this).val();
                    $('#sel22 option:gt(0)').remove();
                    $('#kurir').val('');

                    if (option === '') {
                        alert('Lokasi Harus Diisi');
                        $("#sel22").prop("disabled", true);
                        $("#kurir").prop("disabled", true);
                    } else {
                        $("#sel22").prop("disabled", false);
                        getKota1(option);
                    }
                });

                $("#sel1").on("change", function(e) {
                    e.preventDefault();
                    var option = $('option:selected', this).val();
                    $('#sel2 option:gt(0)').remove();
                    $('#kurir').val('');

                    if (option === '') {
                        alert('Lokasi Harus Diisi');
                        $("#sel2").prop("disabled", true);
                        $("#kurir").prop("disabled", true);
                    } else {
                        $("#sel2").prop("disabled", false);
                        getKota(option);
                    }
                });


                $("#sel22").on("change", function(e) {
                    e.preventDefault();
                    var option = $('option:selected', this).val();
                    $('#kurir').val('');

                    if (option === '') {
                        alert('Lokasi Harus Diisi');
                        $("#kurir").prop("disabled", true);
                    } else {
                        $("#kurir").prop("disabled", false);
                    }
                });


                $("#kurir").on("change", function(e) {
                    e.preventDefault();
                    var option = $('option:selected', this).val();
                    var origin = $("#sel2").val();
                    var des = $("#sel22").val();
                    var qty = $("#berat").val();

                    if (option === '') {
                        alert('Kurir Harus Diisi');
                        $("#kurir").prop("disabled", true);
                    } else {
                        $("#kurir").prop("disabled", false);
                        getOrigin(origin, des, qty, option);
                    }

                });


                function getOrigin(origin, des, qty, cour) {
                    var $op = $("#hasil");
                    var i, j, x = "";

                    $.getJSON("tarif/" + origin + "/" + des + "/" + qty + "/" + cour, function(data) {
                        $.each(data, function(i, field) {


                            for (i in field.costs) {
                                x += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : " + field.costs[i].description + "</p>";

                                for (j in field.costs[i].cost) {
                                    x += field.costs[i].cost[j].value + "<br>" + field.costs[i].cost[j].etd + "<br>" + field.costs[i].cost[j].note;
                                }

                            }

                            $op.html(x);

                        });
                    });

                }


                function getKota1(idpro) {
                    var $op = $("#sel22");

                    $.getJSON("kota/" + idpro, function(data) {
                        $.each(data, function(i, field) {


                            $op.append('<option value="' + field.city_id + '">' + field.type + ' ' + field.city_name + '</option>');

                        });

                    });

                }

                function getKota(idpro) {
                    var $op = $("#sel2");

                    $.getJSON("kota/" + idpro, function(data) {
                        $.each(data, function(i, field) {


                            $op.append('<option value="' + field.city_id + '">' + field.type + ' ' + field.city_name + '</option>');

                        });

                    });

                }
            </script>

        </div>
    </div>
</div>