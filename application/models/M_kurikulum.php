<?php
class M_kurikulum extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAllGrupKurikulum() {
		$this->db->select("id_mapel_kurikulum_url AS id, kurikulum_nama AS nama, status");
		$this->db->where("status", 1);
		$sql = $this->db->get("tbl_mapel_kurikulum");

		return $sql->result_array();
	}

	function getAllGrupMapel() {
		$this->db->select("tmg.id_mapel_grup_url AS id, 
						   tmk.kurikulum_nama AS nama_kurikulum, 
						   tmg.mapel_grup_nama AS nama_grup_mapel, 
						   tmg.status");
		$this->db->join("tbl_mapel_kurikulum tmk", "tmg.id_mapel_kurikulum = tmk.id_mapel_kurikulum");
		$this->db->where("tmg.status", 1);
		$sql = $this->db->get("tbl_mapel_grup tmg");

		return $sql->result_array();
	}

	function getIDGrupKurikulum($id) {
		$this->db->select("id_mapel_kurikulum");
		$this->db->where("id_mapel_kurikulum_url", $id);
		$sql = $this->db->get("tbl_mapel_kurikulum");
		$res = $sql->row();

		return $res->id_mapel_kurikulum;
	}

	function getIDGrupMapel($id) {
		$this->db->select("id_mapel_grup");
		$this->db->where("id_mapel_grup_url", $id);
		$sql = $this->db->get("tbl_mapel_grup");
		$res = $sql->row();

		return $res->id_mapel_grup;
	}

	function getGrupMapelByGrupKur($id) {
		$this->db->select("tmg.id_mapel_grup_url AS id, tmg.mapel_grup_nama AS nama");
		$this->db->join("tbl_mapel_kurikulum tmk", "tmk.id_mapel_kurikulum = tmg.id_mapel_kurikulum");
		$this->db->where("tmk.id_mapel_kurikulum_url", $id);
		$sql = $this->db->get("tbl_mapel_grup tmg");

		return $sql;
	}

	function tambahGrupKurikulum($data) {
		$sql = $this->db->insert("tbl_mapel_kurikulum", $data);
		return $sql;
	}

	function tambahGrupMapel($data) {
		$sql = $this->db->insert("tbl_mapel_grup", $data);
		return $sql;
	}
}
?>