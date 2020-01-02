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
		if($this->session->rank == 'admin' || $this->session->rank == 'super_admin')
		{
			$this->load->model('Users_model');
			$data['users'] = $this->Users_model->users_select_rank();

			$this->load->model('Products_model');
			$data['products'] = $this->Products_model->products_select_categ();

			$this->load->model('Category_model');
			$data['Category'] = $this->Category_model->Category_select();

			$this->load->model('Ranks_model');
			$data['Ranks'] = $this->Ranks_model->Ranks_select();

			$this->load->model('Discount_model');
			$data['Discount'] = $this->Discount_model->Discount_select();

			$this->my_header->set_header();
			$this->load->view('admin/panel', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect('brain/accueil');
		}
	}
}
?>