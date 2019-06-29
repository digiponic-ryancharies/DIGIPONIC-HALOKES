<?php
class M_ekskul extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAllEkskul() {
		$this->db->select("id_ekskul_url, ekskul_nama, ekskul_jadwal");
		$this->db->where("status", 1);
		$sql = $this->db->get("tbl_master_ekskul");

		return $sql->result_array();
	}

	function tambahEkskul($data) {
		$sql = $this->db->insert("tbl_master_ekskul", $data);
		return $sql;
	}
}
?>