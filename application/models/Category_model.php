<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
	
 
	
class Category_model extends CI_Model	
{
	public function category_select()
	{
		$query = $this->db->get('category');
		$result = $query->result();

		return $result;
	}

	public function category_select_u($id)
	{
		$this->db->where('cat_id', $id);
		$query = $this->db->get('category');
		$result = $query->row();

		return $result;
	}

	public function category_insert()
	{
		$data = $this->input->post();
		$this->db->insert('category', $data);
	}

	public function category_delete($id)
	{
		$this->db->where('cat_id', $id);
		$this->db->delete('category');
	}

	public function category_update($id)
	{
		$data = $this->input->post();
		$this->db->where('cat_id', $id);
		$this->db->update('category', $data);
	}

	public function subcategory_select()
	{
		$this->db->where('cat_parent !=', 0);
		$query = $this->db->get('category');
		$result = $query->result();

		return $result;
	}
}       
