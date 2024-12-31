<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">

        <!-- [ Main Content ] start -->


        <div class="row">
            <div class="col-md-7">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>


        <div class="card mb-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/images/profile/') . $user['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['nama']; ?></h5>
                        <p class="card-text"><?= $user['email'] ?></p>
                        <p class="card-text"><small class="text-body-secondary">Akun dibuat <?= date('d F Y', $user['date_created']); ?></small></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->