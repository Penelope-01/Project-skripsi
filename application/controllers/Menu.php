<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Model_menu');
    }



    /////////////////////// MENU START /////////////////////
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan</div>'
            );
            redirect('menu');
        }
    }


    public function hapusMenu($id)
    {
        $this->Model_menu->hapusMenu($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Menu berhasil dihapus</div>'
        );
        redirect('menu');
    }
    /////////////////// MENU END /////////////////////////////////





    //////////////////  SUBMENU START ///////////////////////////
    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        // $this->load->model('Model_menu', 'menu');

        $data['subMenu'] = $this->Model_menu->getSubMenu();
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Nama sub menu', 'required');
        $this->form_validation->set_rules('id_user_menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'id_user_menu' => $this->input->post('id_user_menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('tb_user_sub_menu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Sub Menu baru berhasil ditambahkan</div>'
            );
            redirect('menu/submenu');
        }
    }

    public function hapusSubMenu($id)
    {
        $this->Model_menu->hapusSubMenu($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Sub Menu berhasil dihapus</div>'
        );
        redirect('menu/submenu');
    }
    //////////////////////// SUBMENU END /////////////////////////


}
