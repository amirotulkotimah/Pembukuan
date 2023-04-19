<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Home_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        //$this->load->model('');
        //untuk mengakses file model 'Mahasiswa_model'
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('home_c');

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/home');
        $this->load->view('template/footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }
}
?>