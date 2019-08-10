<?php
class M_guru extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getAll() {
        $this->db->select("id_guru_url AS _id, IFNULL(guru_nip,'-') AS nip,
                           TRIM(CONCAT(IFNULL(guru_gelar_depan,''),' ',guru_nama,' ',IFNULL(guru_gelar_belakang,''))) AS nama_guru,
                           IFNULL(guru_email,'-') AS email_guru, status");
        $this->db->where("status", 1);
        $sql = $this->db->get("tbl_master_guru");
        return $sql->result_array();
    }

    function getGuruBelumWakel($ids) {
        $this->db->select("tmg.id_guru_url AS _id, 
                           TRIM(CONCAT(IFNULL(tmg.guru_gelar_depan,''),' ',tmg.guru_nama,' ',IFNULL(tmg.guru_gelar_belakang,''))) AS nama_guru");
        $this->db->join("tbl_kelas tk", "tkw.id_kelas = tk.id_kelas");
        $this->db->join("tbl_master_guru tmg", "tkw.id_guru = tmg.id_guru", "right");
        $this->db->join("tbl_sys_semester tss", "tk.id_semester = tss.id_semester", "left");
        $this->db->where("tss.id_semester_url <>", $ids);
        $this->db->or_where("tss.id_semester_url IS NULL", null, false);

        $sql = $this->db->get("tbl_kelas_wali tkw");
        return $sql;
    }

    function getGuruPengajarAktif($ids) {
        $this->db->select("tmj.id_mapel_jadwal_url AS _id,
                           TRIM(CONCAT(IFNULL(guru_gelar_depan,''),' ',guru_nama,' ',IFNULL(guru_gelar_belakang,''))) AS guru,
                           tmm.mapel_nama AS mapel,
                           CONCAT(tk.kelas_tingkat,tk.kelas_abjad) AS kelas,
                           tmj.status AS status");
        $this->db->join("tbl_master_guru tmg","tmj.id_guru = tmg.id_guru");
        $this->db->join("tbl_master_mapel tmm","tmj.id_mapel = tmm.id_mapel");
        $this->db->join("tbl_kelas tk","tmj.id_kelas = tk.id_kelas");
        $this->db->join("tbl_sys_semester tss","tmj.id_semester = tss.id_semester");
        $this->db->where("tmj.status", 1);
        $this->db->where("tss.id_semester_url", $ids);

        $sql = $this->db->get("tbl_mapel_jadwal tmj");
        return $sql;
    }

    function getGuruIDFromURL($idu) {
        $this->db->select("id_guru");
        $this->db->where("id_guru_url", $idu);

        $sql = $this->db->get("tbl_master_guru");
        $res = $sql->row();
        return $res->id_guru;
    }

    function tambahGuru($data) {
        $sql = $this->db->insert("tbl_master_guru", $data);
        return $sql;
    }
}
?>