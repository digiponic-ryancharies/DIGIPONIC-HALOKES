<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library("Curl");
        $this->load->model("M_session");
        $this->load->model("M_aktivitas");
    }

    function index() {
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
                // API Execute
                $url = site_url().'/api/ekskul/all';
                $res = $this->curl->get($url);

                $data['ekskul'] = ($res->status == true ? $res->data : []);

                // Showing layout
                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $this->load->view("kurikulum/ekskul", $data);
            } else if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '1')) {
                    // API Execute
                    $url = site_url().'/api/ekskul/all';
                    $res = $this->curl->get($url);

                    $data['ekskul'] = ($res->status == true ? $res->data : []);

                    // Showing layout
                    $data = [
                        "header" => $this->load->view("template/guru_header", $data, TRUE),
                        "footer" => $this->load->view("template/guru_footer", '', TRUE)
                    ];

                    $this->load->view("kurikulum/ekskul", $data);
                }
            } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }

    function detail() {
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
                // API Execute
                $url = site_url().'/api/ekskul/all';
                $res = $this->curl->get($url);

                $data['ekskul'] = ($res->status == true ? $res->data : []);

                // Showing layout
                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $this->load->view("kurikulum/ekskul_detail", $data);
            } else if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '1')) {
                    // API Execute
                    $url = site_url().'/api/ekskul/all';
                    $res = $this->curl->get($url);

                    $data['ekskul'] = ($res->status == true ? $res->data : []);

                    // Showing layout
                    $data = [
                        "header" => $this->load->view("template/guru_header", $data, TRUE),
                        "footer" => $this->load->view("template/guru_footer", '', TRUE)
                    ];

                    $this->load->view("kurikulum/ekskul_detail", $data);
                }
            } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }

    function tambah_ekskul() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            if($session['session_role'] == "superadmin") {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'jadwal' => implode(', ',$this->input->post('jadwal'))
                ];

                $url = site_url().'/api/ekskul/tambah';
                $res = $this->curl->post($url,$data);

                if($res->status == TRUE) {
                    $role = $session['session_role'];
                    $uid = $session['session_userid'];
                    $act = "insert";
                    $desc = "<b>ekstakurikuler</b>";
                    $this->M_aktivitas->tambahAktivitasUser($role,$uid,$act,$desc);
                }

                $this->session->set_flashdata('do', "tambah_ekskul");
                $this->session->set_flashdata('status', $res->status);
                $this->session->set_flashdata('msg', (isset($res->message) ? $res->message : $res->error));
                redirect("ekstrakurikuler");
            } else if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '1')) {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'jadwal' => implode(', ',$this->input->post('jadwal'))
                    ];

                    $url = site_url().'/api/ekskul/tambah';
                    $res = $this->curl->post($url,$data);

                    if($res->status == TRUE) {
                        $role = $session['session_role'];
                        $uid = $session['session_userid'];
                        $act = "insert";
                        $desc = "<b>atur wali kelas</b>";
                        $this->M_aktivitas->tambahAktivitasUser($role,$uid,$act,$desc);
                    }

                    $this->session->set_flashdata('do', "tambah_ekskul");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', (isset($res->message) ? $res->message : $res->error));
                    redirect("ekstrakurikuler");
                }
            } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }
}