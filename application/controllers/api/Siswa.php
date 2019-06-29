<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Siswa extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_siswa");
    }

    function aktif_all_get() {
        $proc = $this->M_siswa->getAllSiswaAktif();

    	if($proc == TRUE) {
    		$this->response([
                'siswa' => $proc,
                'message' => "Proses berhasil",
                'status' => TRUE
            ], REST_Controller::HTTP_OK);
    	} else {
    		$this->response([
                'message' => "Proses gagal",
    			'status' => FALSE
        	], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
    	}
    }

    // Status Siswa
    // 0 = Siswa Baru
    // 1 = Siswa Aktif
    // 2 = Siswa Alumni
    // 3 = Siswa Mutasi
    function tambah_aktif_post() {
        date_default_timezone_set("Asia/Jakarta");

        $data = [
            "id_siswa" => "",
            "id_siswa_url" => $this->M_app->randomString(10),
            "id_tapel" => $this->M_app->generateTapel($this->post('tapel')),
            "siswa_nama" => strtoupper($this->post('nama')),
            "siswa_nisn" => $this->post('nisn'),
            "siswa_nis" => $this->post('nis'),
            "siswa_tgl_lahir" => date("Y-m-d", strtotime($this->post('tanggal_lhr'))),
            "siswa_tempat_lahir" => $this->post('tempat_lhr'),
            "siswa_jkel" => $this->post("jk"),
            "siswa_alamat" => $this->post("alamat"),
            "siswa_no_hp" => $this->post("nohp"),
            "siswa_email" => $this->post("email"),
            "siswa_agama" => $this->post("agama"),
            "siswa_status" => 1,
            "created_at" => $this->M_app->datetimeNow(),
            "status" => 1
        ];

        $proc = $this->M_siswa->tambahSiswa($data);
        if($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, tambah data siswa berhasil dilakukan",
                'status' => TRUE
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'message' => "<strong>Gagal</strong>, terjadi kesalahan pada tambah data",
                'status' => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}