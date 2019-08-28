<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library("Curl");
        $this->load->model("M_session");
        $this->load->model("M_aktivitas");
    }

    function grup_kurikulum() {
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

                $url = site_url().'/api/kurikulum/grupkur';
                $res = $this->curl->get($url);

                $data['grupkur'] = ($res->status == true ? $res->data : []);

                $this->load->view("kurikulum/kurikulum_grup", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];

                if(strpos($session['session_status'], '1')) {
                    $url = site_url().'/api/kurikulum/grupkur';
                    $res = $this->curl->get($url);

                    $data['grupkur'] = ($res->status == true ? $res->data : []);

                    $this->load->view("kurikulum/kurikulum_grup", $data);
                }
            } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }

    function grup_mapel() {
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

                $url = site_url().'/api/kurikulum/grupmapel';
                $res = $this->curl->get($url);

                if($res->status == true) {
                    $data['grupmapel'] = $res->grupmapel;
                    $data['grupkur'] = $res->grupkur;
                } else {
                    $data['grupmapel'] = [];
                    $data['grupkur'] = [];
                }

                $this->load->view("kurikulum/kurikulum_grupmapel", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];

                if(strpos($session['session_status'], '1')) {
                    $url = site_url().'/api/kurikulum/grupmapel';
                    $res = $this->curl->get($url);

                    if($res->status == true) {
                        $data['grupmapel'] = $res->grupmapel;
                        $data['grupkur'] = $res->grupkur;
                    } else {
                        $data['grupmapel'] = [];
                        $data['grupkur'] = [];
                    }

                    $this->load->view("kurikulum/kurikulum_grupmapel", $data);
                }
            }
        }
    }

    function tambah_gkurikulum() {
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
                if(strpos($session['session_status'], '1')) {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                    ];

                    $url = site_url().'/api/kurikulum/tambah_kur';
                    $res = $this->curl->get($url,$data);

                    if($res->status == TRUE) {
                        $role = $session['session_role'];
                        $uid = $session['session_userid'];
                        $act = "insert";
                        $desc = "<b>data grup kurikulum</b>";
                        $this->M_aktivitas->tambahAktivitasUser($role,$uid,$act,$desc);
                    }

                    $this->session->set_flashdata('do', "tambah_grupkur");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', (isset($res->message) ? $res->message : $res->error));
                    redirect('kurikulum/grup_kurikulum');
                }
            }
        }
    }

    function tambah_gmapel() {
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
                if(strpos($session['session_status'], '1')) {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'kurikulum' => $this->input->post('kurikulum')
                    ];

                    $url = site_url().'/api/kurikulum/tambah_mapel';
                    $res = $this->curl->post($url,$data);

                    if($res->status == TRUE) {
                        $role = $session['session_role'];
                        $uid = $session['session_userid'];
                        $act = "insert";
                        $desc = "<b>data grup mapel</b>";
                        $this->M_aktivitas->tambahAktivitasUser($role,$uid,$act,$desc);
                    }

                    $this->session->set_flashdata('do', "tambah_grupmapel");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', (isset($res->message) ? $res->message : $res->error));
                    redirect('kurikulum/grup_mapel');
                }
            }
        }
    }
}