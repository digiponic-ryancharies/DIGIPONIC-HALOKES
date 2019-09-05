<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Semester extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_semester");
    }

    function all_get() {
        $tapel = $this->M_tapel->getTapelAll(1);
        $semester = $this->M_semester->

        $tapel = ($tapel->num_rows() != 0 ? $tapel->result_array() : ['Empty']);
        $semester = ($semester->num_rows() != 0 ? $semester->result_array() : ['Empty']);
        $this->response([
            'tapel' => $tapel,
            'smt' => $semester,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

   function tambah_post() {
        $data = [
            "id_semester_url" => $this->M_app->randomString(20),
            "id_tapel" => $this->post("id_tapel"),
            "semester_nama" => $this->post("smt_nama"),
            "semester_aktif" => 0
        ];

        $proc = $this->M_semester->tambahSemester($data); 
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