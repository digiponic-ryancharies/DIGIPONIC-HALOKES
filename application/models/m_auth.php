<?php
class M_auth extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	function login($user,$pass) {
		if(empty($user) || empty($pass)) {
			$data['value'] = "";
			$data['status'] = FALSE;
		} else {
			$db = $this->db->query("SELECT tsa.id_sadmin_url AS id, tsa.sadmin_username AS username, tsa.sadmin_password AS password, '0' AS status
									FROM tbl_super_admin tsa WHERE tsa.sadmin_username='$user' AND tsa.sadmin_password='$pass'
									UNION
									SELECT tmg.id_guru_url AS id, tmg.guru_username AS username, tmg.guru_password AS password, '1' AS status 
									FROM tbl_master_guru tmg WHERE tmg.guru_username='$user' AND tmg.guru_password='$pass' 
									UNION
							  		SELECT tms.id_siswa_url AS id, tms.siswa_username AS username, tms.siswa_password AS password, '2' AS status 
							  		FROM tbl_master_siswa tms WHERE tms.siswa_username='$user' ANd tms.siswa_password='$pass'
							  		UNION
							  		SELECT tso.id_siswa_ortu_url AS id, tso.ortu_username AS username, tso.ortu_password AS password, '3' AS status 
							 		FROM tbl_siswa_ortu tso WHERE tso.ortu_username='$user' AND tso.ortu_password='$pass'
							 		UNION
							 		SELECT tmp.id_pegawai_url AS id, tmp.pegawai_username AS username, tmp.pegawai_password AS password, '4' AS status
							 		FROM tbl_master_pegawai tmp WHERE tmp.pegawai_username='$user' AND tmp.pegawai_password='$pass'");
			$res = $db->row();

			$user_db = $res->username;
			$pass_db = $res->password;
			$stts_db = $res->status;
			$id = $res->id;

			if($user == $user_db && $pass == $pass_db) {
				if($stts_db == 0) {
					$data['value'] = ["id_user" => $id, "username" => $user, "password" => $pass, "role" => "superadmin"];	
				} else if($stts_db == 1) {
					// get properti lainnya dan get role status apakah dia hanya guru atau ketambahan tugas sbg kesiswaan/kurikulum
					// daftar role status guru
					// 0 = guru biasa
					// 1 = kurikulum
					// 2 = kesiswaan
					$this->db->select("guru_gelar_depan, guru_gelar_belakang, guru_nama, guru_status");
					$this->db->where("id_guru_url", $id);
					$guru = $this->db->get("tbl_master_guru");
					$res_guru = $guru->row();
					
					$data['value'] = [
						"id_user" => $id, 
						"nama" => $res_guru->guru_nama,
						"gelar" => [
							"gelar_depan" => $res_guru->guru_gelar_depan,
							"gelar_belakang" => $res_guru->guru_gelar_belakang,
						],
						"username" => $user, 
						"password" => $pass, 
						"role" => "guru",
						"status_guru" => $res_guru->guru_status
					];
				} else if($stts_db == 2) {
					$data['value'] = ["id_user" => $id, "username" => $user, "password" => $pass, "role" => "siswa"];
				} else if($stts_db == 3) {
					$data['value'] = ["id_user" => $id, "username" => $user, "password" => $pass, "role" => "ortu"];
				} else if($stts_db == 4) {
					$data['value'] = ["id_user" => $id, "username" => $user, "password" => $pass, "role" => "pegawai"];
				} else {
					$data['value'] = "";
				}
			}
		}

		return $data;
	}
}
?>