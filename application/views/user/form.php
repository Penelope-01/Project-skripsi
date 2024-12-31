<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran Santri</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container border  p-5 shadow" style="background-color: whitesmoke;">
        <h1 class="text-center">Formulir SIPENSARU Pesantren Almuslim</h1>

        <?= form_open_multipart('user/simpanForm'); ?>

        <div class="alert alert-primary mt-3" role="alert">
            <strong>DATA PRIBADI CALON SANTRI</strong>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="nm_santri" class="form-label">Nama Calon Santri</label>
                    <input type="text" class="form-control" id="nm_santri" name="nm_santri" value="<?= set_value('nm_santri') ?>">
                    <?= form_error('nm_santri', '<div id="nm_santri" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jk" id="jk">
                        <option value="" disabled selected>Pilih</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="tpt_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" value="<?= set_value('tpt_lahir'); ?>">
                    <?= form_error('tpt_lahir', '<div id="tpt_lahir" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= set_value('tgl_lahir'); ?>">
                    <?= form_error('tgl_lahir', '<div id="tgl_lahir" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" value="<?= set_value('asal_sekolah'); ?>">
                    <?= form_error('asal_sekolah', '<div id="asal_sekolah" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="number" name="nisn" id="nisn" class="form-control" value="<?= set_value('nisn'); ?>">
                    <?= form_error('nisn', '<div id="nisn" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="jalur_daftar" class="form-label">Jalur Pendaftaran</label>
                    <select name="jalur_daftar" id="jalur_daftar" class="form-select">
                        <option value="" disabled selected>Pilih</option>
                        <option value="Reguler">Prestasi (Wajib lulusan kelas 6 SD/MI)</option>
                        <option value="Lanjutan">Lanjutan (Wajib santri kelas 3 asal Pesantren Terpadu/Modern)</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="siswa_kelas" class="form-label">Siswa Kelas</label>
                    <select name="siswa_kelas" id="siswa_kelas" class="form-select">
                        <option value="" disabled selected>Pilih</option>
                        <option value="6 SD/MI">6 SD/MI</option>
                        <option value="3 SMP/MTs">3 SMP/Mts</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="alert alert-primary mt-3" role="alert">
            <strong>DATA ORANG TUA/WALI</strong>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="nm_ayah" class="form-label">Nama Orang Tua (ayah)</label>
                    <input type="text" name="nm_ayah" id="nm_ayah" class="form-control" value="<?= set_value('nm_ayah'); ?>">
                    <?= form_error('nm_ayah', '<div id="nm_ayah" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="kerja_ayah" class="form-label">Pekerjaan Ayah</label>
                    <input type="text" name="kerja_ayah" id="kerja_ayah" class="form-control" value="<?= set_value('kerja_ayah'); ?>">
                    <?= form_error('kerja_ayah', '<div id="kerja_ayah" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="telp_ayah" class="form-label">No.HP Ayah</label>
                    <input type="number" name="telp_ayah" id="telp_ayah" class="form-control" value="<?= set_value('telp_ayah'); ?>">
                    <?= form_error('telp_ayah', '<div id="telp_ayah" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
        </div>

        <hr class="border border-primary opacity-50">

        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="nm_ibu" class="form-label">Nama Orang Tua (Ibu)</label>
                    <input type="text" name="nm_ibu" id="nm_ibu" class="form-control" value="<?= set_value('nm_ibu'); ?>">
                    <?= form_error('nm_ibu', '<div id="nm_ibu" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="kerja_ibu" class="form-label">Pekerjaan Ibu</label>
                    <input type="text" name="kerja_ibu" id="kerja_ibu" class="form-control" value="<?= set_value('kerja_ibu'); ?>">
                    <?= form_error('kerja_ibu', '<div id="kerja_ibu" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="telp_ibu" class="form-label">No.HP Ibu</label>
                    <input type="number" name="telp_ibu" id="telp_ibu" class="form-control" value="<?= set_value('telp_ibu') ?>">
                    <?= form_error('telp_ibu', '<div id="telp_ibu" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" class="form-control" value="<?= set_value('alamat') ?>"></textarea>
                    <?= form_error('alamat', '<div id="alamat" class="form-text text-danger">', '</div>'); ?>
                </div>
            </div>
        </div>

        <div class="alert alert-primary mt-3" role="alert">
            <strong>DATA DOKUMEN</strong>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="kk" class="form-label">Upload kartu keluarga ( KK )</label>
                    <input type="file" class="form-control" name="kk" id="kk">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="sk_lulus" class="form-label">Upload surat keterangan lulus</label>
                    <input type="file" class="form-control" name="sk_lulus" id="sk_lulus">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="ktp_ayah" class="form-label">Upload KTP Ayah</label>
                    <input type="file" class="form-control" name="ktp_ayah" id="ktp_ayah">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="ktp_ibu" class="form-label">Upload KTP Ibu</label>
                    <input type="file" name="ktp_ibu" id="ktp_ibu" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="paspoto" class="form-label">Upload pasphoto</label>
                    <input type="file" class="form-control" name="paspoto" id="paspoto">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="akte" class="form-label">Upload akta kelahiran</label>
                    <input type="file" class="form-control" name="akte" id="akte">
                </div>
            </div>
        </div>

        <hr class="border border-primary opacity-50">

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <h6 class="mb-3">Untuk pendaftaran jalur prestasi ( Jalur reguler tidak perlu upload berkas )</h6>
                    <ul class="list-group">
                        <li class="list-group-item">Calon santri termasuk kedalam peringkat 5 besar selama 2 tahun.</li>
                        <li class="list-group-item">Calon santri memiliki prestasi di bidang Alquran atau akademik dan Non Akademik.</li>
                        <li class="list-group-item">Prestasi yang dimaksud pernah mendapat juara (I,II,dan III) di tingkat Kabupaten/Provinsi/Nasional atau Internasional yang dibuktikan dengan sertifikat/piagam penghargaan.</li>
                        <li class="list-group-item">Untuk jalur prestasi wajib mengupload bukti prestasi calon santri</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <label for="bukti_prestasi" class="form-label">Bukti Prestasi</label>
                    <input type="file" name="bukti_prestasi" id="bukti_prestasi" class="form-control">
                </div>
            </div>
        </div>


        <hr class="border border-primary opacity-50">

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <h6>Untuk pendaftaran jalur lanjutan ( Jalur reguler tidak perlu upload berkas )</h6>
                    <ul class="list-group">
                        <li class="list-group-item">Wajib santri kelas 3 Pesantren Terpadu/Modern.</li>
                        <li class="list-group-item">Memiliki hafalan Al-Quran minimal 3 juz ( Juz 30,1,dan 2).</li>
                        <li class="list-group-item">mampu berbahasa arab dan inggris secara lisan dan tulisan.</li>
                        <li class="list-group-item">Memiliki prestasi akademik dan non akademik di tingkat Kabupaten/Provinsi/Nasional atau Internasional yang dibuktikan dengan sertifikat/piagam penghargaan ( jika ada ).</li>
                        <li class="list-group-item">Membawa surat keterangan aktif dari pesantren.</li>
                        <li class="list-group-item">Membawa raport pesantren periode 2 tahun terakhir</li>
                        <li class="list-group-item">Untuk jalur lanjutan wajib mengupload bukti berkas santri</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <label for="surat_aktif" class="form-label">Surat Aktif</label>
                    <input type="file" name="surat_aktif" id="surat_aktif" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <label for="raport_pesantren" class="form-label">Raport Pesantren Periode 2 Tahun Terakhir</label>
                    <input type="file" name="raport_pesantren" id="raport_pesantren" class="form-control">
                </div>
            </div>
        </div>

        <hr class="border border-primary opacity-50">

        <div class="row">
            <div class="col-md">
                <div class="mb-3">
                    <p>Silahkah lakukan pembayaran sebesar Rp.200.000 ke rek.bla bla bla...</p>
                    <label for="bukti_pay" class="form-label">Upload Bukti Pembayaran</label>
                    <input type="file" name="bukti_pay" id="bukti_pay" class="form-control">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md">
                <button type="button" class="btn btn-warning">Cancel</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </div>


        <?= form_close(); ?>
    </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>