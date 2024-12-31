<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">


        <!-- [ Main Content ] start -->

        <div class="row">
            <div class="col-lg-6">

                <?= $this->session->flashdata('message'); ?>

                <div class="card">
                    <div class="card-body">
                        Role : <?= $role['role']; ?>
                    </div>
                </div>


                <div class="card table-card">
                    <div class="card-header">
                        <h5>Role Management</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Menu</th>
                                    <th>Akses</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    <?= cek_akses($role['role_id'], $m['id_user_menu']); ?>
                                                    data-role="<?= $role['role_id']; ?>"
                                                    data-menu="<?= $m['id_user_menu']; ?>">
                                            </div>
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