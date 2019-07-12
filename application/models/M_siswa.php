<?php
class M_siswa extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAllSiswaAktif() {
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

	function tambahSiswa($data) {
		$sql = $this->db->insert("tbl_master_siswa", $data);
		return $sql;
	}
}
?>