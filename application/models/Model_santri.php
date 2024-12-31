<?php

class Model_santri extends CI_Model
{

    public function getAllCalonSantri()
    {
        return $this->db->get('tb_registrasi')->result_array();
    }


    public function getCalonSantriById($id)
    {
        return $this->db->get_where('tb_registrasi', ['id_reg' => $id])->row_array();
    }

    public function deleteCalonSantri($id)
    {
        $this->db->where('id_reg', $id);
        $this->db->delete('tb_registrasi');
    }
}
