<h1 class="mt-5 mb-5 text-center"><strong>Checkout Shop Konakito</strong></h1>
<div class="container">
    <div class="row">
        <div class="row checkout">
            <!-- Order items -->
            <table class="table">
                <thead>
                    <tr>
                        <th width="13%">No</th>
                        <th width="34%">Product</th>
                        <th width="18%">Price</th>
                        <th width="13%">Quantity</th>
                        <th width="22%">Subtotal</th>
                        <th width="22%">Total</th>
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
                            <td><?= $items['berat'] ?></td>
                            <td><?= number_format($items['price'], 0, ',', '.') ?></td>
                            <td><?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <?php if ($this->cart->total_items() > 0) { ?>
                            <td class="text-right">
                                <strong>Total Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></strong>
                            </td>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>

            <!-- Shipping address -->
            <form class="form-horizontal" method="post">
                <div class="ship-info">
                    <h4>Shipping Info</h4>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="<?php echo !empty($custData['name']) ? $custData['name'] : ''; ?>" placeholder="Enter name">
                            <?php echo form_error('name', '<p class="help-block error">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="<?php echo !empty($custData['email']) ? $custData['email'] : ''; ?>" placeholder="Enter email">
                            <?php echo form_error('email', '<p class="help-block error">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Phone:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone" value="<?php echo !empty($custData['phone']) ? $custData['phone'] : ''; ?>" placeholder="Enter contact no">
                            <?php echo form_error('phone', '<p class="help-block error">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Address:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address" value="<?php echo !empty($custData['address']) ? $custData['address'] : ''; ?>" placeholder="Enter address">
                            <?php echo form_error('address', '<p class="help-block error">', '</p>'); ?>
                        </div>
                    </div>
                </div>
                <div class="mb-5 footBtn">
                    <a href="<?= base_url('Shop/index_shop'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-menu-left"></i> Back to Cart</a>
                    <button type="submit" name="placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>