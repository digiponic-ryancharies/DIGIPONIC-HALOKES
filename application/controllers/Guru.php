<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
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

            if($session['session_role'] == "pegawai") {
                // API Execute
                $url = site_url().'/api/guru/all';
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                $res = json_decode($response);

                if($res->status == true) {
                    $data['guru'] = $res->data;
                } else {
                    $data['guru'] = [];
                }

                $data = [
                    "header" => $this->load->view("template/pegawai_header", $data, TRUE),
                    "footer" => $this->load->view("template/pegawai_footer", '', TRUE)
                ];

                $this->load->view("pegawai/guru", $data);
            } else {

            }
        }
    }

    function tambah_guru() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            if($session['session_role'] == "pegawai") {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'nign' => $this->input->post('nign'),
                    'nip' => $this->input->post('nip'),
                    'gd' => $this->input->post('gd'),
                    'gb' => $this->input->post('gb'),
                    'tempat' => $this->input->post('tempat'),
                    'tanggal' => $this->input->post('tanggal'),
                    'alamat' => $this->input->post('alamat'),
                    'nohp' => $this->input->post('nohp'),
                    'email' => $this->input->post('email'),
                    'jk' => $this->input->post('jk'),
                    'agama' => $this->input->post('agama'),
                    'username' => $this->input->post('username')
                ];

                $url = site_url().'/api/guru/tambah';

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);

                curl_close($ch);

                $res = json_decode($response);

                $this->session->set_flashdata('do', "tambah_guru");
                $this->session->set_flashdata('status', $res->status);
                $this->session->set_flashdata('msg', $res->message);
                redirect("guru");
            }
        }
    }

    function pengajar() {
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
                    $data = [
                        "header" => $this->load->view("template/guru_header", $data, TRUE),
                        "footer" => $this->load->view("template/guru_footer", '', TRUE)
                    ];

                    $this->load->view("kurikulum/guru_pengajar", $data);
                }
            } else {
                
            }
        }
    }

    function silabus() {}

    function promes() {}
}