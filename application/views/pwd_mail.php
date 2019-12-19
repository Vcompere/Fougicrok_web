<?php

$message ='
			<!DOCTYPE html>
			<html lang="fr">
			 <head>
					<meta charset="UTF-8">
					<title>Fougicrok</title>
					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
					<style>
						a
						{
							display: block;
						}

						.mt-6
						{
							margin-top: 5rem;
						}

						.sml
						{
							background: none;
							border: 0 none;
							border-top: 0.5rem dotted #f8f9fa;
							height: 0;
							width: 20%;
							margin-top: 2rem;
						}

						.lrg
						{
							background: none;
							border: 0 none;
							border-top: 0.5rem dotted #f8f9fa;
							height: 0;
							width: 55%;
							margin-top: 5rem;
						}

						.mdl
						{
							background: none;
							border: 0 none;
							border-top: 0.5rem dotted #f8f9fa;
							height: 0;
							width: 35%;
							margin-top: 5rem;
						}
					</style>
			</head>
			<body class="text-center bg-dark text-info">
				<h1 class="mt-6 p">Bonjour <span class="text-warning">'.$result->user_login.'</span> !</h1>

				<hr class="sml">
				<h2 class="mt-6">Alors on a perdu son mot de passe ?!</h2>
				<h2 class="mt-5">Si la réponse est non, ignorez ce mail, autrement cliquez sur le lien ci dessous :</h2>
				<hr class= "lrg">
				<a class="text-warning h1 mt-6" href="http://localhost/fr/index.php/brain/password_reset/'.$data['user_blocked'].'" class="text-center">Réinitialiser mot de passe</a>
				<hr class= "mdl">
			</body>
			</html>';
?>