<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
	
 
	
class Ranks_model extends CI_Model	
{
	public function ranks_select()
	{
		$query = $this->db->query("Select * from ranks");
		$result = $query->result();

		return $result;
	}

	public function ranks_select_u($id)
	{
		$this->db->where('rank_id', $id);
		$query = $this->db->get('ranks');
		$result = $query->row();

		return $result;
	}

	public function ranks_insert()
	{
		$data = $this->input->post();
		$this->db->insert('ranks', $data);
	}
}       