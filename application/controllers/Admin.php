<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function panel()
	{
		var_dump($_SESSION);
		if($this->session->rank == 'admin' || $this->session->rank == 'super_admin')
		{
			$this->my_header->set_header();
			$this->load->view('category');
			$this->load->view('footer');
		}
		else
		{
			redirect('brain/accueil');
		}
	}
}
?>