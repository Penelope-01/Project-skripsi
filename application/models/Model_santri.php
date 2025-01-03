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

    public function getSantriCount()
    {
        $this->db->select('COUNT(*) AS total_santri');
        $this->db->from('tb_registrasi');
        $query = $this->db->get();
        $result = $query->row();
        return $result->total_santri;
    }
}
