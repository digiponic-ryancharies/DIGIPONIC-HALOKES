<?php
class M_kalender extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getKalenderAll($ids) {
		$this->db->select("tik.id_kalendar_url,
							tik.kalender_nama,
							tst.tapel_nama,
							tss.semester_nama");
		//$this->db->from("")
		$this->db->join("tbl_info_kalender tik", "tik.id_kalendar = tkd.id_kalendar");
		$this->db->join("tbl_sys_tapel tst", "tst.id_tapel = tkd.id_tapel");
		$this->db->join("tbl_sys_semester tss", "tst.id_tapel = tss.id_tapel");
		$this->db->where("tss.id_semester_url", $ids);
		$sql = $this->db->get("tbl_kalender_detail tkd");

		return $sql;
	}
}