<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
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

            if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '1')) {
                    // API Execute
                    $url = site_url().'/api/ekskul/all';
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    $res = json_decode($response);

                    if($res->status == true) {
                        $data['ekskul'] = $res->data;
                    } else {
                        $data['ekskul'] = [];
                    }

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
    	$this->load->view("template/kurikulum_header");
    	$this->load->view("kurikulum/ekskul_detail");
		$this->load->view("template/kurikulum_footer");
    }

    function tambah_ekskul() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '1')) {
                    $data = [
                        'nama' => $this->input->post('nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'jadwal' => implode(', ',$this->input->post('jadwal'))
                    ];

                    $url = site_url().'/api/ekskul/tambah';

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);

                    curl_close($ch);

                    $res = json_decode($response);

                    $this->session->set_flashdata('do', "tambah_ekskul");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', $res->message);
                    redirect("ekstrakurikuler");
                }
            } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }
}