<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">


        <div class="row">
            <div class="col-lg">

                <a href="" class="btn btn-primary mb-3"
                    data-bs-toggle="modal" data-bs-target="#subMenuModal">Tambah Sub Menu</a>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <?= $this->session->flashdata('message'); ?>

                <div class="card table-card">
                    <div class="card-header">
                        <h5>Sub Menu Management</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Sub Menu</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td><?= $sm['is_active']; ?></td>
                                        <td>
                                            <a href="" class="badge rounded-pill text-bg-primary">Edit</a>
                                            <a href="<?= base_url(); ?>menu/hapusSubMenu/<?= $sm['id_user_sub_menu']; ?>" onclick="return confirm('yakin?')" class="badge rounded-pill text-bg-danger">Hapus</a>
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


<!-- Modal -->
<div class="modal fade" id="subMenuModal" tabindex="-1" aria-labelledby="subMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="subMenuLabel">Tambah Sub Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/subMenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nama sub menu">
                    </div>
                    <div class="form-group">
                        <select name="id_user_menu" id="id_user_menu" class="form-control">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id_user_menu']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url sub menu">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon sub menu">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Aktif?
                            </label>
                        </div>
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