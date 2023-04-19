<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Kategori_c extends CI_Controller{ 
    function __construct(){
        parent:: __construct();
        $this->load->model('Kategori_m');
        $this->load->library('pagination');
    }
    
    public function index(){ 
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
        $config['base_url'] = site_url('kategori_c/index');
        $config['total_rows'] = $this->db->count_all('tb_kategori'); //total row
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
  
        $data['data'] = $this->Kategori_m->get_kategori_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
        
        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Kategori_m->getAll()->result();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/kategori', $data);
        $this->load->view('template/footer');
    }

    public function input() { 
        $kategori = $this->input->post('kategori');
        
        $data = array( 
            'kategori' => $kategori,
            
        );
        $this->Kategori_m->input_data($data, 'tb_kategori'); 
        //helper_log("tambah", "Tambah data kategori");
        redirect('kategori_c');
    }

    public function edit() {
        $id_kategori = $this->input->post('id_kategori');
        $kategori = $this->input->post('kategori');
       
        $data = array( 
            'kategori' => $kategori,
        );

        $where = array(
            'id_kategori' => $id_kategori
        );
        $this->Kategori_m->update_data($where,$data, 'tb_kategori');
        //helper_log("edit", "Edit data kategori id : $id_kategori");
        redirect('kategori_c');
    }

    public function hapus_data($id_kategori) {
        $id_kategori = $this->input->post('id_kategori');
        $where = array('id_kategori' => $id_kategori);
        $this->Kategori_m->hapus_data($where, 'tb_kategori');
        //helper_log("hapus", "Hapus data kategori id : $id_kategori");
        redirect('kategori_c');
    }

    public function delete(){      
        $id_kategori = $_POST['id_kategori']; 
        $this->Kategori_m->delete($id_kategori);     
        redirect('kategori_c');    
    }
    }
?>