<?php
class M_jadwal extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAllJadwal($ids) {
		$this->db->select("tmj.id_mapel_jadwal_url AS _id,
						   IFNULL(tmjd.jadwal_hari,'-') AS hari,
						   CONCAT(tk.kelas_tingkat,tk.kelas_abjad) AS kelas,
						   tmm.mapel_nama AS mapel,
						   TRIM(CONCAT(IFNULL(tmg.guru_gelar_depan,''),' ',tmg.guru_nama,' ',IFNULL(tmg.guru_gelar_belakang,''))) AS guru,
						   IFNULL(tmjd.jadwal_jampel_awal,'-') AS awal,
						   IFNULL(tmjd.jadwal_jampel_akhir,'-') AS akhir");
		$this->db->join("tbl_mapel_jadwal_detail tmjd", "tmj.id_mapel_jadwal = tmjd.id_mapel_jadwal", "left");
		$this->db->join("tbl_kelas tk", "tmj.id_kelas = tk.id_kelas");
		$this->db->join("tbl_master_mapel tmm", "tmj.id_mapel = tmm.id_mapel");
		$this->db->join("tbl_master_guru tmg", "tmj.id_guru = tmg.id_guru");
		$this->db->join("tbl_sys_semester tss", "tmj.id_semester = tss.id_semester");
		$this->db->where("tmj.status", 1);
		$this->db->where("tss.id_semester_url", $ids);
		$this->db->order_by("hari", "DESC");
		$this->db->order_by("awal", "ASC");
		$sql = $this->db->get("tbl_mapel_jadwal tmj");

		return $sql;
	}

	function getJadwalByID($id) {
		$this->db->select("tmj.id_mapel_jadwal_url AS _id,
						   CONCAT(tk.kelas_tingkat,tk.kelas_abjad) AS kelas,
						   tmm.mapel_nama AS mapel");
		$this->db->join("tbl_kelas tk", "tmj.id_kelas = tk.id_kelas");
		$this->db->join("tbl_master_mapel tmm", "tmj.id_mapel = tmm.id_mapel");
		$this->db->where("tmj.id_mapel_jadwal_url", $id);
		$sql = $this->db->get("tbl_mapel_jadwal tmj");

		return $sql;
	}

	function getJadwalIDFromURL($id) {
		$this->db->select("id_mapel_jadwal");
		$this->db->where("id_mapel_jadwal_url", $id);

		$sql = $this->db->get("tbl_mapel_jadwal");
		$res = $sql->row();
        return $res->id_mapel_jadwal;
	}

	function aturJadwalMapel($data) {
		$sql = $this->db->insert("tbl_mapel_jadwal_detail", $data);
		return $sql;
	}
}
?>