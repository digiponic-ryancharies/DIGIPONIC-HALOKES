<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
        $this->load->model("M_siswa");
        $this->load->library("Curl");
    }

    function baru() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status'],
                "usernama" => $session['session_nama']
            ];

            if($session['session_role'] == "superadmin") {
                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $this->load->view("kesiswaan/siswa_baru", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];

                if(strpos($session['session_status'], '2')) {
                    $this->load->view("kesiswaan/siswa_baru", $data);
                }
            }
        }
    }

    function aktif() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status'],
                "usernama" => $session['session_nama']
            ];

            if($session['session_role'] == "superadmin") {
                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $url = site_url().'/api/siswa/aktif/all';
                $res = $this->curl->get($url);

                $data['siswa'] = ($res->status == true ? $res->siswa : []);

                $this->load->view("kesiswaan/siswa_aktif", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];

                if(strpos($session['session_status'], '2')) {
                    $url = site_url().'/api/siswa/aktif/all';
                    $res = $this->curl->get($url);

                    $data['siswa'] = ($res->status == true ? $res->siswa : []);

                    $this->load->view("kesiswaan/siswa_aktif", $data);
                }
            }
        }
    }

    function mutasi() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status'],
                "usernama" => $session['session_nama']
            ];

            if($session['session_role'] == "superadmin") {
                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $this->load->view("kesiswaan/siswa_mutasi", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];

                if(strpos($session['session_status'], '2')) {
                    $this->load->view("kesiswaan/siswa_mutasi", $data);
                }
            }
        }
    }

    function tambah_siswa_aktif() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status'],
                "usernama" => $session['session_nama']
            ];

            if($session['session_role'] == "guru" || $session['session_role'] == "superadmin") {
                if(strpos($session['session_status'], '2')) {
                    $data = [
                        'tapel' => $this->input->post('tahun'),
                        'nama' => $this->input->post('nama'),
                        'nisn' => $this->input->post('nisn'),
                        'nis' => $this->input->post('nis'),
                        'tempat_lhr' => $this->input->post('tempat'),
                        'tanggal_lhr' => $this->input->post('tanggal'),
                        'jk' => $this->input->post('jk'),
                        'alamat' => $this->input->post('alamat'),
                        'nohp' => $this->input->post('nohp'),
                        'email' => $this->input->post('email'),
                        'agama' => $this->input->post('agama')
                    ];

                    $url = site_url().'/api/siswa/tambah/aktif';
                    $res = $this->curl->post($url,$data);

                    $this->session->set_flashdata('do', "tambah_siswa");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', $res->message);
                    redirect('siswa/aktif');
                }
            }
        }
    }
}