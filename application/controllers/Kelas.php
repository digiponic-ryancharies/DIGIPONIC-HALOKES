<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
        $this->load->library("Curl");
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
                $url = site_url().'/api/kelas/all';
                $res = $this->curl->get($url);

                if($res->status == true) {
                    $data['kelas'] = $res->data;
                    $data['id_semester'] = $res->id_semester;
                } else {
                    $data['kelas'] = [];
                    $data['id_semester'] = "";
                }

                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $this->load->view("kesiswaan/kelas", $data);
            } else if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '2')) {
                    // API Execute
                    $url = site_url().'/api/kelas/all';
                    $res = $this->curl->get($url);
    
                    if($res->status == true) {
                        $data['kelas'] = $res->data;
                        $data['id_semester'] = $res->id_semester;
                    } else {
                        $data['kelas'] = [];
                        $data['id_semester'] = "";
                    }

                    $data = [
                        "header" => $this->load->view("template/guru_header", $data, TRUE),
                        "footer" => $this->load->view("template/guru_footer", '', TRUE)
                    ];

                    $this->load->view("kesiswaan/kelas", $data);
                }
            }
        }
    }

    function tambah_kelas() {
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
                        'id_semester' => $this->input->post('id_semester'),
                        'tingkat' => $this->input->post('tingkat'),
                        'abjad' => strtoupper($this->input->post('abjad')),
                        'ruang' => $this->input->post('ruang')
                    ];

                    $url = site_url().'/api/kelas/tambah';
                    $res = $this->curl->post($url,$data);

                    $this->session->set_flashdata('do', "tambah_kelas");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', $res->message);
                    redirect('kelas');
                }
            }
        }
    }
}