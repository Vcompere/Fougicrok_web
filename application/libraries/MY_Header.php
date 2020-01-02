<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Header 
{

        public function set_header()
        {
			$this->load->model('Category_model');
			$view['categ'] = $this->Category_model->category_select();

        	if($this->input->post('removeFromBasket'))
			{
				$this->load->model('Products_model');
				$row = $this->Products_model->products_select_u($this->input->post('bask_id'));
				$removeData = array(
				    "id" => $row->prod_id,
				    "name" => $row->prod_name,				
				    "price" => $row->prod_price,
				    "ref" => $row->prod_ref,
				    "img" => $row->prod_img,
				);
				$this->basket->remove($removeData);
			}
			
			$view['basket'] = $this->basket->get_basket();

			$this->load->view('header', $view);
        }

		public function __get($var)
		{
		    return get_instance()->$var;
		}
}

?>