<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
	
 
	
class Products_model extends CI_Model	
{
 	public function products_select()
	{
		$query = $this->db->get('products');
		$result = $query->result();

		return $result;
	}

	public function products_select_categ()
	{
		$this->db->join('category', 'category.cat_id = products.cat_id');
		$query = $this->db->get('products');
		$result = $query->result();

		return $result;
	}

	public function products_select_u($id)
	{
		$this->db->where('prod_id', $id);
		$query = $this->db->get('products');
		$result = $query->row();

		return $result;
	}

	public function products_insert()
	{
		$data = $this->input->post();
		$this->db->insert('products', $data);
	}

	public function products_delete($id)
	{
		$this->db->where('prod_id', $id);
		$this->db->delete('products');
	}

	public function products_update($id)
	{
		$data = $this->input->post();
		$this->db->where('prod_id', $id);
		$this->db->update('products', $data);
	}
	
	public function products_type($id)
	{
		$this->db->where('cat_id', $id);
		$query = $this->db->get('products');
		$result = $query->result();

		return $result;
	}
}       