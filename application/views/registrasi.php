<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">DAFTAR AKUN</h1>
                            </div>
                            <form method="post" action="<?php echo base_url('Registrasi/index') ?>" class="user">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nama" id="exampleInputName" placeholder="Masukan nama anda">
                                    <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username" id="exampleInputUserName" placeholder="Masukan username anda">
                                    <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email">
                                    <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password_1" placeholder="Maukan password anda">
                                        <?php echo form_error('password_1', '<div class="text-danger small ml-3">', '</div>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="password_2" placeholder="Ulangi masukan password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-user btn-block">
                                    DAFTAR

                                </button>

                            </form>

                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('Auth/login'); ?>">Sudah punya akun? Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>