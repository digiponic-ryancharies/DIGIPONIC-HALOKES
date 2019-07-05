<?php

class M_kelas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll()
    {
        $this->db->join("tbl_sys_semester sms", "sms.id_semester = k.id_semester");
        $this->db->join("tbl_master_guru g", "g.id_guru = k.id_guru");
        $this->db->select("k.*, sms.semester_nama, g.guru_gelar_depan, g.guru_nama, g.guru_gelar_belakang, g.guru_nip");
        $this->db->where("k.status", 1);
        $sql = $this->db->get("tbl_kelas k");

        return $sql->result_array();
    }

    function tambahKelas($data)
    {
        $sql = $this->db->insert("tbl_kelas", $data);
        return $sql;
    }
}

?>