<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Header 
{

        public function set_header()
        {
			$this->load->model('Category_model');
			$view['parent'] = $this->Category_model->category_select();
			$view['categ'] = $this->Category_model->subcategory_select();
			$this->load->view('header', $view);
        }

		public function __get($var)
		{
		    return get_instance()->$var;
		}
}

?>