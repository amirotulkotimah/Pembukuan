<?php
 defined ('BASEPATH') OR exit ('No direct script access allowed');
class Usaha_c extends CI_Controller{ //membuat controller Mahasiswa
    function __construct(){
        parent:: __construct();
        $this->load->model('Usaha_m');
        $this->load->library('pagination');
        
    }
    
    public function index(){ 

    }

    public function data_usaha($id_nama_usaha){ //function untuk menampilkan halaman awal yang ditampilkan
        $config['base_url'] = site_url('usaha_c/data_usaha/'.$id_nama_usaha);
        //$config['total_rows'] = $this->db->count_all('tb_usaha'); //total row
        //$config['total_rows']  = $this->Usaha_m->tampil_data_perbulan($id_nama_usaha);
        $config['total_rows'] = $this->db->select('*')
          ->where('MONTH(tanggal)', date('m'))
          ->where('id_nama_usaha', $id_nama_usaha)
          ->get('tb_usaha')
          ->num_rows();
        $config['per_page'] = 5;  //show record per halaman
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
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
 
        $data['data']=$this->Usaha_m->get_kategori();
        $this->pagination->initialize($config);
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['metal'] = $this->Usaha_m->get_list($id_nama_usaha, 'tb_usaha', $config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['user'] = $this->Usaha_m->getAll($id_nama_usaha)->result();
        $data['data']=$this->Usaha_m->get_kategori();
        $data['total_debit'] = $this->Usaha_m->hitung_debit($id_nama_usaha);
        $data['total_kredit'] = $this->Usaha_m->hitung_kredit($id_nama_usaha);
        $data['saldo_awal'] = $this->Usaha_m->saldo_awal();
        $data['saldo_akhir'] = $this->Usaha_m->saldo_akhir($id_nama_usaha);
        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/usaha', $data);
        $this->load->view('template/footer');

    }
    public function get_subkategori(){
        $id_kategori=$this->input->post('id_kategori');
        $data=$this->Usaha_m->get_subkategori($id_kategori);
        echo json_encode($data);
    }

    public function input($id_nama_usaha){
        $this->load->library('upload');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $kategori = $this->input->post('kategori');
        $jenis_uang = $this->input->post('jenis_uang');
        $tanggal = $this->input->post('tanggal');
        $ket = $this->input->post('ket');
        $debit = $this->input->post('debit');
        $kredit = $this->input->post('kredit');
        $catatan = $this->input->post('catatan');

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
                  'catatan' =>$this->input->post('catatan'),
                  'id_nama_usaha' =>$this->input->post('id_nama_usaha')
                  
                );

                $this->Usaha_m->input_data($data, 'tb_usaha'); //akses model untuk menyimpan ke database
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
              }
                redirect('usaha_c/data_usaha/'.$id_nama_usaha); //jika berhasil maka akan ditampilkan view upload
            }else{
                redirect('usaha_c'); //jika gagal maka akan ditampilkan form upload
            }
        }else{
            $data = [
                'kategori' =>$kategori,
                'jenis_uang' =>$jenis_uang,
                'tanggal' =>$tanggal,
                'ket' =>$ket,
                'debit' =>$debit,
                'kredit' =>$kredit,
                'catatan' =>$catatan,
                'id_nama_usaha' =>$id_nama_usaha,
            ];
            $input = $this->Usaha_m->input_data($data, 'tb_usaha');
            if ($input) {
                redirect('usaha_c/data_usaha/'.$id_nama_usaha);
            } else {
                redirect('usaha_c/data_usaha/'.$id_nama_usaha);
            }
        }
    }

    public function edit($id_nama_usaha)
    {
        $this->load->library('upload');
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $id_usaha = $this->input->post('id_usaha');
        $kategori = $this->input->post('kategori');
        $jenis_uang = $this->input->post('jenis_uang');
        $tanggal = $this->input->post('tanggal');
        $ket = $this->input->post('ket');
        $debit = $this->input->post('debit');
        $kredit = $this->input->post('kredit');
        // tampung data gambar dari id
        $idFile = $this->Usaha_m->get_id($id_usaha)->row();
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

            if($_FILES['filefoto']['name']){
            if ($this->upload->do_upload('filefoto')){
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


                $update = $this->Usaha_m->update_data($id_usaha,$data);
                if ($update) {
                    $this->session->set_flashdata('pesan','Data berhasil di update');

                    redirect('usaha_c/data_usaha/'.$id_nama_usaha);
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
                $update = $this->Usaha_m->update_data($id_usaha,$data);
                if ($update) {
                    $this->session->set_flashdata('pesan','Data berhasil di update');
                    
                    redirect('usaha_c/data_usaha/'.$id_nama_usaha);
                } else {
                    echo "gagal";
                }        
            }    
        }else{
            echo "gagal";
        }
    }

    public function hapus_data($id_usaha, $id_nama_usaha) {
        $id_nama_usaha = $this->input->post('id_nama_usaha');
        $id_usaha = $this->input->post('id_usaha');
        $where = array('id_usaha' => $id_usaha); 
        $idFile = $this->Usaha_m->get_id($id_usaha)->row();
        $data = './assets/upload/foto_nota/'. $idFile->foto;
        // hapus file dulu di dalam folder, jika berhasil hapus di databasenya
        if(is_readable($data) && unlink($data)){
        }
        $del = $this->Usaha_m->delete($id_usaha);
         if ($del) {
            redirect('usaha_c/data_usaha/'.$id_nama_usaha);
        } else {
            redirect('usaha_c/data_usaha/'.$id_nama_usaha);
        } 
        
        //helper_log("hapus", "Hapus stok kode barang : $kode_barang");
        //redirect('stok_c'); 
    }

    public function delete(){
        $this->load->library('session');        
        $id_usaha = $_POST['id_usaha'];

         foreach ($id_usaha as $us)
         {
            $idFile = $this->Usaha_m->get_id($us)->row();
            //print_r($idFile);
            $data = './assets/upload/foto_nota/'. $idFile->foto;
            if(file_exists($data)){
                if(is_readable($data) && unlink($data)){
                  
                }
            }
            
         }  
         $del = $this->Usaha_m->delete($id_usaha);
         if ($del) {
            redirect('usaha_c/data_usaha/'. $this->input->get('id_nama_usaha'));
        } else {
            redirect('usaha_c/data_usaha/'. $this->input->get('id_nama_usaha'));
        }    
    }

    public function filter($id_nama_usaha){ 
        $mulai_tanggal = $this->input->get('mulai_tanggal');
        $sampai_tanggal = $this->input->get('sampai_tanggal');

        $config['base_url'] = site_url('usaha_c/filter/'.$id_nama_usaha);
        $config['total_rows'] = $this->Usaha_m->tampil_filter($id_nama_usaha, $mulai_tanggal, $sampai_tanggal);
        $config['per_page'] = 5;  //show record per halaman
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
        $config['page_query_string'] = TRUE;
 
        $data['data']=$this->Usaha_m->get_kategori();
        $data ['id_nama_usaha'] = $id_nama_usaha;
        $data = [
            'date_from'=>$this->input->get('mulai_tanggal'),
            'date_to'=>$this->input->get('sampai_tanggal'),
        ];
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['metal'] = $this->Usaha_m->getByDate($id_nama_usaha, $data['date_from'], $data['date_to'], 'tb_usaha', $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');
        $data['id_nama_usaha'] = $id_nama_usaha;
        $date_from = $this->input->get('mulai_tanggal');
        $date_to = $this->input->get('sampai_tanggal');

        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $data['data']=$this->Usaha_m->get_kategori();
        $data['user'] = $this->Usaha_m->Date($data['date_from'], $data['date_to'])->result();
        $data['total_debit'] = $this->Usaha_m->FilterTanggalDebit($data['id_nama_usaha'], $data['date_from'], $data['date_to']);
        $data['total_kredit'] = $this->Usaha_m->FilterTanggalKredit($data['id_nama_usaha'], $data['date_from'], $data['date_to']);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/filter', $data);
        $this->load->view('template/footer');
    }

    public function filter_bulan_tahun($id_nama_usaha){ 
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        $config['base_url'] = site_url('usaha_c/filter_bulan_tahun/'.$id_nama_usaha);
        $config['total_rows'] = $this->Usaha_m->getTotalMontYear($id_nama_usaha, $bulan, $tahun);
        $config['per_page'] = 5;  //show record per halaman
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
        $config['page_query_string'] = TRUE;
 
        $this->pagination->initialize($config);
        $data['data']=$this->Usaha_m->get_kategori();
        $data ['id_nama_usaha'] = $id_nama_usaha;
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
        $data['metal'] = $this->Usaha_m->getMontYear($id_nama_usaha, $bulan, $tahun,'tb_usaha', $config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->model('Data_usaha_m');

        $data['id_nama_usaha'] = $id_nama_usaha;
        $bulan = $this->input->get('bulan'); // MM
        $tahun = $this->input->get('tahun'); 
        $data['id_nama_usaha'] = $id_nama_usaha;

        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $data['data']=$this->Usaha_m->get_kategori();
        $data['user'] = $this->Usaha_m->getBulanTahun($id_nama_usaha, $bulan, $tahun)->result();
        $data['total_debit'] = $this->Usaha_m->MontYearDebit($data['id_nama_usaha'], $bulan, $tahun);
        $data['total_kredit'] = $this->Usaha_m->MontYearKredit($data['id_nama_usaha'], $bulan, $tahun);

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/filter_bulan_tahun', $data);
        $this->load->view('template/footer');
    }

    public function rekap_perbulan($id_nama_usaha){ //function untuk menampilkan halaman data bersarkan nama
        
        $this->load->model('Data_usaha_m');
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['total_debit'] = $this->Usaha_m->rekapDebitBulan($id_nama_usaha, $bulan, $tahun);
        $data['total_kredit'] = $this->Usaha_m->rekapKreditBulan($id_nama_usaha, $bulan, $tahun);
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $data['nama_bulan'] = $bulan;
        $data['nama_tahun'] = $tahun;

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/rekap_bulanan', $data);
        $this->load->view('template/footer');
    }

    public function rekap_tahunan($id_nama_usaha){ //function untuk menampilkan halaman data bersarkan nama
        
        $this->load->model('Data_usaha_m');
        $tahun = $this->input->get('tahun');

        $data['id_nama_usaha'] = $id_nama_usaha;
        $data['role_usaha'] = $this->Data_usaha_m->getAll()->result();
        $data['total_debit'] = $this->Usaha_m->rekapDebitTahunan($id_nama_usaha, $tahun);
        $data['total_kredit'] = $this->Usaha_m->rekapKreditTahunan($id_nama_usaha,$tahun);
        $data['lihat'] = $this->Data_usaha_m->tampil_nama($data['id_nama_usaha'])->row_array();
        $data['nama_tahun'] = $tahun;

        $this->load->view('template/header');
        $this->load->view('template/sidebar', $data);
        $this->load->view('pages/rekap_tahunan', $data);
        $this->load->view('template/footer');
    }
   
}
?>