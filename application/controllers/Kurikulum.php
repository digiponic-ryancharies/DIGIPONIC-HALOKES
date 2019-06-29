<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
    }

    function grup_kurikulum() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status']
            ];

            if($session['session_status'] == "guru") {
                $url = site_url().'/api/kurikulum/grupkur';
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                $res = json_decode($response);

                if($res->status == true) {
                    $data['grupkur'] = $res->data;
                } else {
                    $data['grupkur'] = [];
                }

                $this->load->view("template/kurikulum_header", $data);
                $this->load->view("kurikulum/kurikulum_grup", $data);
                $this->load->view("template/kurikulum_footer");
            } else if($session['session_status'] == "siswa") {

            } else if($session['session_status'] == "ortu") {

            }
        }
    }

    function grup_mapel() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status']
            ];

            if($session['session_status'] == "guru") {
                $url = site_url().'/api/kurikulum/grupmapel';
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                $res = json_decode($response);

                if($res->status == true) {
                    $data['grupmapel'] = $res->grupmapel;
                    $data['grupkur'] = $res->grupkur;
                } else {
                    $data['grupmapel'] = [];
                    $data['grupkur'] = [];
                }

                $this->load->view("template/kurikulum_header", $data);
                $this->load->view("kurikulum/kurikulum_grupmapel", $data);
                $this->load->view("template/kurikulum_footer");
            } else if($session['session_status'] == "siswa") {

            } else if($session['session_status'] == "ortu") {

            }
        }
    }

    function tambah_gkurikulum() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status']
            ];

            if($session['session_status'] == "guru") {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                ];

                $url = site_url().'/api/kurikulum/tambah_kur';

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);

                curl_close($ch);

                $res = json_decode($response);

                $this->session->set_flashdata('do', "tambah_grupkur");
                $this->session->set_flashdata('status', $res->status);
                $this->session->set_flashdata('msg', $res->message);
                redirect('kurikulum/grup_kurikulum');
            } else if($session['session_status'] == "siswa") {

            } else if($session['session_status'] == "ortu") {

            }
        }
    }

    function tambah_gmapel() {
        $session = $this->M_session->get_session();
        if (!$session['session_userid'] && !$session['session_status']) {
            /*$data['message'] = "<p>The page you requested was not found.</p>";
            $this->load->view("errors/html/error_404", $data);*/
            redirect("login");
        } else {
            $data = [
                "userid" => $session['session_userid'],
                "userstts" => $session['session_status']
            ];

            if($session['session_status'] == "guru") {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'kurikulum' => $this->input->post('kurikulum')
                ];

                $url = site_url().'/api/kurikulum/tambah_mapel';

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);

                curl_close($ch);

                $res = json_decode($response);

                $this->session->set_flashdata('do', "tambah_grupmapel");
                $this->session->set_flashdata('status', $res->status);
                $this->session->set_flashdata('msg', $res->message);
                redirect('kurikulum/grup_mapel');
            } else if($session['session_status'] == "siswa") {

            } else if($session['session_status'] == "ortu") {

            }
        }
    }
}