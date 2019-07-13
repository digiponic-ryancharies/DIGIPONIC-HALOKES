<?php
class M_jadwal extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAllJadwal($ids) {
		$this->db->select("tmj.id_mapel_jadwal_url AS _id,
						   IFNULL(tmj.jadwal_hari,'-') AS hari,
						   CONCAT(tk.kelas_tingkat,tk.kelas_abjad) AS kelas,
						   tmm.mapel_nama AS mapel,
						   LTRIM(CONCAT(IFNULL(tmg.guru_gelar_depan,''),' ',tmg.guru_nama,' ',tmg.guru_gelar_belakang)) AS guru,
						   IFNULL(tmj.jadwal_jampel,'-') AS jam");
		$this->db->join("tbl_kelas tk", "tmj.id_kelas = tk.id_kelas");
		$this->db->join("tbl_master_mapel tmm", "tmj.id_mapel = tmm.id_mapel");
		$this->db->join("tbl_master_guru tmg", "tmj.id_guru = tmg.id_guru");
		$this->db->join("tbl_sys_semester tss", "tmj.id_semester = tss.id_semester");
		$this->db->where("tmj.status", 1);
		$this->db->where("tss.id_semester_url", $ids);
		$sql = $this->db->get("tbl_mapel_jadwal tmj");

		return $sql->result_array();
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

	function aturJadwalMapel($data,$id) {
		$sql = $this->db->update("tbl_mapel_jadwal", $data, ["id_mapel_jadwal_url" => $id]);
		return $sql;
	}
}
?>