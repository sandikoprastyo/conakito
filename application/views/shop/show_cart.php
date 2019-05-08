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
                    <td><?= $items['berat'] ?></td>
                    <td><?= number_format($items['price'], 0, ',', '.') ?></td>
                    <td><?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td align="right" colspan="4">Total </td>
                <td align="right"><?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
            </tr>
        </tfoot>
    </table>
    <div align="center">
        <?= anchor('Shop/clear_cart', 'Clear Cart', ['class' => 'btn btn-danger']) ?>
        <?= anchor('Shop/index_shop', 'Continue Shopping', ['class' => 'btn btn-primary']) ?>
        <?= anchor('order', 'Check Out', ['class' => 'btn btn-success']) ?>
    </div>
</div>
</div>
</div>