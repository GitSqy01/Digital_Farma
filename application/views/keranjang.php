<div class="container-fluid">
    <h4>Keranjangku</h4>

    <table class="table table-border table-striped table-hover">
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>

        <?php
        $no = 1;
        foreach ($this->cart->contents() as $items) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $items['name'] ?></td>
                <td><?php echo $items['qty'] ?></td>
                <td>Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                <td>Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="4"></td>
            <td>Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
        </tr>


    </table>

    <div align="center">
        <a href="<?php echo base_url('Dashboard/hapus_keranjang') ?>">
            <div class="btn btn-sm btn-danger">Hapus</div>
        </a>
        <a href="<?php echo base_url('Dashboard/index') ?>">
            <div class="btn btn-sm btn-primary">Belanja Lagi</div>
        </a>
        <a href="<?php echo base_url('Dashboard/pembayaran') ?>">
            <div class="btn btn-sm btn-success">checkout</div>
        </a>
    </div>
</div>