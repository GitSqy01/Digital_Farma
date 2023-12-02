<div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail Obat</h5>
        <div class="card-body">

            <?php foreach ($obat as $obt) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img class="img-fluid w-75" src="<?php echo base_url() . '/uploads/' . $obt->image ?>">

                    </div>
                    <div class="col-md-8">
                        <table>
                            <tr>
                                <td>Nama Produk</td>
                                <td> : <strong><?php echo $obt->nama_obat ?></strong></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td> : <strong><?php echo $obt->id_kategori ?></strong></td>
                            </tr>
                            <tr>
                                <td>Produksi</td>
                                <td> : <strong><?php echo $obt->pembuat ?></strong></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td> : <strong><?php echo $obt->stok ?></strong></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td> : <div class="btn btn-sm btn-primary">Rp.<?php echo number_format($obt->harga, 0, ',', '.') ?></div>
                                </td>
                            </tr>
                        </table>
                        <?php echo anchor('dashboard/tambah_ke_keranjang/' . $obt->id, '<div class="btn btn-sm btn-primary mt-4">Tambahke Keranjang</div>') ?>
                        <?php echo anchor('dashboard/index/', '<div class="btn btn-sm btn-danger mt-4 ml-2">Kembali</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>