<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Mapel extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_mapel");
        $this->load->model("M_kurikulum");
    }

    function all_get() {
        $mapel = $this->M_mapel->getAllMapel();
        $grupkur = $this->M_kurikulum->getAllGrupKurikulum();

        $mapel = ($mapel->num_rows() != 0 ? $mapel->result_array() : []);
        $grupkur = ($grupkur->num_rows() != 0 ? $grupkur->result_array() : []);
    	
        $this->response([
            'mapel' => $mapel,
            "grupkur" => $grupkur,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

    function tambah_post() {
        $data = [
            "id_mapel" => "",
            "id_mapel_url" => $this->M_app->randomString(20),
            "id_mapel_kurikulum" => $this->M_kurikulum->getIDGrupKurikulum($this->post('kurikulum')),
            "id_mapel_grup" => $this->M_kurikulum->getIDGrupMapel($this->post('gmapel')),
            "mapel_nama" => $this->post('nama'),
            "mapel_kkm" => $this->post('kkm'),
            "created_at" => $this->M_app->datetimeNow(),
            "status" => 1
        ];

        $proc = $this->M_mapel->tambahMapel($data);
        if($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, tambah data mata pelajaran berhasil dilakukan",
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