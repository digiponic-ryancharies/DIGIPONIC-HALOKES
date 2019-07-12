<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Guru extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_guru");
    }

    function all_get() {
        $proc = $this->M_guru->getAll();

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

    function pengajar_get() {
        $ids = $this->M_app->getSemesterActive();
        $pengajar = $this->M_guru->getGuruPengajarAktif($ids);

        $pengajar = (($pengajar->num_rows() != 0) ? $pengajar->result_array() : []);

        $this->response([
            'data' => $pengajar,
            'message' => "Proses berhasil",
            'status' => TRUE
        ], REST_Controller::HTTP_OK);
    }

    function tambah_post() {
        $data = [
            "id_guru"             => $this->M_app->getLatestid('id_guru', 'tbl_master_guru'),
            "id_guru_url"         => $this->M_app->randomString(10),
            "guru_nama"           => $this->post('nama'),
            "guru_nip"            => $this->post('nip'),
            "guru_nign"           => $this->post('nign'),
            "guru_gelar_depan"    => $this->post('gd'),
            "guru_gelar_belakang" => $this->post('gb'),
            "guru_tgl_lahir"      => $this->post('tanggal'),
            "guru_tempat_lahir"   => $this->post('tempat'),
            "guru_jkel"           => $this->post('jk'),
            "guru_alamat"         => $this->post('alamat'),
            "guru_no_hp"          => $this->post('nohp'),
            "guru_email"          => $this->post('email'),
            "guru_agama"          => $this->post('agama'),
            "guru_username"       => $this->post('username'),
            "guru_password"       => sha1("password"),
            "guru_status"         => 0,
            "created_at"          => $this->M_app->datetimeNow(),
            "status"              => 1
        ];

        $proc = $this->M_guru->tambahGuru($data);
        if ($proc == TRUE) {
            $this->response([
                'message' => "<strong>Berhasil</strong>, tambah data guru berhasil dilakukan",
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