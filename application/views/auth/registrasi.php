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
                          <h4 class="f-w-500 mb-1">Pesantren Terpadu Almuslim</h4>
                          <p class="mb-4">Sudah punya akun? <a href="<?= base_url('auth'); ?>" class="link-primary">Log in</a></p>
                      </div>
                      <form action="<?= base_url('auth/registration'); ?>" method="post">
                          <div class="form-group mb-3">
                              <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" placeholder="Masukkan nama lengkap">
                              <?= form_error('nama', '<div id="nama" class="form-text text-danger">', '</div>'); ?>
                          </div>
                          <div class="form-group mb-3">
                              <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="Masukkan email">
                              <?= form_error('email', '<div id="email" class="form-text text-danger">', '</div>'); ?>
                          </div>
                          <div class="form-group mb-3">
                              <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                              <?= form_error('password1', '<div id="password1" class="form-text text-danger">', '</div>'); ?>
                          </div>
                          <div class="form-group mb-3">
                              <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi password">
                          </div>
                          <!-- <div class="d-flex mt-1 justify-content-between">
                          <div class="form-check">
                              <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                              <label class="form-check-label text-muted" for="customCheckc1">I agree to all the Terms & Condition</label>
                          </div>
                      </div> -->
                          <div class="d-grid mt-4">
                              <button type="submit" class="btn btn-primary">Buat Akun</button>
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