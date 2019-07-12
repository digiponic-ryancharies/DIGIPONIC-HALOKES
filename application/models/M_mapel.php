<?php
class M_mapel extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAllMapel() {
		$this->db->select("tmm.id_mapel_url AS id_mapel, 
						   tmm.mapel_nama AS nama_mapel,
						   tmk.kurikulum_nama AS nama_kurikulum,
						   tmg.mapel_grup_nama AS nama_grup,
						   tmm.status");
		$this->db->join("tbl_mapel_kurikulum tmk", "tmk.id_mapel_kurikulum = tmm.id_mapel_kurikulum");
		$this->db->join("tbl_mapel_grup tmg", "tmg.id_mapel_grup = tmm.id_mapel_grup");
		$this->db->where("tmm.status", 1);
		$sql = $this->db->get("tbl_master_mapel tmm");

		return $sql->result_array();
	}

	function getMapelAktifByKurikulum() {
		$this->db->select("tmm.id_mapel_url AS _id,
						   tmm.mapel_nama AS nama_mapel");
		$this->db->join("tbl_mapel_kurikulum tmk", "tmm.id_mapel_kurikulum = tmk.id_mapel_kurikulum");
		$this->db->where("tmk.kurikulum_aktif", 1);

		$sql = $this->db->get("tbl_master_mapel tmm");
		return $sql;
	}

    function getMapelIDFromURL($idu) {
        $this->db->select("id_mapel");
        $this->db->where("id_mapel_url", $idu);

        $sql = $this->db->get("tbl_master_mapel");
        $res = $sql->row();
        return $res->id_mapel;
    }

	function tambahMapel($data) {
		$sql = $this->db->insert("tbl_master_mapel", $data);
		return $sql;
	}
}
?>