<?php
class M_distribusi extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function getAllWaliKelasAktif($ids) {
		$this->db->select("tk.id_kelas_url AS _id,
						   CONCAT(tk.kelas_tingkat, tk.kelas_abjad) AS nama_kelas,
						   TRIM(CONCAT(IFNULL(tmg.guru_gelar_depan,''),' ',tmg.guru_nama,' ',IFNULL(tmg.guru_gelar_belakang,''))) AS nama_guru,
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
		// Cek Guru Ajar
		$this->db->select("id_mapel_jadwal");
		$this->db->where("id_semester", $data['id_semester']);
		$this->db->where("id_mapel", $data['id_mapel']);
		$this->db->where("id_guru", $data['id_guru']);
		$this->db->where("id_kelas", $data['id_kelas']);
		$cek = $this->db->get("tbl_mapel_jadwal");

		if($cek->num_rows() == 0) {
			$sql = $this->db->insert("tbl_mapel_jadwal", $data);
			return 0; // oke
		} else {
			return 1; // sudah ada
		}

		return 2; // something wrong
	}
}
?>