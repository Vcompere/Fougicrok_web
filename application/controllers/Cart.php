<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{
	public function add()
	{
		var_dump($this->basket->get_basket());
	}
}

?>