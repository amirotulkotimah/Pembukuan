<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Profile_c extends CI_Controller{ //membuat controller Mahasiswa
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
        
        $config['base_url'] = site_url('profile_c');

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->db->get_where('tb_data_pengguna',['email'=>$this->session->userdata('session_email')])->row_array();
        $data['userid'] = $this->db->get_where('tb_data_pengguna',['id_user'=>$this->session->userdata('session_id_user')])->row_array();


        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/profile', $data);
        $this->load->view('template/footer');
            //untuk mengakses file views 'crud/home_mahasiswa' pada halaman template
    }

    public function edit(){
        $this->load->library('upload');
        $this->load->model('Data_pengguna_m');

        $id_user = $this->input->post('id_user');
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

                    redirect('profile_c');
                } else {
                    echo "gagal";
                }        
            }
        }else{

                $data = [
                  'password' =>$this->input->post('password')
                ];

                // update file di database
                $update = $this->Data_pengguna_m->update_data($id_user,$data);
                if ($update) {
                    $this->session->set_flashdata('pesan','Data berhasil di update');
                    
                    redirect('profile_c');
                } else {
                    echo "gagal";
                }        
            }    
        }else{
            echo "gagal";
        }

    }

}
?>