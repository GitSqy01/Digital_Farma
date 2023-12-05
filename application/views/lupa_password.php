<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Lupa Password ya?</h1>
                                    </div>


                                    <?php echo $this->session->flashdata('message') ?>
                                    <?php echo $this->session->flashdata('pesan') ?>
                                    <?php echo $this->session->flashdata('pesan3') ?>


                                    <form method="post" action="<?php echo base_url('Registrasi/lupapassword') ?>" class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukan Email Anda" name="email">
                                            <?php echo form_error('email', '<div class="text-danger small ml-2">', '</div>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success form-control">Reset Password </button>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url('Auth/login'); ?>">Kembali login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>