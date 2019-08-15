<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Ekskul extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_ekskul");
        $this->load->model("M_siswa");
    }

    function all_get() {
        $proc = $this->M_ekskul->getAllEkskul();
        $siswa = $this->M_siswa->getSiswaKelas();

    	if($proc == TRUE) {
    		$this->response([
                'data' => $proc,
                'siswa' => $siswa,
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

    function tambah_post() {
        $data = [
            "id_ekskul" => "",
            "id_ekskul_url" => $this->M_app->randomString(10),
            "ekskul_nama" => $this->post('nama'),
            "ekskul_deskripsi" => $this->post('deskripsi'),
            "ekskul_jadwal" => $this->post('jadwal'),
            "created_at" => $this->M_app->datetimeNow(),
            "status" => 1
        ];

        $proc = $this->M_ekskul->tambahEkskul($data);
        if($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, tambah data ekstrakurikuler berhasil dilakukan",
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