<?php
class M_app extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	// Date
	function datetimeNow() {
		date_default_timezone_set("Asia/Jakarta");
		return date("Y-m-d H:i:s");
	}

	function dateNow() {
		date_default_timezone_set("Asia/Jakarta");
		return date("Y-m-d");
	}

	function yearNow() {
		date_default_timezone_set("Asia/Jakarta");
		return date("Y");
	}

	function monthNow() {
		date_default_timezone_set("Asia/Jakarta");
		return date("m");
	}

	function dayNow() {
		date_default_timezone_set("Asia/Jakarta");
		return date("d");
	}

	function bulanIndo() {
		$month = [
	        '-- Bulan --' => 0,
	        'Januari' => 1,
	        'Februari' => 2,
	        'Maret' => 3,
	        'April' => 4,
	        'Mei' => 5,
	        'Juni' => 6,
	        'Juli' => 7,
	        'Agustus' => 8,
	        'September' => 9,
	        'Oktober' => 10,
	        "November" => 11,
	        "Desember" => 12
	    ];

	    return $month;
	}

	function hariIndo() {
		$hari = [
			'-- Hari --' => 0,
			'Senin' => 'senin',
			'Selasa' => 'selasa',
			'Rabu' => 'rabu',
			'Kamis' => 'kamis',
			'Jumat' => 'jumat',
			'Sabtu' => 'sabtu',
			'Minggu' => 'minggu'
		];

		return $hari;
	}

	// Tapel and Semester
	function generateTapel($id) {
		$this->db->select("id_tapel");
		$this->db->where("id_tapel_url", $id);
		$q = $this->db->get("tbl_sys_tapel");
		$res = $q->row();

		return $res->id_tapel;
	}

	function generateSemester($id) {
		$this->db->select("id_semester");
		$this->db->where("id_semester_url", $id);
		$q = $this->db->get("tbl_sys_semester");
		$res = $q->row();

		return $res->id_semester;
	}

	function getSemesterActive() {
		$this->db->select("id_semester_url");
		$this->db->where("semester_aktif", 1);
		$q = $this->db->get("tbl_sys_semester");
		$res = $q->row();

		return $res->id_semester_url;
	}

	// Misc
	function randomString($length) {
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		return substr(str_shuffle($str), 0, $length);
	}

	// ID
    function getLatestid($key, $table)
    {
        $this->db->select_max($key);
        $query = $this->db->get($table);
        $result = $query->row_array();

        return $result[$key] + 1;
    }

   
}
?>