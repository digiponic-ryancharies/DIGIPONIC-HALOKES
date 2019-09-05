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

	function tambahKalender($data){
        $sql = $this->db->insert("tbl_sys_tapel", $data);
        return $sql;
	}
}
?>