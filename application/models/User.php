<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function get($table)
	{
		return $this->db->get($table); 		
	}

	public function get_where($table,$where)
	{
		return $this->db->get_where($table,$where); 		
	}

	public function que()
	{
		$this->db->select('*');
		$this->db->from('kuesioner');		
		$this->db->join('kriteria','kuesioner.id_kriteria=kriteria.id','inner'); 		
		return $this->db->get();
	}

	public function check($table,$where)
	{
		return $this->db->get_where($table,$where); 		
	}
	
	public function insert($table,$data){
		return $this->db->insert($table, $data);
	}

	public function update($table,$data,$where){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function delete($table,$data){
		$this->db->where($data);
		$this->db->delete($table);
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */