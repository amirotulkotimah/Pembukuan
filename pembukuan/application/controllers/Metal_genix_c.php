<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Metal_genix_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Metal_genix_m');
        $this->load->library('pagination');
        
    }
    
    public function index(){ //function untuk menampilkan halaman awal yang ditampilkan
        $config['base_url'] = site_url('metal_genix_c/index');
        //$config['total_rows'] = $this->db->count_all('tb_metal_genix'); //total row
        $config['total_rows'] = $this->db->where('MONTH(tanggal)', date('m'))->get('tb_metal_genix')->num_rows();
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
        $data['metal'] = $this->Metal_genix_m->get_metal_list($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $data['user'] = $this->Metal_genix_m->getAll()->result();
        $data['data']=$this->Metal_genix_m->get_kategori();
        $data['total_debit'] = $this->Metal_genix_m->hitung_debit();
        $data['total_kredit'] = $this->Metal_genix_m->hitung_kredit();
        $data['saldo_awal'] = $this->Metal_genix_m->saldo_awal();
        $data['saldo_akhir'] = $this->Metal_genix_m->saldo_akhir();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/metal_genix', $data);
        $this->load->view('template/footer');

    }

    public function get_subkategori(){
        $id_kategori=$this->input->post('id_kategori');
        $data=$this->Metal_genix_m->get_subkategori($id_kategori);
        echo json_encode($data);
    }

    public function input(){
        $this->load->library('upload');
        //$nmfile = "file_".time(); //nama file + fungsi time
        $nmfile = time().'-'.$_FILES["filefoto"]['name'];
        $config['upload_path'] = './assets/upload/foto_nota'; //Folder untuk menyimpan hasil upload
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
                  'kategori' =>$this->input->post('kategori'),
                  'jenis_uang' =>$this->input->post('jenis_uang'),
                  'tanggal' =>$this->input->post('tanggal'),
                  'ket' =>$this->input->post('ket'),
                  'debit' =>$this->input->post('debit'),
                  'kredit' =>$this->input->post('kredit'),
                  'catatan' =>$this->input->post('catatan')
                  
                );

                $this->Metal_genix_m->input_data($data, 'tb_metal_genix'); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/foto_nota'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 

                //pesan yang muncul jika resize error dimasukkan pada session flashdata
                if ( !$this->image_lib->resize()){
                $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
              }
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div></div>");

                redirect('metal_genix_c'); //jika berhasil maka akan ditampilkan view upload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('metal_genix_c'); //jika gagal maka akan ditampilkan form upload
            }
        }
    }

    public function edit()
    {
        $this->load->library('upload');

        $id_metal_genix = $this->input->post('id_metal_genix');
        $kategori = $this->input->post('kategori');
        $jenis_uang = $this->input->post('jenis_uang');
        $tanggal = $this->input->post('tanggal');
        $ket = $this->input->post('ket');
        $debit = $this->input->post('debit');
        $kredit = $this->input->post('kredit');
        // tampung data gambar dari id
        $idFile = $this->Metal_genix_m->get_id($id_metal_genix)->row();
        $data = './assets/upload/foto_nota/'. $idFile->foto;

        if(is_readable($data)){
            $nmfile = time().'-'.$_FILES["filefoto"]['name'];
            $config['upload_path'] = './assets/upload/foto_nota'; //Folder untuk menyimpan hasil upload
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
                  'kategori' =>$this->input->post('kategori'),
                  'jenis_uang' =>$this->input->post('jenis_uang'),
                  'tanggal' =>$this->input->post('tanggal'),
                  'ket' =>$this->input->post('ket'),
                  'debit' =>$this->input->post('debit'),
                  'kredit' =>$this->input->post('kredit'),
                  'catatan' =>$this->input->post('catatan')
                  
                );
                unlink('./assets/upload/foto_nota/'.$this->input->post('fotolama',true));

                //$this->stok_m->update_data($kode_barang, $data); //akses model untuk menyimpan ke database
                //dibawah ini merupakan code untuk resize
                $config['image_library'] = 'gd2'; 
                $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                $config['new_image'] = './assets/upload/foto_nota'; // folder tempat menyimpan hasil resize
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 400; //lebar setelah resize menjadi 100 px
                $config['height'] = 600; //lebar setelah resize menjadi 100 px
                $this->load->library('image_lib',$config); 


                $update = $this->Metal_genix_m->update_data($id_metal_genix,$data);
                if ($update) {
                    $this->session->set_flashdata('pesan','Data berhasil di update');

                    redirect('metal_genix_c');
                } else {
                    echo "gagal";
                }        
            }
        }else{

                $data = [
                  'kategori' =>$this->input->post('kategori'),
                  'jenis_uang' =>$this->input->post('jenis_uang'),
                  'tanggal' =>$this->input->post('tanggal'),
                  'ket' =>$this->input->post('ket'),
                  'debit' =>$this->input->post('debit'),
                  'kredit' =>$this->input->post('kredit'),
                  'catatan' =>$this->input->post('catatan')
                ];

        // update file di database
                $update = $this->Metal_genix_m->update_data($id_metal_genix,$data);
                if ($update) {
                    $this->session->set_flashdata('pesan','Data berhasil di update');
                    
                    redirect('metal_genix_c');
                } else {
                    echo "gagal";
                }        
            }    
        }else{
            echo "gagal";
        }

    }

    public function hapus_data($id_metal_genix) {
        $id_metal_genix = $this->input->post('id_metal_genix');
        $where = array('id_metal_genix' => $id_metal_genix); 
        $idFile = $this->Metal_genix_m->get_id($id_metal_genix)->row();
        $data = './assets/upload/foto_nota/'. $idFile->foto;
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
        if(is_readable($data) && unlink($data)){
        }
        $del = $this->Metal_genix_m->delete($id_metal_genix);
         if ($del) {
            redirect('metal_genix_c');
        } else {
            redirect('metal_genix_c');
        } 
        
        //helper_log("hapus", "Hapus stok kode barang : $kode_barang");
        //redirect('stok_c'); 
    }

    public function delete(){
        $this->load->library('session');        
        $id_metal_genix = $_POST['id_metal_genix'];

         foreach ($id_metal_genix as $us)
         {
            $idFile = $this->Metal_genix_m->get_id($us)->row();
            //print_r($idFile);
            $data = './assets/upload/foto_nota/'. $idFile->foto;
            if(file_exists($data)){
                if(is_readable($data) && unlink($data)){
                  
                }
            }
            
         }  
         $del = $this->Metal_genix_m->delete($id_metal_genix);
         if ($del) {
            redirect('metal_genix_c');
        } else {
            redirect('metal_genix_c');
        }    
    }

    public function filter(){ 
        $mulai_tanggal = $this->input->get('mulai_tanggal');
        $sampai_tanggal = $this->input->get('sampai_tanggal');
        $config['base_url'] = site_url('metal_genix_c/filter');
        //$config['total_rows'] = $this->db->where("tanggal BETWEEN '" . $mulai_tanggal . "'AND'" . $sampai_tanggal . "'")->get('tb_metal_genix')->num_rows();
        $config['total_rows'] = $this->Metal_genix_m->tampil_filter($mulai_tanggal, $sampai_tanggal);
        $config['per_page'] = 1;  //show record per halaman
        $config['uri_segment'] = 3;  // uri parameter
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
        $config['reuse_query_string'] = TRUE;
 
        $data['data']=$this->Metal_genix_m->get_kategori();
        $data = [
            'date_from'=>$this->input->get('mulai_tanggal'),
            'date_to'=>$this->input->get('sampai_tanggal'),
        ];
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['metal'] = $this->Metal_genix_m->getByDate($data['date_from'], $data['date_to'], $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $data['data']=$this->Metal_genix_m->get_kategori();
        $data['user'] = $this->Metal_genix_m->Date($data['date_from'], $data['date_to'])->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pages/filter_metal_genix', $data);
        $this->load->view('template/footer');
    }


   
}
?>