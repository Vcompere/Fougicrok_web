<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brain extends CI_Controller
{
	// page d'accueil
	public function accueil()
	{
		//appel du model
		$this->load->model('Products_model');
		 $this->load->model('Ranks_model');
		//récupération des résultat de la method accueil
		$result = $this->Products_model->products_select();

		
		$view['list'] = $result;

		

		if ($this->input->post('categ'))
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

	// page liste des produits
	public function products($id)
	{
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

	// fonction d'ajout d'un item dans le panier (cf: https://github.com/gregjaouen/codeigniter_libraries)
	public function addToBasket()
	{
		if($this->input->post('addToBasket'))
		{
			$this->load->model('Products_model');
			$row = $this->Products_model->products_select_u($this->input->post('id'));
			$data = array(
			    "id" => $row->prod_id,
			    "name" => $row->prod_name,				
			    "price" => $row->prod_price,
			    "ref" => $row->prod_ref,
			    "img" => $row->prod_img,
			    "cat_id" => $row->cat_id
			);

			$this->basket->add($data);

			//redirige instantanément sur la fonction appelante
			header('location:'.$_SERVER['HTTP_REFERER']);
		}
	}

	// page individuelle de produit
	public function product($id)
	{
		$this->load->model('Products_model');
		$result = $this->Products_model->products_select_u($id);

		$this->my_header->set_header();
		$this->load->view('product', $result);
		$this->load->view('footer');
	}

	// TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO TO DO
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












	// fonction affichant la page adéquate en fonction du statut de l'utilisateur : connecté ou non
	public function profile()
	{	
		// si connecté, affiche la page "Mon compte"
		if ($this->session->loged)
		{
			$this->load->model('Users_model');
			$data['info'] = $this->Users_model->users_select_u($_SESSION['login']);

			$this->my_header->set_header();
			$this->load->view('profile', $data);
			$this->load->view('footer');	
		}
		else //si non connecté, affiche la page d'authentification 
		{
			$this->my_header->set_header();
			$this->load->view('sign');
			$this->load->view('footer');	
		}
	}

	// fonction pour se déconnecter (détruire la sesssion)
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('brain/accueil');	
	}

	// formulaire d'inscription
	public function signup()
	{

		if (!empty($_POST['input_name']) && !empty($_POST['input_value']))
		{ 
			$field = $_POST['input_name'];
			$_POST[$field] = $_POST['input_value'];
			unset($_POST['input_name']);
			unset($_POST['input_name']);
		}

		if ($this->form_validation->run('signup') == FALSE) // contrôle de saisie natif à CI
        {
        	if (isset($field))
        	{
				echo form_error($field);
			}
			
        	if ($this->input->post('signup_submit'))
        	{
        	$data["signup"] = TRUE;
        	$this->my_header->set_header();
			$this->load->view('sign', $data);
			$this->load->view('footer');
			}

        }
        else
        {
			// $this->output->enable_profiler(TRUE);

			//récupération des données et traitement de celles-ci avant insertion en DB
        	$data = $this->input->post();
			
			unset($data['signup_submit']);
			unset($data['user_passwordConfirm']);
			// $signupDate = new Datetime();
			$data['user_password'] = password_hash($this->input->post('user_password'),PASSWORD_DEFAULT);
			$data['user_try'] = 0;
			$data['user_blocked'] = md5($this->input->post('user_login'));

			$this->load->model('Users_model');
			$this->Users_model->users_insert($data);

			// génération du mail de confirmation/activation
        	include 'application/views/signup_mail.php';
			$this->email->from('nepasrepondre@fougicrok.com');
			$this->email->to($this->input->post('user_mail'));
			$this->email->set_mailtype("html");
			$this->email->subject('Validation de votre E-mail');
			$this->email->message($message);
			$this->email->send();

			// message affiché sur la view "texted"
			$msg['msg'] = 'Un mail d\'activation vient d\'être envoyé à '.$data['user_mail'].', consultez votre boite mail !';
			$this->my_header->set_header();
			$this->load->view('texted', $msg);
			$this->load->view('footer');
		}
	}

	public function signupTemp()
	{
		$this->signup();
		

	}


	//fonction de reenvoi de mail
	public function reMail()
	{
		if ($this->form_validation->run('reMail') == FALSE && $this->input->post('mail') != $this->input->post('oriMail'))
        {
        	$msg['msg'] = 'Votre compte n\'est pas activé, vérifiez votre boite mail !';
    		$msg['reMail'] = TRUE;
    		$msg['mail'] = $this->input->post('mail');
    		$msg['blocked'] = $this->input->post('blocked');
    		$msg['login'] = $this->input->post('login');
        	$this->my_header->set_header();
			$this->load->view('texted', $msg);
			$this->load->view('footer');
        }
        else
        {
			$data['user_login'] = $this->input->post('login');
			$data['user_blocked'] = $this->input->post('blocked');

			$this->load->model('Users_model');
			$this->Users_model->users_update_mail($data['user_login'], $this->input->post('mail'));

			include 'application/views/signup_mail.php';
			$this->email->from('nepasrepondre@fougicrok.com');
			$this->email->to($this->input->post('mail'));
			$this->email->set_mailtype("html");
			$this->email->subject('Validation de votre E-mail');
			$this->email->message($message);
			$this->email->send();

			$msg['msg'] = 'Un mail d\'activation vient d\'être envoyé à '.$this->input->post('mail').', consultez votre boite mail !';
			$this->my_header->set_header();
			$this->load->view('texted', $msg);
			$this->load->view('footer');
		}

	}

	//vérifie l'existence du login dans la DB
	public function exist_login($login)
	{
		$this->load->model('Users_model');

		if($this->Users_model->users_select_u($login) != NULL)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('exist_login', 'Ce login n\'existe pas');
			return FALSE;	
		}
	}

	//formulaire de connexion
	public function signin()
	{
    	$login = $this->input->post('signin_login');
    	$this->load->model('Users_model');
		$result = $this->Users_model->users_select_u($login);

		if ($this->exist_login($login)) // le login existe
		{
			if ($result->user_blocked != NULL) // le compte est bloqué
        	{
        		$msg['msg'] = 'Votre compte n\'est pas activé, vérifiez votre boite mail !';
        		$msg['reMail'] = TRUE;
        		$msg['mail'] = $result->user_mail;
        		$msg['blocked'] = $result->user_blocked;
        		$msg['login'] = $result->user_login;
        		$this->my_header->set_header();
				$this->load->view('texted', $msg);
				$this->load->view('footer');
        	}
        	else // le compte est activé
        	{
        		if ($result->user_try >= 3) // 3 mauvais essais de mdp
        		{
        			$data['result'] = $result;
					$this->my_header->set_header();
					$this->load->view('password_lost',$data);
					$this->load->view('footer');
        		}
        		else // nombre d'essais de mdp < 3
        		{
	        		if ($this->form_validation->run('signin') == FALSE) // controle de saisie faux
			        {
			        	$data["signin"] = TRUE;
			        	$this->my_header->set_header();
						$this->load->view('sign', $data);
						$this->load->view('footer');
			        }
			        else // tout est ok, connexion permise
			        {
			        	$this->load->model('Ranks_model');
			        	$rankResult = $this->Ranks_model->ranks_select_u($result->rank_id);
			        	$this->Users_model->users_date_log($login);
						$this->Users_model->users_try_reset($login);

						$this->session->loged = TRUE;
						$this->session->login = $result->user_login;
						$this->session->mail = $result->user_mail;
						$this->session->rank = $rankResult->rank_name;
						$this->session->name = $result->user_name;
						$this->session->firstname = $result->user_firstname;
						$this->session->cDate = $result->user_cDate;
						$this->session->phone = $result->user_phone;

						redirect('brain/profile');
					}
				}
        	}
        }
        else // le login n'existe pas
        {
        	$data["spanLogin"] = 'Ce login n\'existe pas';
        	$data["signin"] = TRUE;
        	$this->my_header->set_header();
			$this->load->view('sign', $data);
			$this->load->view('footer');
        }
	}

	// page "mot de passe perdu"
	public function password_lost()
	{
		$this->load->model('Users_model');
		$result = $this->Users_model->users_select_u($this->input->post('login'));
		
		if ($this->form_validation->run('pwd_lost') == FALSE) // controle de saisie
		{	
			$data['result'] = $result;
			$this->my_header->set_header();
			$this->load->view('password_lost',$data);
			$this->load->view('footer');
		}
		else
		{
			if($this->input->post('answer') != $result->user_answer) // vérification de la véracité de la réponse
			{
				$data["spanAnswer"] = 'La réponse ne correspond pas';
				$data['result'] = $result;
				$this->my_header->set_header();
				$this->load->view('password_lost',$data);
				$this->load->view('footer');
			}
			else
			{
				$this->Users_model->users_try_reset($this->input->post('login'));

				if(isset($_POST['remember'])) // si l'utilisateur se souvient de son mdp, il peut re-tenter
				{
					redirect('brain/profile');
				}
				else if(isset($_POST['mail'])) // si l'utilisateur ne se souvient plus de son mdp, un mail de modification lui est envoyé
				{
					$data['user_blocked'] = md5($result->user_login);
					$this->Users_model->users_blocked($data['user_blocked'], $result->user_id);

					include 'application/views/pwd_mail.php';
					$this->email->from('nepasrepondre@fougicrok.com');
					$this->email->to($result->user_login);
					$this->email->set_mailtype("html");
					$this->email->subject('Réinitialisation de votre mot de passe');
					$this->email->message($message);
					$this->email->send();

					$msg['msg'] = 'Un mail de réinitialisation vient d\'être envoyé à '.$result->user_mail.'.';
					$this->my_header->set_header();
					$this->load->view('texted', $msg);
					$this->load->view('footer');
				}
			}
		}
	}

	// page de modification de mdp
	public function password_reset($block)
	{
		//$this->output->enable_profiler(TRUE);
		if ($this->form_validation->run('pwd_reset') == FALSE) //controle de saisie erroné
		{
			$this->my_header->set_header();
			$this->load->view('password_reset');
			$this->load->view('footer');
		}
		else // si le controle de saisie OK, update du mdp dans la db et débloquage du compte
		{
			$this->load->model('Users_model');
			$result = $this->Users_model->users_select_u_block($block);

			$pwd = password_hash($this->input->post('user_password'),PASSWORD_DEFAULT);
			$this->Users_model->users_blocked_reset($block);
			$this->Users_model->users_try_reset($result->user_login);
			$this->Users_model->users_pwd_update($result->user_id, $pwd);

			redirect('brain/profile');
		}
	}
	
	// vérifie que le mdp saisi correspond à celui enregistré
	public function password_verify($pwd)
	{
		$this->load->model('Users_model');
		$result = $this->Users_model->users_select_u($this->input->post('signin_login')); 

		if ($result != NULL)
		{
			if(password_verify($pwd, $result->user_password))
			{
				return TRUE;
			}
			else
			{
				$try = intval($result->user_try);
				$try++;
				$this->form_validation->set_message('password_verify', 'Mot de passe incorrect');
				$this->Users_model->users_try_plus($result->user_id, $try);
				return FALSE;	
			}
		}

	}

	// page d'activation/confirmation (compte/mail) - l'utiisateur est automatiquement connecté en arrivant ici
	public function mail_success($block)
	{
		// activation du compte et récupération des infos users
		$this->load->model('Users_model');
		$this->load->model('Ranks_model');
		$result = $this->Users_model->users_select_u_block($block);
		$this->Users_model->users_blocked_reset($block);
		$rankResult = $this->Ranks_model->ranks_select_u($result->rank_id);

		// déclaration de la session = connexion de user
		$this->session->loged = TRUE;
		$this->session->login = $result->user_login;
		$this->session->mail = $result->user_mail;
		$this->session->rank = $rankResult->rank_name;
		$this->session->name = $result->user_name;
		$this->session->firstname = $result->user_firstname;
		$this->session->cDate = $result->user_cDate;

		// message de succès + redirection auto
		$msg['msg'] = 'Merci d\'avoir confirmé votre e-mail, votre compte est maintenant actif !';
		$this->my_header->set_header();
		$this->load->view('texted', $msg);
		$this->load->view('footer');	

		header ("Refresh: 3; URL=../accueil");
	}
}
?>

