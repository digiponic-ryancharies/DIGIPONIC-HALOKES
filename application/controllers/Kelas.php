<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
        //$this->load->model("M_siswa");
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
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                $res = json_decode($response);

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
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    $res = json_decode($response);

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

            if($session['session_role'] == "guru" || $session['session_role'] == "sadmin") {
                if(strpos($session['session_status'], '2')) {
                    $data = [
                        'id_semester' => $this->input->post('id_semester'),
                        'tingkat' => $this->input->post('tingkat'),
                        'abjad' => strtoupper($this->input->post('abjad')),
                        'ruang' => $this->input->post('ruang')
                    ];

                    $url = site_url().'/api/kelas/tambah';

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);

                    curl_close($ch);

                    $res = json_decode($response);

                    $this->session->set_flashdata('do', "tambah_kelas");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', $res->message);
                    redirect('kelas');
                }
            }
        }
    }
}