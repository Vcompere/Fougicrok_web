<?php
//Regex
$rgxLetter = "/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'-]+$/";
$rgxMulti = "/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,.\-_]+$/";
$rgxMail = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
$rgxPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.-_€<>\/,;:])[A-Za-z\d@$!%*?&.-_€<>\/,;:]{8,}$/";
$rgxMultipass = "/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,.\-_!?]+$/";

$config = array(

		'error_prefix' => '',
		'error_suffix' => '',

		'signup' => array
		(
			array
			(
				'field' => 'user_firstname',
				'label' => 'Prénom',
				'rules' => array(
							'required',
							'regex_match['.$rgxLetter.']',
							'max_length[50]'),
				'errors' => array(
							'required' => 'Prénom manquant', 
							'regex_match' => 'Saisie invalide',
							'max_length' => 'C\'est trop long !')
			),

			array
			(
				'field' => 'user_name',
				'label' => 'Nom',
				'rules' => array(
							'required',
							'regex_match['.$rgxLetter.']',
							'max_length[50]'),
				'errors' => array(
							'required' => 'Nom manquant',
							'regex_match' => 'Saisie invalide',
							'max_length' => 'C\'est trop long !')
			),

			array
			(
				'field' => 'user_login',
				'label' => 'Login',
				'rules' => array(
							'required',
							'regex_match['.$rgxMulti.']',
							'is_unique[users.user_login]',
							'max_length[20]'),
				'errors' => array(
							'required' => 'Login manquant',
							'regex_match' => 'Saisie invalide',
							'is_unique' => 'Ce nom d\'utilisateur est déjà pris',
							'max_length' => 'C\'est trop long !')
			),

			array
			(
				'field' => 'user_mail',
				'label' => 'Mail',
				'rules' => array(
							'required',
							'regex_match['.$rgxMail.']',
							'is_unique[users.user_mail]',
							'max_length[50]',
							'valid_email'),
				'errors' => array(
							'required' => 'E-mail manquant',
							'regex_match' => 'Saisie invalide',
							'is_unique' => 'Cette adresse est déjà utilisée',
							'max_length' => 'C\'est trop long !',
							'valid_email' => 'E-mail invalide')
			),

			array
			(
				'field' => 'user_password',
				'label' => 'Mot de passe',
				'rules' => array(
							'required',
							'min_length[8]',
							'regex_match['.$rgxPassword.']'),
				'errors' => array(
							'required' => 'Mot de passe manquant',
							'min_length' => '8 caractères minimum',
							'regex_match' => 'Saisie invalide')
			),

			array
			(
				'field' => 'user_passwordConfirm',
				'label' => 'Confirmer mot de passe',
				'rules' => array(
							'required',
							'regex_match['.$rgxPassword.']',
							'matches[user_password]')
							,
				'errors' => array(
							'required' => 'Confirmation du mot de passe manquante',
							'regex_match' => 'Saisie invalide',
							'matches' => 'Différent du premier mot de passe')
			),

			array
			(
				'field' => 'user_answer',
				'label' => 'Réponse à la question de sécurité',
				'rules' => array(
							'required',
							'regex_match['.$rgxMultipass.']',
							'max_length[100]'),
				'errors' => array(
							'required' => 'Entrez une réponse à la question de sécurité',
							'regex_match' => 'Saisie invalide',
							'max_length' => 'C\'est trop long !')
			),

			array
			(
				'field' => 'user_question',
				'label' => 'question',
				'rules' => array(
							'required',
							'regex_match['.$rgxMultipass.']'),
				'errors' => array(
							'required' => '...why ? It\'s for you, not us',
							'regex_match' => 'Nice try    !*HaCkErMaN*!')
			)
		),

		'signin' => array
		(
			array
			(
				'field' => 'signin_login',
				'label' => 'signin_Login',
				'rules' => array(
							'required',
							'regex_match['.$rgxLetter.']',
							'callback_exist_login'),
				'errors' => array(
							'required' => 'Login manquant', 
							'regex_match' => 'Saisie invalide')
			),

			array
			(
				'field' => 'signin_password',
				'label' => 'signin_Mot de passe',
				'rules' => array(
							'required',
							'regex_match['.$rgxPassword.']',
							'callback_password_verify'),
				'errors' => array(
							'required' => 'Mot de passe manquant',
							'regex_match' => 'Saisie invalide')
			)
		),

		'reMail' => array
		(
			array
			(
				'field' => 'mail',
				'label' => 'Mauvaise adresse ?',
				'rules' => array(
							'required',
							'regex_match['.$rgxMail.']',
							'is_unique[users.user_mail]',
							'max_length[50]',
							'valid_email'),
				'errors' => array(
							'required' => 'E-mail manquant',
							'regex_match' => 'Saisie invalide',
							'is_unique' => 'Cette adresse est déjà utilisée',
							'max_length' => 'C\'est trop long !',
							'valid_email' => 'E-mail invalide')
			)
		),

		'pwd_lost' => array
		(
			array
			(
				'field' => 'answer',
				'label' => 'Réponse à la question de sécurité',
				'rules' => array(
							// 'required',
							'regex_match['.$rgxMultipass.']',
							'max_length[100]'),
				'errors' => array(
							'required' => 'Entrez une réponse à la question de sécurité',
							'regex_match' => 'Saisie invalide',
							'max_length' => 'C\'est trop long !')
			)
		),

		'pwd_reset' => array
		(
			array
			(
				'field' => 'user_password',
				'label' => 'Nouveau mot de passe',
				'rules' => array(
							'required',
							'regex_match['.$rgxPassword.']',
							'min_length[8]'),
				'errors' => array(
							'required' => 'Mot de passe manquant',
							'regex_match' => 'Saisie invalide',
							'min_length' => '8 caractères minimum')
			),

			array
			(
				'field' => 'user_passwordConfirm',
				'label' => 'Confirmer mot de passe',
				'rules' => array(
							'required',
							'matches[user_password]')
							,
				'errors' => array(
							'required' => 'Confirmation du mot de passe manquante',
							'matches' => 'Différent du premier mot de passe')
			),
		)
	);
?>
