<?php

class M_kelas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getAll($ids)
    {
        $this->db->select("k.id_kelas_url AS _id,
                           CONCAT(k.kelas_tingkat,k.kelas_abjad) AS nama_kelas,
                           COUNT(tkd.id_kelas_detail) AS jml_siswa,
                           k.kelas_ruang AS ruang,
                           k.status AS status");
        $this->db->join("tbl_kelas_detail tkd", "k.id_kelas = tkd.id_kelas", "left");
        $this->db->join("tbl_sys_semester sms", "sms.id_semester = k.id_semester");
        $this->db->where("k.status", 1);
        $this->db->where("sms.id_semester_url", $ids);
        $this->db->group_by("k.id_kelas");
        $sql = $this->db->get("tbl_kelas k");

        return $sql->result_array();
    }

    function tambahKelas($data)
    {
        $sql = $this->db->insert("tbl_kelas", $data);
        return $sql;
    }

    function getKelasTanpaWakel($ids)
    {
        $this->db->select("tk.id_kelas_url AS _id,
                           CONCAT(tk.kelas_tingkat, tk.kelas_abjad) AS nama_kelas");
        $this->db->join("tbl_kelas_wali tkw", "tk.id_kelas = tkw.id_kelas", "left");
        $this->db->join("tbl_master_guru tmg", "tkw.id_guru = tmg.id_guru", "left");
        $this->db->join("tbl_sys_semester tss", "tss.id_semester = tk.id_semester");
        $this->db->where("tss.id_semester_url", $ids);
        $this->db->where("tmg.guru_nama IS NULL", null, false);
        $this->db->where("tk.status", 1);

        $sql = $this->db->get("tbl_kelas tk");
        return $sql;
    }

    function getKelasIDFromURL($idu)
    {
        $this->db->select("id_kelas");
        $this->db->where("id_kelas_url", $idu);

        $sql = $this->db->get("tbl_kelas");
        $res = $sql->row();
        return $res->id_kelas;
    }

    function getDaftarKelas()
    {
        $this->db->select("k.id_kelas_url AS _id,
                           CONCAT(k.kelas_tingkat,k.kelas_abjad) AS nama_kelas,
                           COUNT(tkd.id_kelas_detail) AS jml_siswa");
        $this->db->join("tbl_kelas_detail tkd", "k.id_kelas = tkd.id_kelas", "left");
        $this->db->where("k.status", 1);
        $this->db->group_by("k.id_kelas");
        $sql = $this->db->get("tbl_kelas k");
        $res = $sql->result_array();
        /*$result = [];
        foreach ($rKelas as $row) {
            $this->db->select("tms.id_siswa_url AS _id, 
						   tms.siswa_nama AS nama");
            $this->db->join("tbl_master_siswa tms", "tkd.id_siswa = tms.id_siswa", "left");
            $this->db->where("tkd.id_kelas", $row['id_kelas']);
            $sql2 = $this->db->get("tbl_kelas_detail tkd");
            $row['siswa'] = $sql2->result_array();
            $result[] = $row;
        }*/

        return $res;
    }

    function aturKelasSiswa($dataSiswa)
    {
        $sql = $this->db->insert_batch('tbl_kelas_detail', $dataSiswa);
        return $sql;
    }
}

?>