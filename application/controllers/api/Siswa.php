<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Siswa extends REST_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_app");
        $this->load->model("M_siswa");
    }

    function aktif_all_get() {
        $proc = $this->M_siswa->getAllSiswaAktif();

    	if($proc == TRUE) {
    		$this->response([
                'siswa' => $proc,
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

    // Status Siswa
    // 0 = Siswa Baru
    // 1 = Siswa Aktif
    // 2 = Siswa Alumni
    // 3 = Siswa Mutasi
    function tambah_aktif_post() {
        $data = [
            "id_siswa" => "",
            "id_siswa_url" => $this->M_app->randomString(10),
            "id_tapel" => $this->M_app->generateTapel($this->post('tapel')),
            "siswa_nama" => strtoupper($this->post('nama')),
            "siswa_nisn" => $this->post('nisn'),
            "siswa_nis" => $this->post('nis'),
            "siswa_tgl_lahir" => date("Y-m-d", strtotime($this->post('tanggal_lhr'))),
            "siswa_tempat_lahir" => $this->post('tempat_lhr'),
            "siswa_jkel" => $this->post("jk"),
            "siswa_alamat" => $this->post("alamat"),
            "siswa_no_hp" => $this->post("nohp"),
            "siswa_email" => $this->post("email"),
            "siswa_agama" => $this->post("agama"),
            "siswa_status" => 1,
            "created_at" => $this->M_app->datetimeNow(),
            "status" => 1
        ];

        $proc = $this->M_siswa->tambahSiswa($data);
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

    function baru_all_get() {
        $proc = $this->M_siswa->getAllSiswaBaru();

        if($proc == TRUE) {
            $result = [];
            foreach ($proc as $r){
                $r['rerata_un'] = (int)($r['un_indo']+$r['un_mat']+$r['un_ing'])/3;
                $r['jumlah_un'] = (int)($r['un_indo']+$r['un_mat']+$r['un_ing'])/10;
                $result[] = $r;
            }
            $this->response([
                'data' => $result,
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

    function baru_post() {
        $param = json_decode(file_get_contents('php://input'), true);
        $now = $this->M_app->datetimeNow();

        $dataDiri = [
            "id_siswa" => "",
            "id_siswa_url" => $this->M_app->randomString(10),
            "siswa_nama" => strtoupper($param['dataDiri']['nama_lengkap']),
            "siswa_nisn" => $param['dataDiri']['nisn'],
            "siswa_tgl_lahir" => $param['dataDiri']['tgl_lahir'],
            "siswa_tempat_lahir" => $param['dataDiri']['tempat_lahir'],
            "siswa_jkel" => $param['dataDiri']['jkel'],
            "siswa_agama" => $param['dataDiri']['agama'],
            "siswa_alamat" => $param['dataDiri']['alamat'],
            "siswa_no_hp" => $param['dataDiri']['no_hp'],
            "siswa_email" => $param['dataDiri']['email'],
            "siswa_status" => 0,
            "created_at" => $now,
            "status" => 0
        ];
        $proc = $this->M_siswa->tambahSiswaMaster($dataDiri);
        if($proc != FALSE) {
            $dataOrtu = [
                "id_siswa_ortu" => "",
                "id_siswa_ortu_url" => $this->M_app->randomString(10),
                "id_siswa" => $proc,
                "nama_ayah" => $param['dataOrtu']['nama_ayah'],
                "no_hp_ayah" => $param['dataOrtu']['nohp_ayah'],
                "nama_ibu" => $param['dataOrtu']['nama_ibu'],
                "no_hp_ibu" => $param['dataOrtu']['nohp_ibu'],
                "nama_wali" => $param['dataOrtu']['nama_wali'],
                "no_hp_wali" => $param['dataOrtu']['nohp_wali'],
                "created_at" => $now
            ];

            $dataNilai = [
                "id_siswa_baru" => "",
                "id_siswa_baru_url" => $this->M_app->randomString(10),
                "id_siswa" => $proc,
                "sb_asal_sekolah" => $param['dataNilai']['asal_sekolah'],
                "sb_un_indo" => $param['dataNilai']['nilai_bind'],
                "sb_un_mat" => $param['dataNilai']['nilai_mat'],
                "sb_un_ing" => $param['dataNilai']['nilai_bing'],
                "sb_ijazah" => $param['dataNilai']['ijazah'],
                "sb_skhun" => $param['dataNilai']['skhun'],
                "status" => 0,
                "created_at" => $now
            ];

            $this->M_siswa->tambahOrtuSiswa($dataOrtu);
            $proc2 = $this->M_siswa->tambahSiswaBaru($dataNilai);
            if ($proc2 == TRUE){
                $this->response([
                    'message' => "<strong>Berhasil</strong>, data siswa baru berhasil ditambahkan",
                    'status' => TRUE
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'message' => "<strong>Gagal</strong>, terjadi kesalahan pada tambah data",
                    'status' => FALSE
                ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            $this->response([
                'message' => "<strong>Gagal</strong>, terjadi kesalahan pada tambah data",
                'status' => FALSE
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}