<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Header 
{
        public function header()
        {
			$this->load->model('Category_model');
			$view['categ'] = $this->Category_model->category_select();
			$this->load->view('header', $view);
        }
}

?>