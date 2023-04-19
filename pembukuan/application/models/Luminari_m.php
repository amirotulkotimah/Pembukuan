<?php
/**
 * 
 */
class Luminari_m extends CI_Model
{
	
	public function getAll(){ 
		$this->db->select('*');
		$this->db->from('tb_luminari');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_luminari.kategori', 'LEFT');
		$this->db->order_by('tanggal','ASC');
		$this->db->where('MONTH(tanggal)', date('m'));
		$query = $this->db->get();
		return $query;
	}

	public function input_data($data, $table) { 
		$this->db->insert($table,$data);
	}

	public function update_data($id_luminari,$data) {
	    $this->db->where('id_luminari',$id_luminari);
	    return $this->db->update('tb_luminari',$data);
  	}
    
    public function hapus_data($id_luminari, $where, $table) {
	    $this->db->where('id_luminari',$id_luminari);
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

	public function get_id($id_luminari)
    {
    	$this->db->where('id_luminari',$id_luminari);
    	return $this->db->get('tb_luminari');
    }

   	public function Date($data_from, $date_to)
	{ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_luminari');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_luminari.kategori', 'LEFT');
		$where = "tanggal BETWEEN '" . $data_from . "'AND'" . $date_to . "'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	public function hitung_debit(){
		$this->db->select_sum('debit');
		$this->db->where('MONTH(tanggal)', date('m'));
   		$query = $this->db->get('tb_luminari');
   		if($query->num_rows()>0){
   			return $query->row()->debit;
   		}else{
   			return 0;
   		}
   	}

   	public function hitung_kredit(){
		$this->db->select_sum('kredit');
		$this->db->where('MONTH(tanggal)', date('m'));
   		$query = $this->db->get('tb_luminari');
   		if($query->num_rows()>0){
   			return $query->row()->kredit;
   		}else{
     		return 0;
   		}
   	}

   	function saldo_akhir(){
		$this->db->select('sum(kredit) as masuk');
        $this->db->from('tb_luminari');
        $this->db->where('MONTH(tanggal)', date('m'));
        $masuk = $this->db->get()->result();
        foreach ($masuk as $row) {
            $masuk = $row->masuk;
        }

        $this->db->select('sum(debit) as keluar');
        $this->db->from('tb_luminari');
        $this->db->where('MONTH(tanggal)', date('m'));
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

   	public function delete($id_luminari){        
		$this->db->where_in('id_luminari', $id_luminari);  
		$this->db->delete('tb_luminari');  
	}

	function get_luminari_list($limit, $start){
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_luminari.kategori', 'LEFT');
		$this->db->order_by('tanggal','ASC');
		$this->db->where('MONTH(tanggal)', date('m'));
        $query = $this->db->get('tb_luminari', $limit, $start);
        return $query;
    }

    public function getByDate($data_from, $date_to, $limit, $start)
	{ 
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_luminari.kategori', 'LEFT');
		$where = "tanggal BETWEEN '" . $data_from . "'AND'" . $date_to . "'";
		//$this->db->like("tanggal BETWEEN '" . $data_from . "'AND'" . $date_to . "'")->get('tb_metal_genix')->num_rows();
		$this->db->where($where);
		$query = $this->db->get('tb_luminari', $limit, $start);
		return $query;
	}

}
?>