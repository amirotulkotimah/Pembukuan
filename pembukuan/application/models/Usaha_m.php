<?php
/**
 * 
 */
class Usaha_m extends CI_Model
{
	
	public function getAll($id_nama_usaha){ 
		$this->db->select('*');
		$this->db->from('tb_usaha');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_usaha.kategori', 'LEFT');
		$this->db->where('id_nama_usaha',$id_nama_usaha);
		$this->db->where('MONTH(tanggal)', date('m'));
		$this->db->order_by('tanggal','ASC');
		$query = $this->db->get();
		return $query;
	}

    public function get_list($id_nama_usaha, $limit, $start){ 
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_usaha.kategori', 'LEFT');
		$this->db->where('id_nama_usaha',$id_nama_usaha);
		$this->db->where('MONTH(tanggal)', date('m'));
		$this->db->order_by('tanggal','ASC');
		$query = $this->db->get($limit, $start);
		return $query;
	}

	function tampil_data_perbulan($id_nama_usaha){
		$this->db->select('*'); 
		$this->db->from('tb_usaha'); 
		$this->db->where('id_nama_usaha',$id_nama_usaha);
		$this->db->where('month(tanggal)=',date('m')); 
		$query = $this->db->get(); 
		return $query->num_rows();
	} 

    public function input_data($data, $table) { 
		$this->db->insert($table,$data);
	}

	public function update_data($id_usaha,$data) {
	    $this->db->where('id_usaha',$id_usaha);
	    return $this->db->update('tb_usaha',$data);
  	}
    
    public function hapus_data($id_usaha, $where, $table) {
	    $this->db->where('id_usaha',$id_usaha);
	    $this->db->where($where);
	    return $this->db->delete($table);
  	}

	function get_kategori(){
		$hasil=$this->db->query("SELECT * FROM tb_kategori");
		return $hasil;
	}
	
	function get_subkategori($id_kategori){
		$hasil=$this->db->query("SELECT * FROM tb_jenis_uang WHERE id_kategori_jenis='$id_kategori'");
		return $hasil->result();
	}

	public function get_id($id_usaha)
    {
    	$this->db->where('id_usaha',$id_usaha);
    	return $this->db->get('tb_usaha');
    }

