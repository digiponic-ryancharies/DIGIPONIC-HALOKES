<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Tapel extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_tapel");
    }

     function all_get() {
        $tapel = $this->M_tapel->getTapelAll(0);

        $tapel = ($tapel->num_rows() != 0 ? $tapel->result_array() : ['Empty']);

        $this->response([
            'data' => $tapel,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

   function tambah_post() {
        $data = [
            "id_tapel_url" => $this->M_app->randomString(10), 
            "tapel_nama" => $this->post("tapel_nama"),
            "tapel_tahun" => $this->post("tapel_tahun"),
            
            "tapel_aktif" => $this->post("tapel_aktif")
        ];

        $proc = $this->M_tapel->tambahTapel($data);
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