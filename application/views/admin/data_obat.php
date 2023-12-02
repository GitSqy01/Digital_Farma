<div class="container-fluid">
    <button class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#tambahobat"><i class="fas fa-plus fa-sm"></i>Tambah Obat</button>

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>KATEGORI</th>
            <th>PEMBUAT</th>
            <th>HARGA</th>
            <th>STOK</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach ($obat as $obt) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $obt->nama_obat ?></td>
                <td><?php echo $obt->id_kategori ?></td>
                <td><?php echo $obt->pembuat ?></td>
                <td><?php echo $obt->harga ?></td>
                <td><?php echo $obt->stok ?></td>
                <td>
                    <div class="btn btn-sm btn-success"><i class="fas fa-search-plus"></i></div>
                </td>
                <td><?php echo anchor('admin/Data_Obat/edit/' . $obt->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                </td>
                <td><?php echo anchor('admin/Data_Obat/hapus/' . $obt->id, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>') ?>
                </td>
            </tr>

        <?php endforeach; ?>


    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahobat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/Data_Obat/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Nama Obat</label>
                        <input type="text" name="nama_obat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select class="form-control" name="kategori">
                            <option value="">Demam</option>
                            <option value="">Lambung</option>
                            <option value="">Batuk</option>
                            <option value="">Sakit Kepala</option>
                            <option value="">Vitamin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Pembuat</label>
                        <input type="text" name="pembuat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Produk</label><br>
                        <input type="file" name="image" class="form-control">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>

            </form>
        </div>
    </div>
</div>