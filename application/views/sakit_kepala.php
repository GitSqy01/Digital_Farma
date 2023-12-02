<div class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo base_url('assets/img/Group 9.png') ?>" class=" img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?php echo base_url('assets/img/Group 10.png') ?>" class=" img-fluid" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row text-center mt-3">

        <?php foreach ($sakit_kepala as $obt) : ?>
            <div class="card ml-5 mb-2" style="width: 16rem;">
                <img src="<?php echo base_url() . '/uploads/' . $obt->image ?>" class="img-fluid h-50  " alt="...">
                <div class="card-body p-1 h-25">
                    <h5 class="card-title mb-1"><?php echo $obt->nama_obat ?></h5>
                    <small><?php echo $obt->pembuat ?></small><br>
                    <span class="mb-2 badge rounded-pill bg-info text-dark">Rp. <?php echo number_format($obt->harga, 0, ',', '.') ?></span><br>
                    <?php echo anchor('dashboard/tambah_ke_keranjang/' . $obt->id, '<div class="btn btn-sm btn-primary">Tambahke Keranjang</div>') ?>
                    <?php echo anchor('dashboard/detail/' . $obt->id, '<div class="btn btn-sm btn-warning">Detail</div>') ?>

                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>