<?php
/**
 * 
 */
class Kategori_m extends CI_Model
{
	public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
	
	function getAll(){ 
		$this->db->select('*'); 
		$this->db->from('tb_kategori');
		$query = $this->db->get();
		return $query;
		
	}

	function input_data($data, $table) { 
		$this->db->insert($table,$data);
		
	}

	function update_data($where,$data,$table) { 
		$this->db->where($where);
		$this->db->update($table, $data); 
	}

	function hapus_data($where, $table) { 
	    $this->db->where($where);
	    $this->db->delete($table); 
	}

	public function delete($id_kategori){        
		$this->db->where_in('id_kategori', $id_kategori);    
		$this->db->delete('tb_kategori');  
	}

	function get_kategori_list($limit, $start){
        $query = $this->db->get('tb_kategori', $limit, $start);
        return $query;
    }

}
?>