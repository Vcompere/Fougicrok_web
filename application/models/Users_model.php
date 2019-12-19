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

	public function users_select_u($login)
	{
		$this->db->where('user_login', $login);
		$query = $this->db->get('users');
		$result = $query->row();

		return $result;
	}

	public function users_select_u_block($block)
	{
		$this->db->where('user_blocked', $block);
		$query = $this->db->get('users');
		$result = $query->row();

		return $result;
	}

	public function users_insert($data)
	{
		$this->db->insert('users', $data);
		return $data;
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

	public function users_date_log($login)
	{
		$connexion_date = new Datetime();
		$this->db->set('user_cDate', $connexion_date->format('Y-m-d G:i:s'));
		$this->db->where('user_login', $login);
		$this->db->update('users');
	}

	public function users_blocked_reset($block)
	{
		$this->db->set('user_blocked', NULL);
		$this->db->where('user_blocked', $block);
		$this->db->update('users');
	}

	public function users_blocked($block, $id)
	{
		$this->db->set('user_blocked', $block);
		$this->db->where('user_id', $id);
		$this->db->update('users');
	}

	public function users_update_mail($login,$mail)
	{
		$this->db->set('user_mail', $mail);
		$this->db->where('user_login', $login);
		$this->db->update('users');
	}

	public function subusers_select()
	{
		$this->db->where('user_parent !=', 0);
		$query = $this->db->get('users');
		$result = $query->result();

		return $result;
	}

	public function users_try_plus($id,$try)
	{
		$this->db->set('user_try', $try);
		$this->db->where('user_id', $id);
		$this->db->update('users');
	}

	public function users_try_reset($login)
	{
		$this->db->set('user_try', 0);
		$this->db->where('user_login', $login);
		$this->db->update('users');
	}

	public function users_answer($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->get('users');
		$result = $query->row();

		return $result;		
	}

	public function users_pwd_update($id, $pwd)
	{
		$this->db->set('user_password', $pwd);
		$this->db->where('user_id', $id);
		$this->db->update('users');
	}
}      	
