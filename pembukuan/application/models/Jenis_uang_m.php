<?php
/**
 * 
 */
class Jenis_Uang_m extends CI_Model
{
	
	function getAll(){ //membuat function getAll
		$this->db->select('*'); //memilih semua
		$this->db->from('tb_jenis_uang');// dari tabel tm_user
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_jenis_uang.id_kategori_jenis', 'LEFT');
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

	function input_data($data, $table) { //membuat function input_data
		$this->db->insert($table,$data);
		//untuk proses tambah data ke database
	}

	function update_data($where,$data,$table) { //membuat fuction update_data
		$this->db->where($where);
		$this->db->update($table, $data); //untuk mengubah data pada database
	}

	function hapus_data($where, $table) { //membuat function hapus_data
	    $this->db->where($where);
	    $this->db->delete($table); //untuk menghapus data pada database
	}

	public function delete($id_jenis_uang){        
		$this->db->where_in('id_jenis_uang', $id_jenis_uang);    
		$this->db->delete('tb_jenis_uang');  
	}

	function get_jenis_list($limit, $start){
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_jenis_uang.id_kategori_jenis', 'LEFT');
        $query = $this->db->get('tb_jenis_uang', $limit, $start);
        return $query;
    }

}
?>