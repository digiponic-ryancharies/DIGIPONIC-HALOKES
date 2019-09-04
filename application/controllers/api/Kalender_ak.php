<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kalender_ak extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_kalender");
    }

     function all_get() {
        $ids = $this->M_app->getSemesterActive();
        $kalender = $this->M_kalender->getKalenderAll($ids);

        $kalender = ($kalender->num_rows() != 0 ? $kalender->result_array() : []);

    	$this->response([
            'data' => $kalender,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

    function detail_get($kalN){
    	$kalender = $this->M_kalender->getKalenderDetail($kalN);

        $kalender = ($kalender->num_rows() != 0 ? $kalender->result_array() : []);

    	$this->response([
            'data' => $kalender,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

    function tambah_post() {
        $data = [
            "id_semester" => "",
            "kalender_nama" => $this->post("kalender_nama");
        ];

        $proc = $this->M_kalender->tambahKalender($data);
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