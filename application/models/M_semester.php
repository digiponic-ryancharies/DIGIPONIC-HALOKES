<?php
class M_semester extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getSemesterAll() {
		
		//$sql = $this->db->get("tbl_mapel_jadwal tmj");

		return $sql;
	}

	function tambahSemester($data){
        $sql = $this->db->insert("tbl_sys_semester", $data);
        return $sql;
	}
}
?>