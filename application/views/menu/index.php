<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">


        <!-- [ Main Content ] start -->

        <div class="row">
            <div class="col-lg-6">

                <a href="" class="btn btn-primary mb-3"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Menu</a>

                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

                <?= $this->session->flashdata('message'); ?>

                <div class="card table-card">
                    <div class="card-header">
                        <h5>Menu Management</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Action</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <a href="" class="badge rounded-pill text-bg-primary">Edit</a>
                                            <a href="<?= base_url(); ?>menu/hapusMenu/<?= $m['id_user_menu']; ?>" onclick="return confirm('yakin?')" class="badge rounded-pill text-bg-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- [ Main Content ] end -->
</div>
</div>
<!-- [ Main Content ] end -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama menu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>