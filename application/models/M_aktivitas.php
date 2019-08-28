<?php
class M_aktivitas extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model("M_app");
	}

	function showAktivitasUser() {
		$this->db->select("user_role as role, user_act as act, user_act_desc as desc, created_at as date");
		$this->db->where("status", 1);
		$this->db->order_by("created_at", "desc");
		$db = $this->db->get("tbl_sys_aktivitas");

		return $db->result();
	}

	function tambahAktivitasUser($role,$uid,$act,$desc) {
		if($role == "superadmin") {
			$this->db->select("id_sadmin");
			$this->db->where("id_sadmin_url", $uid);
			$sqlu = $this->db->get("tbl_super_admin");
			$resu = $sqlu->row();
			$uid_new = $resu->id_sadmin;
		} else if($role == "guru") {
			$this->db->select("id_guru");
			$this->db->where("id_guru_url", $uid);
			$sqlg = $this->db->get("tbl_master_guru");
			$resg = $sqlg->row();
			$uid_new = $resg->id_guru;
		}

		if($act == "insert") {
			$act_new = "<span class='badge badge-success'>".$act."</span>";
		} else if($act == "update") {
			$act_new = "<span class='badge badge-warning'>".$act."</span>";
		} else if($act == "view") {
			$act_new = "<span class='badge badge-info'>".$act."</span>";
		} else if($act == "delete") {
			$act_new = "<span class='badge badge-danger'>".$act."</span>";
		}

		$data = [
			"id_aktivitas" => '',
			"id_aktivitas_url" => $this->M_app->randomString(20),
			"user_role" => $role,
			"user_id" => $uid_new,
			"user_act" => $act_new,
			"user_act_desc" => "User <span class='badge badge-dark'>".$uid."</span> telah melakukan ".$act." pada ".$desc,
			"created_at" => $this->M_app->datetimeNow(),
			"modified_at" => NULL,
			"status" => 1
		];

		$this->db->insert("tbl_sys_aktivitas", $data);
	}
}