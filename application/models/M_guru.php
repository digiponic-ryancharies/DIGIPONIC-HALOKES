<?php

class M_guru extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        //$this->db->select("id_ekskul_url, ekskul_nama, ekskul_jadwal");
        $this->db->where("status", 1);
        $sql = $this->db->get("tbl_master_guru");

        return $sql->result_array();
    }

    function tambahGuru($data)
    {
        $sql = $this->db->insert("tbl_master_guru", $data);
        return $sql;
    }
}

?>