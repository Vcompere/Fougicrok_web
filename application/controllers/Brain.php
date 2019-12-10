<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brain extends CI_Controller
{
	public function accueil()
	{
		//appel du model
		$this->load->model('Products_model');
		//récupération des résultat de la method accueil
		$result = $this->Products_model->products_select();

		
		$view['list'] = $result;

		

		if ($this->input->post())
		{
			$this->Ranks_model->accueil_insert();
			redirect("brain/accueil");
		}
		else
		{
			$this->my_header->set_header();
			$this->load->view('accueil', $view);
			$this->load->view('footer');
		}
	}

	public function products($id)
	{
		$_SESSION['name'] = 'Fougère';
		//$this->output->enable_profiler(TRUE);
		$this->load->model('Products_model');
		$result = $this->Products_model->products_type($id);
		$view['list'] = $result;

		$this->load->model('Category_model');
		$result = $this->Category_model->category_select_u($id);
		$view['categ'] = $result;



		$this->my_header->set_header();
		$this->load->view('products', $view);
		$this->load->view('footer');
	}

	public function category()
	{
		//$this->output->enable_profiler(TRUE);
		$this->load->model('Category_model');
		$result = $this->Category_model->category_select();
		$view['list'] = $result;

		if ($this->input->post())
		{
			$this->Category_model->category_insert();
			redirect("brain/category");
		}
		else
		{
			$this->my_header->set_header();
			$this->load->view('category', $view);
			$this->load->view('footer');
		}
	}

	public function delete() 
	{
		//$this->output->enable_profiler(TRUE);	
		$id = $this->input->post('idH');
		$this->load->model('Category_model');
		$this->Category_model->category_delete($id);
		redirect("brain/category");
	}

	public function categ_modif($id)
	{
		//$this->output->enable_profiler(TRUE);	
		$this->load->model('Category_model');
		$result = $this->Category_model->category_select_u($id);
		$view['categ'] = $result;

		if ($this->input->post())
		{
			$this->Category_model->category_update($id);
			redirect("brain/category");
		}
		else
		{
			$this->my_header->set_header();
			$this->load->view('categ_modif', $view);
			$this->load->view('footer');	
		}
	}

	public function profile()
	{
		if (isset($this->session->name))
		{
			$this->my_header->set_header();
			$this->load->view('profile');
			$this->load->view('footer');	
		}
		else
		{
			$this->my_header->set_header();
			$this->load->view('sign');
			$this->load->view('footer');	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('brain/accueil');	
	}	
}

?>

