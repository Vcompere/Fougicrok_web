<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
	
 
	
class Ranks_model extends CI_Model	
{
	public function accueil_select()
	{
		$query = $this->db->query("Select * from ranks");
		$result = $query->result();

		return $result;
	}

	public function accueil_insert()
	{
		$data = $this->input->post();
		$this->db->insert('ranks', $data);
	}
}       