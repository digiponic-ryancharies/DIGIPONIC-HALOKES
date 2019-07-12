<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kurikulum extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_kurikulum");
    }

    function grupkur_get() {
        $proc = $this->M_kurikulum->getAllGrupKurikulum();

        if($proc == TRUE) {
            $this->response([
                'data' => $proc,
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

    function grupmapel_get() {
        $gmapel = $this->M_kurikulum->getAllGrupMapel();
        $gkur = $this->M_kurikulum->getAllGrupKurikulum();

        if($gmapel == TRUE) {
            $this->response([
                'grupmapel' => $gmapel,
                'grupkur' => $gkur,
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

    function tambah_kur_post() {
        $data = [
            "id_mapel_kurikulum" => "",
            "id_mapel_kurikulum_url" => $this->M_app->randomString(5),
            "kurikulum_nama" => $this->post('nama'),
            "kurikulum_deskripsi" => $this->post('deskripsi'),
            "created_at" => $this->M_app->datetimeNow(),
            "status" => 1
        ];

        $proc = $this->M_kurikulum->tambahGrupKurikulum($data);
        if($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, tambah data grup kurikulum berhasil dilakukan",
                'status' => TRUE
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'message' => "<strong>Gagal</strong>, terjadi kesalahan pada tambah data",
                'status' => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    function tambah_mapel_post() {
        $data = [
            "id_mapel_grup" => "",
            "id_mapel_grup_url" => $this->M_app->randomString(5),
            "id_mapel_kurikulum" => $this->M_kurikulum->getIDGrupKurikulum($this->post('kurikulum')),
            "mapel_grup_nama" => $this->post('nama'),
            "mapel_grup_deskripsi" => $this->post('deskripsi'),
            "created_at" => $this->M_app->datetimeNow(),
            "status" => 1
        ];

        $proc = $this->M_kurikulum->tambahGrupMapel($data);
        if($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, tambah data grup mata pelajaran berhasil dilakukan",
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