<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_menu extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT tu.*, tm.menu
                FROM tb_user_sub_menu AS tu
                JOIN tb_user_menu AS tm
                ON tu.id_user_menu = tm.id_user_menu";

        return $this->db->query($query)->result_array();
    }


    ////////////// MENU START /////////////////
    public function hapusMenu($id)
    {
        $this->db->where('id_user_menu', $id);
        $this->db->delete('tb_user_menu');
    }
    ///////////// MENU END /////////////////////

    
    ///////////// SUBMENU START ////////////////
    public function hapusSubMenu($id)
    {
        $this->db->where('id_user_sub_menu', $id);
        $this->db->delete('tb_user_sub_menu');
    }
}
