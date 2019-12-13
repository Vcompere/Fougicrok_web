<?php
//Regex
$rgxLetter = "/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'-]+$/";
$rgxMulti = "/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,.-_]+$/";
$rgxMail = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
$rgxPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.-_€<>\/,;:])[A-Za-z\d@$!%*?&.-_€<>\/,;:]{8,}$/";

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
							'regex_match['.$rgxLetter.']'),
				'errors' => array(
							'required' => 'Prénom manquant', 
							'regex_match' => 'Saisie invalide')
			),

			array
			(
				'field' => 'user_name',
				'label' => 'Nom',
				'rules' => array(
							'required',
							'regex_match['.$rgxLetter.']'),
				'errors' => array(
							'required' => 'Nom manquant',
							'regex_match' => 'Saisie invalide')
			),

			array
			(
				'field' => 'user_login',
				'label' => 'Login',
				'rules' => array(
							'required',
							'regex_match['.$rgxMulti.']',
							'is_unique[users.user_login]'),
				'errors' => array(
							'required' => 'Login manquant',
							'regex_match' => 'Saisie invalide',
							'is_unique' => 'Ce nom d\'utilisateur est déjà pris')
			),

			array
			(
				'field' => 'user_mail',
				'label' => 'Mail',
				'rules' => array(
							'required',
							'regex_match['.$rgxMail.']',
							'is_unique[users.user_mail'),
				'errors' => array(
							'required' => 'E-mail manquant',
							'regex_match' => 'Saisie invalide',
							'is_unique' => 'Cette adresse est déjà utilisée')
			)

			// array
			// (
			// 	'field' => 'user_password',
			// 	'label' => 'Mot de passe',
			// 	'rules' => array(
			// 				'required' => 'Mot de passe manquant'
			// 				'regex_match['.$rgxPassword.']')
			// )
		)
	);
?>
