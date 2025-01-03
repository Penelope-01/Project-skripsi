<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_santri');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['total_santri'] = $this->Model_santri->getSantriCount();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }



    ///////////////// ROLE START ///////////////////
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();


        $data['role'] = $this->db->get('tb_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }



    public function roleAkses($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('tb_role', ['role_id' => $role_id])->row_array();

        $this->db->where('id_user_menu !=', 1);
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-akses', $data);
        $this->load->view('templates/footer');
    }


    public function gantiAkses()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'id_user_menu' => $menu_id
        ];

        $result = $this->db->get_where('tb_user_akses_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tb_user_akses_menu', $data);
        } else {
            $this->db->delete('tb_user_akses_menu', $data);
        }
    }
    //////////////////////// ROLE END //////////////////////////




    /////////////////////// CALON SANTRI START  ///////////////////
    public function calonSantri()
    {
        $data['title'] = 'Data Registrasi Calon Santri';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['calonSantri'] = $this->Model_santri->getAllCalonSantri();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/calon-santri', $data);
        $this->load->view('templates/footer');
    }


    public function detail($id)
    {
        $data['title'] = 'Detail Calon Santri';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['calonSantri'] = $this->Model_santri->getCalonSantriById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail-santri', $data);
        $this->load->view('templates/footer');
    }


    public function deleteCalonSantri($id)
    {
        $this->Model_santri->deleteCalonSantri($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">data calon santri berhasil dihapus</div>'
        );
        redirect('admin/calonSantri');
    }
    /////////////////////// CALON SANTRI END  ///////////////////



}
