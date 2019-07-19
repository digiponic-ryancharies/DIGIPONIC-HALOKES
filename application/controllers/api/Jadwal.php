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

        $jadwal = ($jadwal->num_rows() != 0 ? $jadwal->result_array() : []);

    	$this->response([
            'data' => $jadwal,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

    function aturjadwal_post() {
        $data = [
            "id_mapel_jadwal_detail" => $this->M_app->getLatestid('id_mapel_jadwal_detail', 'tbl_mapel_jadwal_detail'),
            "id_mapel_jadwal_detail_url" => $this->M_app->randomString(20),
            "id_mapel_jadwal" => $this->M_jadwal->getJadwalIDFromURL($this->post("jadwal")),
            "jadwal_hari" => $this->post("hari"),
            "jadwal_jampel_awal" => $this->post("jam_awal"),
            "jadwal_jampel_akhir" => $this->post("jam_akhir"),
            "created_at" => $this->M_app->datetimeNow()
        ];

        $proc = $this->M_jadwal->aturJadwalMapel($data);
        if ($proc) {
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