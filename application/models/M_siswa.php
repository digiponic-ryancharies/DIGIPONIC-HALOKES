<?php

class M_siswa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAllSiswaAktif()
    {
        $this->db->select("tms.id_siswa_url AS id,
						   tms.siswa_nis AS nis, 
						   tms.siswa_nama AS nama,
						   tst.tapel_tahun AS angkatan, 
						   tms.status");
        $this->db->where("tms.status", 1);
        $this->db->join("tbl_sys_tapel tst", "tms.id_tapel = tst.id_tapel");
        $sql = $this->db->get("tbl_master_siswa tms");

        return $sql->result_array();
    }

    function tambahSiswa($data)
    {
        $sql = $this->db->insert("tbl_master_siswa", $data);
        return $sql;
    }

    function getAllSiswaBaru()
    {
        $this->db->select("tms.id_siswa_url AS _id,
						   tms.siswa_nis AS nisn, 
						   tms.siswa_nama AS nama,
						   tsb.sb_un_indo AS un_indo, 
						   tsb.sb_un_mat AS un_mat, 
						   tsb.sb_un_ing AS un_ing, 
						   tsb.sb_asal_sekolah AS asal_sekolah, 
						   tsb.created_at AS tgl_daftar");
//        $this->db->where("tms.status", 1);
        $this->db->join("tbl_siswa_baru tsb", "tms.id_siswa = tsb.id_siswa");
        $sql = $this->db->get("tbl_master_siswa tms");

        return $sql->result_array();
    }

    function tambahSiswaMaster($data)
    {
        $sql = $this->db->insert("tbl_master_siswa", $data);
        if ($sql) {
            return $this->db->insert_id();
        }
        return $sql;
    }

    function tambahOrtuSiswa($data)
    {
        $sql = $this->db->insert("tbl_siswa_ortu", $data);
        return $sql;
    }

    function tambahSiswaBaru($data)
    {
        $sql = $this->db->insert("tbl_siswa_baru", $data);
        return $sql;
    }

}

?>