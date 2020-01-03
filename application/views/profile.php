<h2 class="text-center text-white ombre-t mt-5 font-weight-bold text-uppercase">Mon compte</h2>
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

<div class="hide tab_panel w75 rounded mx-auto ombre p-3" id="info_profile_div">
	<p class="inline font-weight-bolder">Nom :</p>
	<p class="inline font-weight-bold"><?= $info->user_name ?></p><br>

	<p class="inline font-weight-bolder">Prénom :</p>
	<p class="inline font-weight-bold"><?= $info->user_firstname ?></p><br>

	<p class="inline font-weight-bolder">Login :</p>
	<p class="inline font-weight-bold"><?= $info->user_login ?></p><br>

	<p class="inline font-weight-bolder">E-mail :</p>
	<p class="inline font-weight-bold"><?= $info->user_mail ?></p><br>

	<p class="inline font-weight-bolder">Téléphone :</p>
	<?php if ($info->user_phone == NULL)
	{ ?>
		<div id="phone_div">
		<p id="phone_label" class="inline font-weight-bold text-danger">Aucun numéro renseigné !</p>
		<p id="phone_btn" class="inline btn">Ajouter un numéro</p>
	</div>
		<input id="phone_field" required type="text" name="user_phone" class="input border-right-0  border-left-0  border-top-0  hide" placeholder="Téléphone" value='<?= isset($_POST["user_phone"]) ? $_POST["user_phone"] : "" ?>'><br>
	<?php }
	else
	{ ?>
		<p class="inline font-weight-bold"><?= $info->user_phone ?></p><br>
	<?php } ?>

	<p class="inline font-weight-bolder">Dernière connexion :</p>
	<p class="inline font-weight-bold"><?= $info->user_cDate ?></p><br>
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