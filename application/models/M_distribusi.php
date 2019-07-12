<?php
class M_distribusi extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAllWaliKelasAktif($ids) {
		$this->db->select("tk.id_kelas_url AS _id,
						   CONCAT(tk.kelas_tingkat, tk.kelas_abjad) AS nama_kelas,
						   LTRIM(CONCAT(IFNULL(tmg.guru_gelar_depan,''),' ',tmg.guru_nama,' ',tmg.guru_gelar_belakang)) AS nama_guru,
						   tkw.status AS status");
		$this->db->join("tbl_kelas_wali tkw", "tk.id_kelas = tkw.id_kelas", "left");
		$this->db->join("tbl_master_guru tmg", "tkw.id_guru = tmg.id_guru", "left");
		$this->db->join("tbl_sys_semester tss", "tss.id_semester = tk.id_semester");
		$this->db->where("tss.id_semester_url", $ids);
		$this->db->where("tmg.guru_nama IS NOT NULL", null, false);
		$this->db->where("tk.status", 1);

		$sql = $this->db->get("tbl_kelas tk");
		return $sql;
	}

	function tambahWakel($data) {
		$sql = $this->db->insert("tbl_kelas_wali", $data);
		return $sql;
	}

	function tambahGuruAjar($data) {
		$sql = $this->db->insert("tbl_mapel_jadwal", $data);
		return $sql;
	}
}
?>