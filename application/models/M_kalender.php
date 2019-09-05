<?php
class M_kalender extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getKalenderAll($ids) {
		$this->db->select("tik.id_kalender_url as _id,
							tik.kalender_nama,
							tst.tapel_nama as tapel,
							tss.semester_nama as semester");
		//$this->db->from("")
		$this->db->join("tbl_info_kalender tik", "tik.id_kalender = tkd.id_kalender", "left");
		$this->db->join("tbl_sys_tapel tst", "tst.id_tapel = tkd.id_tapel");
		$this->db->join("tbl_sys_semester tss", "tst.id_tapel = tss.id_tapel");
		$this->db->where("tik.status", 1);
		//$this->db->where("tss.id_semester_url", $ids);
		$sql = $this->db->get("tbl_kalender_detail tkd");

	

		return $sql;
	}

	function getKalenderDetail($kalN){
		$this->db->select("tkd.id_kalender_detail_url as _id,
							tkd.kalender_kegiatan as kegiatan,
							tkd.kalender_tggl_awal as tgl_awal,
							tkd.kalender_tggl_akhir as tgl_akhir,
							tik.kalender_nama as kalender");
		//$this->db->from("")
		$this->db->join("tbl_info_kalender tik", "tik.id_kalender = tkd.id_kalender");
		$this->db->where("tik.status", 1);
		$this->db->where("tik.id_kalender_url", $kalN);
		$sql = $this->db->get("tbl_kalender_detail tkd");

		return $sql;
	}

	function getIdKalenderByURL($kalenderUrl){
		$this->db->select("id_kalender");
		$this->db->where("id_kalender_url", $kalenderUrl);
		$sql = $this->db->get("tb_info_kalender");

		return $sql->row()->id_kalender;
	}

	function tambahKalender($data){
        $sql = $this->db->insert("tbl_info_kalender", $data);
        return $sql;
	}

	function tambahDetailKalender($data){
		$sql = $this->db->insert("tbl_kalender_detail", $data)
		return $sql;
	}
}