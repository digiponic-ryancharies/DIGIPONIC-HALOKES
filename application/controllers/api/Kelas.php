<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Kelas extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_kelas");
    }

    function all_get()
    {
        $proc = $this->M_kelas->getAll();

        if ($proc == TRUE) {
            $this->response([
                'data'    => $proc,
                'message' => "Proses berhasil",
                'status'  => TRUE
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'message' => "Proses gagal",
                'status'  => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    function tambah_post()
    {
        $data = [
            "id_kelas"              => $this->M_app->getLatestid('id_kelas', 'tbl_kelas'),
            "id_kelas_url"          => $this->M_app->randomString(10),
            "id_guru"               => $this->post('id_guru'),
            "id_semester"           => $this->post('id_semester'),
            "kelas_tingkat"         => $this->post('tingkat'),
            "kelas_abjad"           => $this->post('abjad'),
            "kelas_ruang"           => $this->post('ruang'),
            "kelas_jumlah_nilai"    => $this->post('jumlah_nilai'),
            "kelas_rata_rata_nilai" => $this->post('rata_rata_nilai'),
            "created_at"            => $this->M_app->datetimeNow(),
            "status"                => 1
        ];

        $proc = $this->M_kelas->tambahKelas($data);
        if ($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, tambah data kelas berhasil dilakukan",
                'status'  => TRUE
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'message' => "<strong>Gagal</strong>, terjadi kesalahan pada tambah data",
                'status'  => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}