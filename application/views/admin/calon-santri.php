<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">


        <!-- [ Main Content ] start -->

        <div class="row">
            <div class="col-lg">

                <a href="" class="btn btn-primary mb-3"
                    data-bs-toggle="modal" data-bs-target="#subMenuModal">Tambah Data</a>

                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <?= $this->session->flashdata('message'); ?>

                <div class="card table-card">
                    <div class="card-header">
                        <h5>Data Calon Santri</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jn. Kelamin</th>
                                    <th>Siswa Kelas</th>
                                    <th>Jalur Pendaftaran</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($calonSantri as $cs) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $cs['nm_santri']; ?></td>
                                        <td><?= $cs['jk']; ?></td>
                                        <td><?= $cs['siswa_kelas']; ?></td>
                                        <td><?= $cs['jalur_daftar']; ?></td>
                                        <td><?= $cs['alamat']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>admin/detail/<?= $cs['id_reg']; ?>" class="badge rounded-pill text-bg-primary">Detail</a>
                                            <a href="" class="badge rounded-pill text-bg-warning">Edit</a>
                                            <a href="<?= base_url(); ?>admin/deleteCalonSantri/<?= $cs['id_reg']; ?>" onclick="return confirm('yakin?')" class="badge rounded-pill text-bg-danger">Hapus</a>
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

        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->