   	public function Date($data_from, $date_to)
	{ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_usaha');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_usaha.kategori', 'LEFT');
		$where = "tanggal BETWEEN '" . $data_from . "'AND'" . $date_to . "'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	public function hitung_debit($id_nama_usaha){
		$this->db->select_sum('debit');
		$this->db->where('MONTH(tanggal)', date('m'));
		$this->db->where('id_nama_usaha',$id_nama_usaha);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->debit;
   		}else{
   			return 0;
   		}
   	}

   	public function hitung_kredit($id_nama_usaha){
		$this->db->select_sum('kredit');
		$this->db->where('MONTH(tanggal)', date('m'));
		$this->db->where('id_nama_usaha',$id_nama_usaha);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->kredit;
   		}else{
     		return 0;
   		}
   	}

   	function saldo_akhir($id_nama_usaha){
		$this->db->select('sum(kredit) as masuk');
        $this->db->from('tb_usaha');
        $this->db->where('MONTH(tanggal)', date('m'));
        $this->db->where('id_nama_usaha',$id_nama_usaha);
        $masuk = $this->db->get()->result();
        foreach ($masuk as $row) {
            $masuk = $row->masuk;
        }

        $this->db->select('sum(debit) as keluar');
        $this->db->from('tb_usaha');
        $this->db->where('MONTH(tanggal)', date('m'));
        $this->db->where('id_nama_usaha',$id_nama_usaha);
        $keluar = $this->db->get()->result();
        foreach ($keluar as $row) {
            $keluar = $row->keluar;
        }

        $saldo = $masuk-$keluar;

        return $saldo;
    }

    function saldo_awal(){
		

        $saldo = 0;

        return $saldo;
    }

   	public function delete($id_usaha){        
		$this->db->where_in('id_usaha', $id_usaha);  
		$this->db->delete('tb_usaha');  
	}

    public function getByDate($id_nama_usaha, $data_from, $date_to, $limit, $start)
	{ 
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_usaha.kategori', 'LEFT');
		$this->db->where('id_nama_usaha',$id_nama_usaha);
		$where = "tanggal BETWEEN '" . $data_from . "'AND'" . $date_to . "'";
		$this->db->where($where);
		$this->db->order_by('tanggal','ASC');
		$query = $this->db->get($limit, $start);
		return $query;
	}

	function tampil_filter($id_nama_usaha, $date_from, $date_to){ //function buat filter by date and id jenis
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_usaha');
		$where = "id_nama_usaha = '" . $id_nama_usaha . "' AND tanggal BETWEEN '".$date_from."'AND'".$date_to."'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function FilterTanggalDebit($id_nama_usaha, $date_from, $date_to){
		$this->db->select_sum('debit');
		$where = "id_nama_usaha = '" . $id_nama_usaha . "' AND tanggal BETWEEN '".$date_from."'AND'".$date_to."'";
		$this->db->where($where);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->debit;
   		}else{
   			return 0;
   		}
   	}

   	public function FilterTanggalKredit($id_nama_usaha, $date_from, $date_to){
		$this->db->select_sum('kredit');
		$where = "id_nama_usaha = '" . $id_nama_usaha . "' AND tanggal BETWEEN '".$date_from."'AND'".$date_to."'";
		$this->db->where($where);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->kredit;
   		}else{
   			return 0;
   		}
   	}

	public function getTotalMontYear($id_nama_usaha, $bulan, $tahun)
	{ 
		$this->db->select('*');
	    $this->db->from('tb_usaha');   
	    $this->db->where('MONTH(tanggal)',$bulan);
	    $this->db->where('YEAR(tanggal)',$tahun);
	    $this->db->where('id_nama_usaha',$id_nama_usaha);
	    $query = $this->db->get();
	    return $query->num_rows();
	}

	public function getMontYear($id_nama_usaha, $bulan, $tahun, $limit, $start)
	{ 
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_usaha.kategori', 'LEFT');
		$this->db->where('id_nama_usaha',$id_nama_usaha);
		$where = "MONTH(tanggal) = '" . $bulan . "' AND YEAR(tanggal)='".$tahun."'";
		$this->db->where($where);
		$this->db->order_by('tanggal','ASC');
		$query = $this->db->get($limit, $start);
		return $query;
	}

	public function MontYearDebit($id_nama_usaha, $bulan, $tahun){
		$this->db->select_sum('debit');
		$this->db->where('id_nama_usaha',$id_nama_usaha);
		$where = "MONTH(tanggal) = '" . $bulan . "' AND YEAR(tanggal)='".$tahun."'";
		$this->db->where($where);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->debit;
   		}else{
   			return 0;
   		}
   	}

   	public function MontYearKredit($id_nama_usaha, $bulan, $tahun){
		$this->db->select_sum('kredit');
		$this->db->where('id_nama_usaha',$id_nama_usaha);
		$where = "MONTH(tanggal) = '" . $bulan . "' AND YEAR(tanggal)='".$tahun."'";
		$this->db->where($where);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->kredit;
   		}else{
   			return 0;
   		}
   	}

	public function getBulanTahun($id_nama_usaha, $bulan, $tahun)
	{ 
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_usaha.kategori', 'LEFT');
		$this->db->where('id_nama_usaha',$id_nama_usaha);
		$where = "MONTH(tanggal) = '" . $bulan . "' AND YEAR(tanggal)='".$tahun."'";
		$this->db->where($where);
		$query = $this->db->get('tb_usaha');
		return $query;
	}

	public function rekapDebitBulan($id_nama_usaha, $bulan, $tahun){
		$this->db->select_sum('debit');
		$this->db->where('MONTH(tanggal)', $bulan);
		$this->db->where('YEAR(tanggal)', $tahun);
		$this->db->where('id_nama_usaha',$id_nama_usaha);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->debit;
   		}else{
   			return 0;
   		}
   	}

   	public function rekapKreditBulan($id_nama_usaha, $bulan, $tahun){
		$this->db->select_sum('kredit');
		$this->db->where('MONTH(tanggal)', $bulan);
		$this->db->where('YEAR(tanggal)', $tahun);
		$this->db->where('id_nama_usaha',$id_nama_usaha);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->kredit;
   		}else{
   			return 0;
   		}
   	}

   	public function rekapDebitTahunan($id_nama_usaha, $tahun){
		$this->db->select_sum('debit');
		$this->db->where('YEAR(tanggal)', $tahun);
		$this->db->where('id_nama_usaha',$id_nama_usaha);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->debit;
   		}else{
   			return 0;
   		}
   	}

   	public function rekapKreditTahunan($id_nama_usaha, $tahun){
		$this->db->select_sum('kredit');
		$this->db->where('YEAR(tanggal)', $tahun);
		$this->db->where('id_nama_usaha',$id_nama_usaha);
   		$query = $this->db->get('tb_usaha');
   		if($query->num_rows()>0){
   			return $query->row()->kredit;
   		}else{
   			return 0;
   		}
   	}

	public function getRekap($id_nama_usaha, $bulan, $tahun)
	{ 
		$this->db->select('*');
	    $this->db->from('tb_usaha');   
	    $this->db->where('MONTH(tanggal)',$bulan);
	    $this->db->where('YEAR(tanggal)',$tahun);
	    $this->db->where('id_nama_usaha',$id_nama_usaha);
	    $query = $this->db->get();
	    return $query;
	}
}
?>