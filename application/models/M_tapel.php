<?php
class M_jadwal extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getTapelAll($aktif) {
		
		$sql = $this->db->get("tbl_mapel_jadwal tmj");

		return $sql;
	}

	
}
?>