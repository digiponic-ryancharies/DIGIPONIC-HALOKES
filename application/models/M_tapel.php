<?php
class M_jadwal extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getTapelAll() {
		$this->db->select("id_tapel_url as _id, tapel_nama, status as tapel_status");
		$this->db->where("tapel_aktif",1);
		$sql = $this->db->get("tbl_sys_tapel");

		return $sql;
	}

	function tambahKalender($data){
        $sql = $this->db->insert("tbl_sys_tapel", $data);
        return $sql;
	}
}
?>