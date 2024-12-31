<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_santri');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'selamat datang user ' . $data['user']['nama'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // jika gambarnya ada
            $uploadGambar = $_FILES['gambar']['name'];
            // var_dump($uploadGambar);
            // die;

            if ($uploadGambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/images/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambarLama = $data['user']['gambar'];
                    if ($gambarLama != 'default.jpeg') {
                        unlink(FCPATH . 'assets/images/profile/' . $gambarLama);
                    }

                    $gambarBaru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambarBaru);
                } else {
                    // echo $this->upload->display_errors();
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>'
                    );
                    redirect('user');
                }
            }


            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('tb_user');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-primary" role="alert">Berhasil ubah profile</div>'
            );
            redirect('user');
        }
    }

    public function welcomeUser()
    {
        $data['title'] = 'Selamat Datang Calon Santri Baru';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('user/welcome-user', $data);
    }


    public function simpanForm()
    {
        $data['title'] = 'Registrasi Calon Santri';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nm_santri', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tpt_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('siswa_kelas', 'Siswa Kelas', 'required');
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('nm_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nm_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('kerja_ayah', 'Pekerjaan Ayah', 'required');
        $this->form_validation->set_rules('kerja_ibu', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp_ayah', 'No.Hp Ayah', 'required');
        $this->form_validation->set_rules('telp_ibu', 'No.Hp Ibu', 'required');
        $this->form_validation->set_rules('jalur_daftar', 'Jalur Pendaftaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/form', $data);
        } else {
            $uploads = [
                'bukti_pay' => $_FILES['bukti_pay']['name'],
                'kk' => $_FILES['kk']['name'],
                'bukti_prestasi' => $_FILES['bukti_prestasi']['name'],
                'surat_aktif' => $_FILES['surat_aktif']['name'],
                'raport_pesantren' => $_FILES['raport_pesantren']['name'],
                'ktp_ayah' => $_FILES['ktp_ayah']['name'],
                'ktp_ibu' => $_FILES['ktp_ibu']['name'],
                'sk_lulus' => $_FILES['sk_lulus']['name'],
                'akte' => $_FILES['akte']['name'],
                'paspoto' => $_FILES['paspoto']['name']
            ];

            $this->load->library('upload');

            $file_data = [];
            foreach ($uploads as $key => $file_name) {
                $config['upload_path'] = './uploads/';
                $config['max_size'] = 2048;
                $config['allowed_types'] = ($key === 'paspoto') ? 'png|jpg|jpeg' : 'pdf';
                $this->upload->initialize($config);

                if (!empty($file_name)) {
                    if ($this->upload->do_upload($key)) {
                        $file_data[$key] = $this->upload->data('file_name');
                    } else {
                        $errors[$key] = $this->upload->display_errors();
                    }
                } else {
                    $file_data[$key] = null;
                }
            }

            // Debug hasil upload
            if (!empty($errors)) {
                echo "<pre>";
                print_r($errors);
                echo "</pre>";
            } else {
                echo "Semua file berhasil diupload!";
            }

            $data_insert = [
                'nm_santri' => $this->input->post('nm_santri'),
                'id_user' => $this->input->post('id_user'),
                'jk' => $this->input->post('jk'),
                'tpt_lahir' => $this->input->post('tpt_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'siswa_kelas' => $this->input->post('siswa_kelas'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nisn' => $this->input->post('nisn'),
                'nm_ayah' => $this->input->post('nm_ayah'),
                'nm_ibu' => $this->input->post('nm_ibu'),
                'kerja_ayah' => $this->input->post('kerja_ayah'),
                'kerja_ibu' => $this->input->post('kerja_ibu'),
                'alamat' => $this->input->post('alamat'),
                'telp_ayah' => $this->input->post('telp_ayah'),
                'telp_ibu' => $this->input->post('telp_ibu'),
                'jalur_daftar' => $this->input->post('jalur_daftar'),
                'kk' => isset($file_data['kk']) ? $file_data['kk'] : null,
                'bukti_prestasi' => isset($file_data['bukti_prestasi']) ? $file_data['bukti_prestasi'] : null,
                'surat_aktif' => isset($file_data['surat_aktif']) ? $file_data['surat_aktif'] : null,
                'raport_pesantren' => isset($file_data['raport_pesantren']) ? $file_data['raport_pesantren'] : null,
                'ktp_ayah' => isset($file_data['ktp_ayah']) ? $file_data['ktp_ayah'] : null,
                'ktp_ibu' => isset($file_data['ktp_ibu']) ? $file_data['ktp_ibu'] : null,
                'sk_lulus' => isset($file_data['sk_lulus']) ? $file_data['sk_lulus'] : null,
                'akte' => isset($file_data['akte']) ? $file_data['akte'] : null,
                'paspoto' => isset($file_data['paspoto']) ? $file_data['paspoto'] : null
            ];

            $this->db->insert('tb_registrasi', $data_insert);

            // masuk ke tb_pay
            if (isset($file_data['bukti_pay'])) {
                $pay_data = [
                    'id_reg' => $this->db->insert_id(),
                    'bukti_pay' => $file_data['bukti_pay']
                ];
                $this->db->insert('tb_pay', $pay_data);
            }

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-primary" role="alert">Selamat Pendaftaran Berhasil</div>'
            );
            redirect('user');
        }
    }



    public function simpanPay()
    {
        $id_registrasi = $this->input->post('id_registrasi');

        $uploadedFiles = $this->input->post('bukti_pay');

        $dataPay = [
            'id_registrasi'   => $id_registrasi,
            'tgl_pay' => time(),
            'bukti_pay'        => isset($uploadedFiles) ? $uploadedFiles : ''
        ];

        $this->db->insert('tb_pay', $dataPay);

        // $this->session->set_flashdata(
        //     'message',
        //     '<div class="alert alert-success" role="alert">Pembayaran berhasil disimpan!</div>'
        // );

        redirect('user');
    }
}
