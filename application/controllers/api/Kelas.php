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
        $this->load->model("M_siswa");
    }

    function all_get()
    {
        $ids = $this->M_app->getSemesterActive();
        $proc = $this->M_kelas->getAll($ids);

        if ($proc == TRUE) {
            $this->response([
                "id_semester" => $ids,
                'data'        => $proc,
                'message'     => "Proses berhasil",
                'status'      => TRUE
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
            "id_kelas"      => $this->M_app->getLatestid('id_kelas', 'tbl_kelas'),
            "id_kelas_url"  => $this->M_app->randomString(20),
            "id_semester"   => $this->M_app->generateSemester($this->post('id_semester')),
            "kelas_tingkat" => $this->post('tingkat'),
            "kelas_abjad"   => $this->post('abjad'),
            "kelas_ruang"   => $this->post('ruang'),
            "created_at"    => $this->M_app->datetimeNow(),
            "status"        => 1
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

    function kelasSiswa_get()
    {
        $kelas = $this->M_kelas->getDaftarKelas();
        $siswa = $this->M_siswa->getSiswaKelas();
        if ($kelas == TRUE) {
            $this->response([
                'kelas'   => $kelas,
                'siswa' => $siswa,
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

    function aturKelasSiswa_post()
    {
        $param = json_decode(file_get_contents('php://input'), true);
        $id_kelas = $this->M_kelas->getKelasIDFromURL($param['kelas']);

        $dataSiswa = [];
        foreach ($param['siswa'] as $row) {
            $siswa = [
                "id_kelas_detail"     => "",
                "id_kelas_detail_url" => $this->M_app->randomString(10),
                "id_kelas"            => $id_kelas,
                "id_siswa"            => $this->M_siswa->getSiswaIDFromURL($row['id_siswa']),
                "created_at"          => $this->M_app->datetimeNow()
            ];

            $dataSiswa[] = $siswa;
        }

        $proc = $this->M_kelas->aturKelasSiswa($dataSiswa);
        if ($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, siswa berhasil diatur",
                'status'  => TRUE
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'message' => "<strong>Gagal</strong>, siswa tidak mau diatur",
                'status'  => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}