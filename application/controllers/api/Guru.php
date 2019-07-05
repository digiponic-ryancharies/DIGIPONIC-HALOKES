<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Guru extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_guru");
    }

    function all_get()
    {
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

    function tambah_post()
    {
        $data = [
            "id_guru"             => $this->M_app->getLatestid('id_guru', 'tbl_master_guru'),
            "id_guru_url"         => $this->M_app->randomString(10),
            "guru_nama"           => $this->post('nama'),
            "guru_nip"            => $this->post('nip'),
            "guru_nign"           => $this->post('nign'),
            "guru_gelar_depan"    => $this->post('gelar_depan'),
            "guru_gelar_belakang" => $this->post('gelar_belakang'),
            "guru_tgl_lahir"      => $this->post('tgl_lahir'),
            "guru_tempat_lahir"   => $this->post('tempat_lahir'),
            "guru_jkel"           => $this->post('jkel'),
            "guru_no_hp"          => $this->post('no_hp'),
            "guru_email"          => $this->post('email'),
            "guru_agama"          => $this->post('agama'),
            "guru_username"       => $this->post('username'),
            "guru_password"       => sha1($this->post('password')),
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