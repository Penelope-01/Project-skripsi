<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->

<div class="auth-main v1 bg-grd-primary">
    <div class="auth-wrapper">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?= base_url(); ?>assets/images/logo-dark.svg" alt="images" class="img-fluid mb-4">
                        <h4 class="f-w-500 mb-1">Halaman Login</h4>
                        <p class="mb-4">Belum punya akun? <a href="<?= base_url('auth/registration'); ?>" class="link-primary ms-1">Buat akun</a></p>
                    </div>

                    <!-- flash data -->
                    <?= $this->session->flashdata('message'); ?>
                    
                    <form action="<?= base_url('auth'); ?>" method="post">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Email">
                            <?= form_error('email', '<div id="email" class="form-text text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <?= form_error('password', '<div id="password" class="form-text text-danger">', '</div>'); ?>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="saprator my-3">
                            <span>Or continue with</span>
                        </div>
                        <div class="text-center">
                            <ul class="list-inline mx-auto mt-3 mb-0">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/" class="avtar avtar-s rounded-circle bg-facebook" target="_blank">
                                        <i class="fab fa-facebook-f text-white"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/" class="avtar avtar-s rounded-circle bg-twitter" target="_blank">
                                        <i class="fab fa-twitter text-white"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://myaccount.google.com/" class="avtar avtar-s rounded-circle bg-googleplus" target="_blank">
                                        <i class="fab fa-google text-white"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->