<h2 class="text-center text-white ombre-t mt-5 font-weight-bold text-uppercase"><?= "Mon compte".$_SESSION['login'] ?></h2>
<?php var_dump($_SESSION['cDate']) ?>

<div class="row">
	<div id="info_profile_btn" class="w75 rond_blanc ombre ml-auto">
		<div class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Informations personnelles</h3>
		</div>
	</div>
	<div id="adress_profile_btn" class="w75 rond_blanc ombre ">
		<div class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Mes adresses</h3>
		</div>
	</div>
	<div id="orders_profile_btn" class="w75 rond_blanc ombre mr-auto">
		<div class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Mes commandes</h3>
		</div>
	</div>
</div>

<div class="hide tab_panel w75 rounded mx-auto ombre inline font-weight-bold p-3" id="info_profile_div">
	<p class="inline">Nom :</p>
	<p class="inline"><?= $_SESSION['name'] ?></p><br>

	<p class="inline">Prénom :</p>
	<p class="inline"><?= $_SESSION['firstname'] ?></p><br>

	<p class="inline">Login :</p>
	<p class="inline"><?= $_SESSION['login'] ?></p><br>

	<p class="inline">E-mail :</p>
	<p class="inline"><?= $_SESSION['mail'] ?></p><br>

	<p class="inline">Dernière connexion :</p>
	<p class="inline"><?= $_SESSION['cDate'] ?></p><br>
</div>

<div class="hide tab_panel w75 rounded mx-auto ombre" id="adress_profile_div">
	<table class="table table-striped text-center vincent">
		TO DO
	</table>
</div>

<div class="hide tab_panel w75 rounded mx-auto ombre" id="orders_profile_div">
	<table class="table table-striped text-center vincent">
		TO DO
	</table>
</div>