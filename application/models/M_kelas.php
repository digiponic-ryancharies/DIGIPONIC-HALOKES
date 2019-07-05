<?php
class M_kelas extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getKelasTanpaWakel($ids) {
		$this->db->select("tk.id_kelas_url AS _id,
						   CONCAT(tk.kelas_tingkat, tk.kelas_abjad) AS nama_kelas");
		$this->db->join("tbl_kelas_wali tkw", "tk.id_kelas = tkw.id_kelas", "left");
		$this->db->join("tbl_master_guru tmg", "tkw.id_guru = tmg.id_guru", "left");
		$this->db->join("tbl_sys_semester tss", "tss.id_semester = tk.id_semester");
		$this->db->where("tss.id_semester_url", $ids);
		$this->db->where("tmg.guru_nama IS NULL", null, false);
		$this->db->where("tk.status", 1);

		$sql = $this->db->get("tbl_kelas tk");
		return $sql;
	}
}
?>