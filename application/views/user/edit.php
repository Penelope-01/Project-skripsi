<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">


        <!-- [ Main Content ] start -->
        <?= form_open_multipart('user/edit'); ?>

        <div class="card" style="width: 65rem;">
            <div class="card-body">
                <h6 class="card-title mb-3"><?= $title; ?></h6>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email : </label>
                    <div class="col-sm">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap : </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                        <?= form_error('nama', '<div id="password" class="form-text text-danger">', '</div>'); ?>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-2">Gambar : </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/images/profile/') . $user['gambar']; ?>" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="gambar" name="gambar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </div>
                </div>



            </div>
        </div>

        </form>

        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->