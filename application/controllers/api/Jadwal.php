<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Jadwal extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_jadwal");
    }

    function all_get() {
        $ids = $this->M_app->getSemesterActive();
        $jadwal = $this->M_jadwal->getAllJadwal($ids);

    	if($jadwal == TRUE) {
    		$this->response([
                'data' => $jadwal,
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

    function aturjadwal_post($id) {
        $data = [
            "jadwal_hari" => $this->post("hari"),
            "jadwal_jampel" => $this->post("jam_awal")." - ".$this->post("jam_akhir"),
            "modified_at" => $this->M_app->datetimeNow()
        ];

        $proc = $this->M_jadwal->aturJadwalMapel($data,$id);
        if ($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, pengaturan jadwal pelajaran berhasil dilakukan",
                'status'  => TRUE
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'message' => "<strong>Gagal</strong>, terjadi kesalahan pada pengaturan jadwal pelajaran",
                'status'  => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}