<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
	
 
	
class Discount_model extends CI_Model	
{
	public function Discount_select()
	{
		$query = $this->db->get('discount');
		$result = $query->result();

		return $result;
	}
}