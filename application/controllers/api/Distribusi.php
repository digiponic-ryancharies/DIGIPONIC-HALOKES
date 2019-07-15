<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Distribusi extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_distribusi");
        $this->load->model("M_mapel");
        $this->load->model("M_guru");
        $this->load->model("M_kelas");
    }

    function walikelas_get() {
        $ids = $this->M_app->getSemesterActive();

        $wakel = $this->M_distribusi->getAllWaliKelasAktif($ids);
        $kelas = $this->M_kelas->getKelasTanpaWakel($ids);
        $guru = $this->M_guru->getGuruBelumWakel($ids);

        $kelas = ($kelas->num_rows() != 0 ? $kelas->result_array() : []);
        $wakel = ($wakel->num_rows() != 0 ? $wakel->result_array() : []);
        $guru = ($guru->num_rows() != 0 ? $guru->result_array() : []);

        $this->response([
            'kelas' => $kelas,
            'guru' => $guru,
            'wali_kelas' => $wakel,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

    function guruajar_get() {
        $ids = $this->M_app->getSemesterActive();

        $mapel = $this->M_mapel->getMapelAktifByKurikulum();
        $kelas = $this->M_kelas->getAll($ids);
        $guru = $this->M_guru->getAll();

        $mapel = (($mapel->num_rows() != 0) ? $mapel->result_array() : []);

        // modif data kelas
        $dataKelas = [];
        foreach($kelas as $row) {
            $data = [
                "_id" => $row['_id'],
                "nama_kelas" => $row['nama_kelas']
            ];

            array_push($dataKelas, $data);
        }

        // modif data guru
        $dataGuru = [];
        foreach($guru as $row) {
            $data = [
                "_id" => $row['_id'],
                "nama_guru" => $row['nama_guru']
            ];

            array_push($dataGuru, $data);
        }

        $this->response([
            'id_semester' => $ids,
            'mapel' => $mapel,
            'kelas' => $dataKelas,
            'guru' => $dataGuru,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

    function aturwakel_post() {
        $data = [
            "id_wali_kelas" => $this->M_app->getLatestid('id_wali_kelas', 'tbl_kelas_wali'),
            "id_wali_kelas_url" => $this->M_app->randomString(15),
            "id_kelas" => $this->M_kelas->getKelasIDFromURL($this->post('kelas')),
            "id_guru" => $this->M_guru->getGuruIDFromURL($this->post('guru')),
            "periode_awal" => $this->M_app->dateNow(),
            "status_wali" => 1,
            "created_at" => $this->M_app->datetimeNow(),
            "status" => 1
        ];

        $proc = $this->M_distribusi->tambahWakel($data);
        if($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, atur wali kelas berhasil dilakukan",
                'status' => TRUE
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'message' => "<strong>Gagal</strong>, terjadi kesalahan pada pengaturan",
                'status' => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    function aturguruajar_post() {
        $data = [
            "id_mapel_jadwal" => $this->M_app->getLatestid('id_mapel_jadwal', 'tbl_mapel_jadwal'),
            "id_mapel_jadwal_url" => $this->M_app->randomString(20),
            "id_semester" => $this->M_app->generateSemester($this->post('id_semester')),
            "id_mapel" => $this->M_mapel->getMapelIDFromURL($this->post('mapel')),
            "id_guru" => $this->M_guru->getGuruIDFromURL($this->post('guru')),
            "id_kelas" => $this->M_kelas->getKelasIDFromURL($this->post('kelas')),
            "created_at" => $this->M_app->datetimeNow(),
            "status" => 1
        ];

        $proc = $this->M_distribusi->tambahGuruAjar($data);

        if($proc == 0) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, atur guru pengajar berhasil dilakukan",
                'status' => TRUE
            ], REST_Controller::HTTP_OK);
        } else if($proc == 1) {
            $this->response([
                'message' => "<strong>Gagal</strong>, data sudah tersedia di database",
                'status' => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            $this->response([
                'message' => "<strong>Gagal</strong>, terjadi kesalahan pada pengaturan",
                'status' => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}