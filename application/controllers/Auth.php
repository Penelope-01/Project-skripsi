<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        // ambil data yang sudah lolos validasi
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                // hash password input dengan salt yang disimpan di database
                $saltedPassword = $password . $user['salt'];
                $hashedPassword = hash('sha256', $saltedPassword);

                // bandingkan hashed password cocok tidak
                if ($hashedPassword === $user['password']) {
                    // password cocok buat session
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    // cek level
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user/welcomeUser');
                    }
                } else {
                    // password salah
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">Password salah</div>'
                    );
                    redirect('auth');
                }
            } else {
                // email tidak aktif
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Email belum aktif</div>'
                );
                redirect('auth');
            }
        } else {
            // pengguna tidak ditemukan
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Email belum registrasi</div>'
            );
            redirect('auth');
        }
    }




    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[tb_user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/auth_footer');
        } else {
            $nama = htmlspecialchars($this->input->post('nama', true));
            $email = htmlspecialchars($this->input->post('email', true));
            $password = $this->input->post('password1');
            $encryptedPassword = encryptPassword($password);
            $hashedPassword = $encryptedPassword['hashedPassword'];
            $salt = $encryptedPassword['salt'];

            $data = [
                'nama' => $nama,
                'email' => $email,
                'gambar' => 'default.jpeg',
                'password' => $hashedPassword, 
                'salt' => $salt, 
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('tb_user', $data);

            //set flash data
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-primary" role="alert">Registrasi akun berhasil</div>'
            );
            redirect('auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-primary" role="alert">Berhasil keluar</div>'
        );
        redirect('auth');
    }



    public function blocked()
    {
        echo 'auth/blocked';
    }
}
