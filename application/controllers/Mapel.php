<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("M_session");
        $this->load->model("M_kurikulum");
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
                $data = [
                    "header" => $this->load->view("template/sadmin_header", $data, TRUE),
                    "footer" => $this->load->view("template/sadmin_footer", '', TRUE)
                ];

                $url = site_url().'/api/mapel/all';
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);

                $res = json_decode($response);

                if($res->status == true) {
                    $data['mapel'] = $res->mapel;
                    $data['grupkur'] = $res->grupkur;
                } else {
                    $data['mapel'] = [];
                    $data['grupkur'] = [];
                }

                $this->load->view("kurikulum/mapel", $data);
            } else if($session['session_role'] == "guru") {
                $data = [
                    "header" => $this->load->view("template/guru_header", $data, TRUE),
                    "footer" => $this->load->view("template/guru_footer", '', TRUE)
                ];

                if(strpos($session['session_status'], '1')) {
                    $url = site_url().'/api/mapel/all';
                
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    $res = json_decode($response);

                    if($res->status == true) {
                        $data['mapel'] = $res->mapel;
                        $data['grupkur'] = $res->grupkur;
                    } else {
                        $data['mapel'] = [];
                        $data['grupkur'] = [];
                    }

                    $this->load->view("kurikulum/mapel", $data);
                } 
            } else if($session['session_role'] == "siswa") {

            } else if($session['session_role'] == "ortu") {

            }
        }
    }

    function tambah_mapel() {
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
                        'kurikulum' => $this->input->post('kurikulum'),
                        'gmapel' => $this->input->post('grupmapel'),
                        'nama' => $this->input->post('nama'),
                        'kkm' => $this->input->post('kkm')
                    ];

                    $url = site_url().'/api/mapel/tambah';

                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);

                    curl_close($ch);

                    $res = json_decode($response);

                    $this->session->set_flashdata('do', "tambah_mapel");
                    $this->session->set_flashdata('status', $res->status);
                    $this->session->set_flashdata('msg', $res->message);
                    redirect('mapel');
                }
            } else {

            }
        }
    }

    function get_gmapel_by_grupkur($id) {
        $res = $this->M_kurikulum->getGrupMapelByGrupKur($id);
        echo json_encode($res->result());
    }
}