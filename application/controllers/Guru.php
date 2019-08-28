<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
        $this->load->model("M_aktivitas");
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
                $url = site_url().'/api/guru/all';
                $res = $this->curl->get($url);

                $data['guru'] = ($res->status == true ? $res->data : []);

                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $this->load->view("pegawai/guru", $data);
            } else if($session['session_role'] == "pegawai") {
                // API Execute
                $url = site_url().'/api/guru/all';
                $res = $this->curl->get($url);

                $data['guru'] = ($res->status == true ? $res->data : []);

                $data = [
                    "header" => $this->load->view("template/pegawai_header", $data, TRUE),
                    "footer" => $this->load->view("template/pegawai_footer", '', TRUE)
                ];

                $this->load->view("pegawai/guru", $data);
            } else {

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

            if($session['session_role'] == "superadmin") {
                // API Execute
                $url = site_url().'/api/guru/pengajar';
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                $res = json_decode($response);

                if($res->status == true) {
                    $data['pengajar'] = $res->data;
                } else {
                    $data['pengajar'] = [];
                }

                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $this->load->view("kurikulum/guru_pengajar", $data);
            } else if($session['session_role'] == "guru") {
                if(strpos($session['session_status'], '1')) {
                    // API Execute
                    $url = site_url().'/api/guru/pengajar';
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    $res = json_decode($response);

                    if($res->status == true) {
                        $data['pengajar'] = $res->data;
                    } else {
                        $data['pengajar'] = [];
                    }

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

    function tambah_guru() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_role']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            if($session['session_role'] == "pegawai" || $session['session_role'] == "superadmin") {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'nign' => (empty($this->input->post('nign')) ? NULL : $this->input->post('nign')),
                    'nip' => $this->input->post('nip'),
                    'gd' => (empty($this->input->post('gd')) ? NULL : $this->input->post('gd')),
                    'gb' => (empty($this->input->post('gb')) ? NULL : $this->input->post('gb')),
                    'tempat' => $this->input->post('tempat'),
                    'tanggal' => $this->input->post('tanggal'),
                    'alamat' => $this->input->post('alamat'),
                    'nohp' => (empty($this->input->post('nohp')) ? NULL : $this->input->post('nohp')),
                    'email' => $this->input->post('email'),
                    'jk' => $this->input->post('jk'),
                    'agama' => (empty($this->input->post('agama')) ? NULL : $this->input->post('agama')),
                    'username' => $this->input->post('username')
                ];

                $url = site_url().'/api/guru/tambah';
                $res = $this->curl->post($url,$data);

                if($res->status == TRUE) {
                    $role = $session['session_role'];
                    $uid = $session['session_userid'];
                    $act = "insert";
                    $desc = "<b>data guru</b>";
                    $this->M_aktivitas->tambahAktivitasUser($role,$uid,$act,$desc);
                }

                $this->session->set_flashdata('do', "tambah_guru");
                $this->session->set_flashdata('status', $res->status);
                $this->session->set_flashdata('msg', (isset($res->message) ? $res->message : $res->error));
                redirect("guru");
            }
        }
    }
}