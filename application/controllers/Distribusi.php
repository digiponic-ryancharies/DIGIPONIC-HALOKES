<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library("Curl");
        $this->load->model("M_session");
        $this->load->model("M_mapel");
        $this->load->model("M_kelas");
        $this->load->model("M_guru");
    }

    function wali_kelas() {
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

                // API Execute
                $url = site_url().'/api/dist/wali_kelas';
                $res = $this->curl->get($url);

                if($res->status == true) {
                    $data['kelas'] = $res->kelas;
                    $data['guru'] = $res->guru;
                    $data['wali_kelas'] = $res->wali_kelas;
                } else {
                    $data['kelas'] = [];
                    $data['guru'] = [];
                    $data['wali_kelas'] = [];
                }

                $this->load->view("kurikulum/dist_walikelas", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];
                    
                if(strpos($session['session_status'], '1')) {
                    // API Execute
                    $url = site_url().'/api/dist/wali_kelas';
                    $res = $this->curl->get($url);

                    $res = json_decode($response);

                    if($res->status == true) {
                        $data['kelas'] = $res->kelas;
                        $data['guru'] = $res->guru;
                        $data['wali_kelas'] = $res->wali_kelas;
                    } else {
                        $data['kelas'] = [];
                        $data['guru'] = [];
                        $data['wali_kelas'] = [];
                    }

                    $this->load->view("kurikulum/dist_walikelas", $data);
                }
            }
        }
    }

    function guru_pengajar() {
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

                // API Execute
                $url = site_url().'/api/dist/guru_ajar';
                $res = $this->curl->get($url);

                if($res->status == true) {
                    $data['kelas'] = $res->kelas;
                    $data['guru'] = $res->guru;
                    $data['mapel'] = $res->mapel;
                    $data['id_semester'] = $res->id_semester;
                } else {
                    $data['kelas'] = [];
                    $data['guru'] = [];
                    $data['mapel'] = [];
                    $data['id_semester'] = "";
                }

                $this->load->view("kurikulum/dist_guruajar", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];
                    
                if(strpos($session['session_status'], '1')) {
                    // API Execute
                    $url = site_url().'/api/dist/guru_ajar';
                    $res = $this->curl->get($url);

                    $res = json_decode($response);

                    if($res->status == true) {
                        $data['kelas'] = $res->kelas;
                        $data['guru'] = $res->guru;
                        $data['mapel'] = $res->mapel;
                        $data['id_semester'] = $res->id_semester;
                    } else {
                        $data['kelas'] = [];
                        $data['guru'] = [];
                        $data['mapel'] = [];
                        $data['id_semester'] = "";
                    }

                    $this->load->view("kurikulum/dist_guruajar", $data);
                }
            }
        }
    }

    function pembina_ekskul() {
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

                $this->load->view("kurikulum/dist_pembina_ekskul", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];
                    
                if(strpos($session['session_status'], '1')) {
                    $this->load->view("kurikulum/dist_pembina_ekskul", $data);
                }
            }
        }
    }

    function anggota_ekskul() {
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

                $this->load->view("kurikulum/dist_anggota_ekskul", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];
                    
                if(strpos($session['session_status'], '1')) {
                    $this->load->view("kurikulum/dist_anggota_ekskul", $data);
                }
            }
        }
    }

    function atur_wali_kelas() {
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
                        "kelas" => $this->input->post("kelas"),
                        "guru" => $this->input->post("guru")
                    ];

                    $url = site_url().'/api/dist/atur_wakel';
                    $res = $this->curl->post($url,$data);

                    $this->session->set_flashdata('do', "atur_wakel");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', $res->message);
                    redirect("distribusi/wali_kelas");
                }
            }
        }
    }

    function atur_guru_pengajar() {
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
                        "id_semester" => $this->input->post("id_semester"),
                        "mapel" => $this->input->post("mapel"),
                        "kelas" => $this->input->post("kelas"),
                        "guru" => $this->input->post("guru")
                    ];

                    $url = site_url().'/api/dist/atur_guruajar';
                    $res = $this->curl->post($url,$data);

                    $this->session->set_flashdata('do', "atur_guruajar");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', (isset($res->message) ? $res->message : $res->error));
                    redirect("distribusi/guru_pengajar");
                }
            }
        }
    }
}