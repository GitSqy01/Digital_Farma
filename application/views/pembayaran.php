<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-warning">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h4>Total Yang Harus Anda Bayar : Rp. " . number_format($grand_total, 0, ',', '.');
                ?>
            </div><br><br>
            <h4>Masukan alamat pengiriman dan lakukan pembayaran</h3>

                <form method="post" action="<?php echo base_url('Dashboard/proses_pesanan') ?> ">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Masukan Nama Lengkap Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="Masukan Alamat Lengkap Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telpon</label>
                        <input type="number" name="no_telp" placeholder="Masukan Nomor Telepon Anda" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jasa Pengiriman</label>
                        <select class="form-control">
                            <option value="">JNE</option>
                            <option value="">JNT</option>
                            <option value="">SICEPAT</option>
                            <option value="">POS Indonesia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <select class="form-control">
                            <option value="">Bank BCA - XXXXXXX</option>
                            <option value="">Bank BNI - XXXXXXX</option>
                            <option value="">Bank BRI - XXXXXXX</option>
                            <option value="">Dana - XXXXXXXX</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success mb-2">PESAN</button>

                </form>
            <?php
                } else {
                    echo "<h4>Anda Belum Memasukan Apapun Pada Keranjang Anda";
                }

            ?>
        </div>

        <div class="col-md-2"></div>
    </div>
</div>