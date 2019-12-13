<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');
	
 
	
class Users_model extends CI_Model	
{
	public function users_select()
	{
		$query = $this->db->get('users');
		$result = $query->result();

		return $result;
	}

	public function users_select_u($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->get('users');
		$result = $query->row();

		return $result;
	}

	public function users_insert()
	{

		$data = $this->input->post();
		unset($data['user_passwordConfirm']);

		$signupDate = new Datetime();
		$data['user_sDate'] = $signupDate->format('Y-m-d');

		$this->db->insert('users', $data);
	}

	public function users_delete($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('users');
	}

	public function users_update($id)
	{
		$data = $this->input->post();
		$this->db->where('user_id', $id);
		$this->db->update('users', $data);
	}

	public function subusers_select()
	{
		$this->db->where('user_parent !=', 0);
		$query = $this->db->get('users');
		$result = $query->result();

		return $result;
	}
}      	