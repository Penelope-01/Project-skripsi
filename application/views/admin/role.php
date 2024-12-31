<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">


        <!-- [ Main Content ] start -->

        <div class="row">
            <div class="col-lg-6">

                <a href="" class="btn btn-primary mb-3"
                    data-bs-toggle="modal" data-bs-target="#exampleRole">Tambah Role</a>

                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

                <?= $this->session->flashdata('message'); ?>

                <div class="card table-card">
                    <div class="card-header">
                        <h5>Role Management</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $r['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/roleAkses/') . $r['role_id']; ?>" class="badge rounded-pill text-bg-warning">Akses</a>
                                            <a href="" class="badge rounded-pill text-bg-primary">Edit</a>
                                            <a href="" class="badge rounded-pill text-bg-danger">Hapus</a>
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
<div class="modal fade" id="exampleRole" tabindex="-1" aria-labelledby="exampleRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleRoleLabel">Tambah Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role">
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