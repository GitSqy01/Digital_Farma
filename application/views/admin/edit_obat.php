<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> EDIT DATA OBAT</h3>

    <?php foreach ($obat as $obt) : ?>

        <form method="post" action="<?php echo base_url() . 'admin/Data_Obat/update' ?>">

            <div class="form-group">
                <label for="">Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" value="<?php echo $obt->nama_obat ?>">
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $obt->id ?>">
                <input type="text" name="id_kategori" class="form-control" value="<?php echo $obt->id_kategori ?>">
            </div>
            <div class="form-group">
                <label for="">Pembuat</label>
                <input type="text" name="pembuat" class="form-control" value="<?php echo $obt->pembuat ?>">
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $obt->harga ?>">
            </div>
            <div class="form-group">
                <label for="">Stok</label>
                <input type="text" name="stok" class="form-control" value="<?php echo $obt->stok ?>">
            </div>

            <button type="submit" class="btn btn-sm btn-primary mt-3">SIMPAN</button>

        </form>


    <?php endforeach; ?>
</div>