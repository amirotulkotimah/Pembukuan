<?php
/**
 * 
 */
class Data_usaha_m extends CI_Model
{
	function getAll(){ 
		$this->db->select('*'); 
		$this->db->from('tb_data_usaha');
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

	public function delete($id_data_usaha){        
		$this->db->where_in('id_data_usaha', $id_data_usaha);    
		$this->db->delete('tb_data_usaha');  
	}

	function get_data_usaha_list($limit, $start){
        $query = $this->db->get('tb_data_usaha', $limit, $start);
        return $query;
    }
    function tampil_nama($id_data_usaha){ 
		$this->db->select('*'); 
		$this->db->from('tb_data_usaha');
		$this->db->where("id_data_usaha", $id_data_usaha);
		$query = $this->db->get();
		return $query;
		//untuk proses selecy data dari database
	}

}
?>