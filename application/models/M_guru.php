<?php
class M_guru extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getAll() {
        //$this->db->select("id_ekskul_url, ekskul_nama, ekskul_jadwal");
        $this->db->where("status", 1);
        $sql = $this->db->get("tbl_master_guru");

        return $sql->result_array();
    }

    function tambahGuru($data) {
        $sql = $this->db->insert("tbl_master_guru", $data);
        return $sql;
    }

    function getGuruBelumWakel($ids) {
        $this->db->select("tmg.id_guru_url AS _id, tmg.guru_nama AS nama_guru");
        $this->db->join("tbl_kelas tk", "tkw.id_kelas = tk.id_kelas");
        $this->db->join("tbl_master_guru tmg", "tkw.id_guru = tmg.id_guru", "right");
        $this->db->join("tbl_sys_semester tss", "tk.id_semester = tss.id_semester", "left");
        $this->db->where("tss.id_semester_url <>", $ids);
        $this->db->or_where("tss.id_semester_url IS NULL", null, false);

        $sql = $this->db->get("tbl_kelas_wali tkw");
        return $sql;
    }
}
?>