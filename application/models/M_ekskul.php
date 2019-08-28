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

	function getEkskulIDFromURL($idu) {
		$this->db->select("id_ekskul");
        $this->db->where("id_ekskul_url", $idu);

        $sql = $this->db->get("tbl_master_ekskul");
        $res = $sql->row();
        return $res->id_ekskul;
	}

	function tambahEkskul($data) {
		$sql = $this->db->insert("tbl_master_ekskul", $data);
		return $sql;
	}
}
?>