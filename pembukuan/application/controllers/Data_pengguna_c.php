<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Data_pengguna_c extends CI_Controller{ 
	function __construct(){
		parent:: __construct();
		$this->load->model('Data_pengguna_m');
		$this->load->library('pagination', 'session');
	}
	
	public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $getUser = $this->session->userdata('session_user');
        if (!isset($getUser) || empty ($getUser)) {
            redirect ('login_c');
            // code...
        }
		$config['base_url'] = site_url('data_pengguna_c/index');
        $config['total_rows'] = $this->db->count_all('tb_data_pengguna'); //total row
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
        $data['data'] = $this->Data_pengguna_m->get_pengguna_list($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
		$data['user'] = $this->Data_pengguna_m->getAll()->result();

		$this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/data_pengguna', $data);
        $this->load->view('template/footer');
		
	}

	public function input(){
        $this->load->library('upload');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //$nmfile = "file_".time(); //nama file + fungsi time
        $nmfile = time().'-'.$_FILES["filefoto"]['name'];
        $config['upload_path'] = './assets/upload/foto_pengguna'; //Folder untuk menyimpan hasil upload
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '0'; //maksimum besar file 3M
        $config['max_width']  = '0'; //lebar maksimum 5000 px
        $config['max_height']  = '0'; //tinggi maksimu 5000 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'foto' =>$gbr['file_name'],
                  'nama' =>$this->input->post('nama'),
                  'hp' =>$this->input->post('hp'),
                  'email' =>$this->input->post('email'),
                  'role' =>$this->input->post('role'),
                  'username' =>$this->input->post('username'),
                  'password' =>$this->input->post('password')
                  
                );

                $this->Data_pengguna_m->input_data($data, 'tb_data_pengguna'); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/foto_pengguna'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){   
                }
                    redirect('data_pengguna_c'); //jika berhasil maka akan ditampilkan view upload
                }else{
                    redirect('data_pengguna_c'); //jika gagal maka akan ditampilkan form upload
                }
            }else{

                $data = [
                      'nama' =>$nama,
                      'hp' =>$hp,
                      'email' =>$email,
                      'role' =>$role,
                      'username' =>$username,
                      'password' =>$password, 
                ];

                $input = $this->Data_pengguna_m->input_data($data, 'tb_data_pengguna');
                if ($input) {
                    redirect('data_pengguna_c');
                } else {
                    redirect('data_pengguna_c');
                }        
            }  
        }

    public function edit(){
        $this->load->library('upload');
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    	// tampung data gambar dari id
        $idFile = $this->Data_pengguna_m->get_id($id_user)->row();
        $data = './assets/upload/foto_pengguna/'. $idFile->foto;

        if(is_readable($data)){
            $nmfile = time().'-'.$_FILES["filefoto"]['name'];
            $config['upload_path'] = './assets/upload/foto_pengguna'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '0'; //maksimum besar file 3M
            $config['max_width']  = '0'; //lebar maksimum 5000 px
            $config['max_height']  = '0'; //tinggi maksimu 5000 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya

            $this->upload->initialize($config);

            if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'foto' =>$gbr['file_name'],
                  'nama' =>$this->input->post('nama'),
                  'hp' =>$this->input->post('hp'),
                  'email' =>$this->input->post('email'),
                  'role' =>$this->input->post('role'),
                  'username' =>$this->input->post('username'),
                  'password' =>$this->input->post('password')
                  
                );
                unlink('./assets/upload/foto_pengguna/'.$this->input->post('fotolama',true));

                //$this->stok_m->update_data($kode_barang, $data); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/foto_pengguna'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 


                $update = $this->Data_pengguna_m->update_data($id_user,$data);
                if ($update) {
                    $this->session->set_flashdata('pesan','Data berhasil di update');

                    redirect('data_pengguna_c');
                } else {
                    echo "gagal";
                }        
            }
        }else{

                $data = [
                  'nama' =>$this->input->post('nama'),
                  'hp' =>$this->input->post('hp'),
                  'email' =>$this->input->post('email'),
                  'role' =>$this->input->post('role'),
                  'username' =>$this->input->post('username'),
                  'password' =>$this->input->post('password')
                ];

                // update file di database
                $update = $this->Data_pengguna_m->update_data($id_user,$data);
                if ($update) {
                    $this->session->set_flashdata('pesan','Data berhasil di update');
                    
                    redirect('data_pengguna_c');
                } else {
                    echo "gagal";
                }        
            }    
        }else{
            echo "gagal";
        }

    }

	public function hapus_data($id_user) { 
        $id_user = $this->input->post('id_user');
        $where = array('id_user' => $id_user); 
        $idFile = $this->Data_pengguna_m->get_id($id_user)->row();
        $data = './assets/upload/foto_pengguna/'. $idFile->foto;
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
        if(is_readable($data) && unlink($data)){
        }$del = $this->Data_pengguna_m->delete($id_user);
         if ($del) {
            redirect('data_pengguna_c');
        } else {
            redirect('data_pengguna_c');
        } 
    }

    public function delete(){        
        $id_user = $_POST['id_user'];

         foreach ($id_user as $us)
         {
            $idFile = $this->Data_pengguna_m->get_id($us)->row();
            //print_r($idFile);
            $data = './assets/upload/foto_pengguna/'. $idFile->foto;
            if(file_exists($data)){
                if(is_readable($data) && unlink($data)){
                  
                }
            }
            
         }  
         $del = $this->Data_pengguna_m->delete($id_user);
         if ($del) {
            redirect('data_pengguna_c');
        } else {
            redirect('data_pengguna_c');
        }    
    }

}
?>