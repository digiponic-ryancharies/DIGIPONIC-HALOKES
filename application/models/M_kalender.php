<?php
class M_kalender extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getKalenderAll($ids) {
		$this->db->select("tik.id_kalendar_url as _id,
							tik.kalender_nama,
							tst.tapel_nama as tapel,
							tss.semester_nama as semester");
		//$this->db->from("")
		$this->db->join("tbl_info_kalendar tik", "tik.id_kalendar = tkd.id_kalendar", "left");
		$this->db->join("tbl_sys_tapel tst", "tst.id_tapel = tkd.id_tapel");
		$this->db->join("tbl_sys_semester tss", "tst.id_tapel = tss.id_tapel");
		$this->db->where("tik.status", 1);
		//$this->db->where("tss.id_semester_url", $ids);
		$sql = $this->db->get("tbl_kalendar_detail tkd");

	

		return $sql;
	}

	function getKalenderDetail($kalN){
		$this->db->select("tkd.id_kalendar_detail_url as _id,
							tkd.kalendar_kegiatan as kegiatan,
							tkd.kalendar_tggl_awal as tgl_awal,
							tkd.kalendar_tggl_akhir as tgl_akhir,
							tik.kalendar_nama as kalendar");
		//$this->db->from("")
		$this->db->join("tbl_info_kalendar tik", "tik.id_kalendar = tkd.id_kalendar");
		$this->db->where("tik.status", 1);
		$this->db->where("tik.id_kalendar_url", $kalN);
		$sql = $this->db->get("tbl_kalendar_detail tkd");

		return $sql;
	}
}