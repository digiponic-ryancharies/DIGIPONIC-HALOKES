<?php
class M_semester extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getSemesterAll() {
		$this->db->select("id_semester_url as _id, semeseter_nama as smt_nama, status as smt_status");
		$sql = $this->db->get("tbl_sys_semester");

		return $sql;
	}

	function tambahSemester($data){
        $sql = $this->db->insert("tbl_sys_semester", $data);
        return $sql;
	}
}
?>