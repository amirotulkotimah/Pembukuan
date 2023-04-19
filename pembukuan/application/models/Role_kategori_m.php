<?php
/**
 * 
 */
class Role_kategori_m extends CI_Model
{
	
	function getAll(){ 
		$this->db->select('*'); 
		$this->db->from('tb_kategori');
		$query = $this->db->get();
		return $query;
	}
}
?>