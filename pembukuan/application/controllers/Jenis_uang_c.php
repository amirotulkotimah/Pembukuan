<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Jenis_uang_c extends CI_Controller{ 
    function __construct(){
        parent:: __construct();
        $this->load->model('Jenis_uang_m');
        $this->load->library('pagination');
    }
    
    public function index(){ 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('jenis_uang_c/index');
        $config['total_rows'] = $this->db->count_all('tb_jenis_uang'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  
        $data['data'] = $this->Jenis_uang_m->get_jenis_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Role_kategori_m');
        $this->load->model('Data_usaha_m');

        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Jenis_uang_m->getAll()->result();
        $data['role'] = $this->Role_kategori_m->getAll()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/jenis_uang', $data);
        $this->load->view('template/footer');
    }

    public function input() { 
        $id_kategori_jenis = $this->input->post('id_kategori');
        $jenis_uang = $this->input->post('jenis_uang');
        
        $data = array( 
            'id_kategori_jenis' => $id_kategori_jenis,
            'jenis_uang' => $jenis_uang,
            
        );
        $this->Jenis_uang_m->input_data($data, 'tb_jenis_uang'); 
        //helper_log("tambah", "Tambah data kategori");
        redirect('jenis_uang_c');
    }

    public function edit() {
        $id_jenis_uang = $this->input->post('id_jenis_uang');
        $jenis_uang = $this->input->post('jenis_uang');
        $id_kategori_jenis = $this->input->post('id_kategori');
       
        $data = array( 
            'jenis_uang' => $jenis_uang,
            'id_kategori_jenis' => $id_kategori_jenis
        );

        $where = array(
            'id_jenis_uang' => $id_jenis_uang
        );
        $this->Jenis_uang_m->update_data($where,$data, 'tb_jenis_uang');
        //helper_log("edit", "Edit data kategori id : $id_kategori");
        redirect('jenis_uang_c');
    }

   public function hapus_data($id_jenis_uang) {
        $id_jenis_uang = $this->input->post('id_jenis_uang');
        $where = array('id_jenis_uang' => $id_jenis_uang);
        $this->Jenis_uang_m->hapus_data($where, 'tb_jenis_uang');
        //helper_log("hapus", "Hapus data kategori id : $id_kategori");
        redirect('jenis_uang_c');
    }

    public function delete(){      

    $id_jenis_uang = $_POST['id_jenis_uang']; 
    $this->Jenis_uang_m->delete($id_jenis_uang);    
    redirect('jenis_uang_c');    
    }
}
?>