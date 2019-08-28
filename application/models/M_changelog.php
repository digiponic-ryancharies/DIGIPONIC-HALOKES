<?php
class M_changelog extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model("M_app");
	}

	function showChangelog() {
		$this->db->select("id_changelog_url AS _id, changelog_tgl AS tanggal, changelog_jenis AS jenis, changelog_ket AS keterangan");
		$this->db->where("status", 1);
		$this->db->order_by("created_at", "desc");
		$db = $this->db->get("tbl_sys_changelog");

		return $db->result();
	}

	function tambahChangelog() {
		$data = [
			"id_changelog" => '',
			"id_changelog_url" => $this->M_app->randomString(20),
			"changelog_tgl" => date("Y-m-d", strtotime($this->input->post("tanggal"))),
			"changelog_jenis" => $this->input->post("jenis"),
			"changelog_ket" => $this->input->post("keterangan"),
			"created_at" => $this->M_app->datetimeNow(),
			"modified_at" => NULL,
			"status" => 1
		];

		$this->db->insert("tbl_sys_changelog", $data);
	}
}