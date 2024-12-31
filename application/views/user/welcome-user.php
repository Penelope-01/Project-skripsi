<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #background {
            background-image: url('<?php echo base_url('assets/images/kampus.jpeg'); ?>');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Responsif untuk layar kecil */
        @media screen and (max-width: 768px) {
            #background {
                background-size: contain;
                background-color: #f4f4f4; /* Tambahkan latar belakang abu-abu agar terlihat lebih baik */
            }
        }

        .card {
            width: 90%;
            max-width: 500px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            text-align: center;
        }

        .card h5 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .card h6 {
            font-size: 1rem;
            margin-bottom: 20px;
            color: #666;
        }

        .card p {
            font-size: 0.9rem;
            color: #444;
            text-align: left;
        }

        .card a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ffc107;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .card a:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <div id="background">
        <div class="card">
            <h5>Selamat Datang <?= $user['nama']; ?>, calon santri baru pesantren Almuslim</h5>
            <h6>Instruksi pengisian formulir pendaftaran.</h6>
            <p>Sebelum mengisi formulir pendaftaran, pastikan Anda telah menyiapkan dokumen-dokumen berikut dalam format PDF dengan ukuran maksimal 2MB per file:</p>
            <p>
                1. Kartu Keluarga (KK) <br>
                2. Surat Keterangan Lulus <br>
                3. Pasphoto (format: JPEG, JPG, PNG) <br>
                4. KTP Ayah <br>
                5. KTP Ibu <br>
                6. Raport Pesantren (bagi calon santri lanjutan) <br>
                7. Surat Aktif (bagi calon santri lanjutan) <br>
                8. Bukti Prestasi (jika ada)
            </p>
            <a href="<?= base_url('user/simpanForm') ?>" class="btn btn-warning">Daftar</a>
        </div>
    </div>
</body>
</html>
