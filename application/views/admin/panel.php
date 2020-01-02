<div class="row">
	<div id="users_btn" class="w75 rond_blanc ombre ml-5">
		<div class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Utilisateurs</h3>
		</div>
	</div>
	<div id="products_btn" class="w75 rond_blanc ombre">
		<div class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Produits</h3>
		</div>
	</div>
	<div id="categ_btn" class="w75 rond_blanc ombre">
		<div class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Catégories</h3>
		</div>
	</div>
	<div class="w75 rond_blanc ombre">
		<div id="rank_btn" class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Grades</h3>
		</div>
	</div>
	<div id="orders_btn" class="w75 rond_blanc ombre">
		<div class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Commandes</h3>
		</div>
	</div>
	<div id="discount_btn" class="w75 rond_blanc ombre mr-5">
		<div class="vertical-align-middle">
			<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Codes promo</h3>
		</div>
	</div>
</div>

<!-- tableau/liste des utilisateurs -->
<div class="hide tab_panel w75 rounded mx-auto ombre" id="users_div">
	<table class="table table-striped text-center vincent">
		<thead>
			<tr class="w75">
				<th scope='col'>Login</th>
				<th scope='col'>Prénom</th>
				<th scope='col'>Nom</th>
				<th scope='col'>Mail</th>
				<th scope='col'>Téléphone</th>
				<th scope='col'>Date d'inscription</th>
				<th scope='col'>Dernière connexion</th>
				<th scope='col'>Compteur d'erreurs MDP</th>
				<th scope='col'>Compte bloqué</th>
				<th scope='col'>Grade</th>
			</tr>
		</thead>
		<?php foreach ($users as $row)
		{ ?>
			<tr class="font-weight-bold">
				<td class="font-weight-bold"><?= $row->user_login ?></td>
				<td class="font-weight-bold"><?= $row->user_firstname ?></td>
				<td class="font-weight-bold"><?= $row->user_name ?></td>
				<td class="font-weight-bold"><?= $row->user_mail ?></td>
				<td class="font-weight-bold"><?= $row->user_phone ?></td>
				<td class="font-weight-bold"><?= $row->user_sDate ?></td>
				<td class="font-weight-bold"><?= $row->user_cDate ?></td>
				<td class="font-weight-bold"><?= $row->user_try ?></td>
				<td class="font-weight-bold"><?= $row->user_blocked == NULL ? '' : 'Bloqué' ?></td>
				<td class="font-weight-bold"><?= $row->rank_name ?></td>
			</tr>
		<?php } ?>
	</table>
</div>

<!-- tableau/liste des produits -->
<div class="hide tab_panel w75 rounded mx-auto ombre" id="products_div">
	<table class="table table-striped text-center vincent">
		<thead>
			<tr class="w75">
				<th scope='col'>Visuel</th>
				<th scope='col'>Nom du produit</th>
				<th scope='col'>Référence</th>
				<th scope='col'>Description</th>
				<th scope='col'>Prix</th>
				<th scope='col'>Stock</th>
				<th scope='col'>Date d'ajout</th>
				<th scope='col'>Dernière modification</th>
				<th scope='col'>Catégorie :</th>
				<th scope='col'>Nombre d'achats</th>
			</tr>
		</thead>
		<?php foreach ($products as $row)
		{ ?>
			<tr class="font-weight-bold">
				<td><img src="<?= base_url('assets/img/products/plants/'.$row->prod_ref.'.'.$row->prod_img) ?>" alt="<?= $row->prod_name ?>" class="rounded-circle img_tab ombre" title="<?= $row->prod_name ?>"></td>
				<td class="font-weight-bold"><?= $row->prod_name ?></td>
				<td class="font-weight-bold"><?= $row->prod_ref ?></td>
				<td class="font-weight-bold"><?= $row->prod_description ?></td>
				<td class="font-weight-bold"><?= $row->prod_price ?> €</td>
				<td class="font-weight-bold"><?= $row->prod_stock ?></td>
				<td class="font-weight-bold"><?= $row->prod_adding ?></td>
				<td class="font-weight-bold"><?= $row->prod_update ?></td>
				<td class="font-weight-bold"><?= $row->cat_type ?></td>
				<td class="font-weight-bold text-danger">TO DO</td>
				
			</tr>
		<?php } ?>
	</table>
</div>

<!-- tableau/liste des catégories -->
<div class="hide tab_panel w75 rounded mx-auto ombre" id="categ_div">
	<table class="table table-striped text-center vincent">
		<thead>
			<tr class="w75">
				<th scope='col'>ID</th>
				<th scope='col'>Catégorie</th>
				<th scope='col'>ID catégorie parent</th>
			</tr>
		</thead>
		<?php foreach ($Category as $row)
		{ ?>
			<tr class="font-weight-bold">
	
				<td class="font-weight-bold"><?= $row->cat_id ?></td>
				<td class="font-weight-bold"><?= $row->cat_type ?></td>
				<td class="font-weight-bold"><?= $row->cat_parent ?></td>
				
			</tr>
		<?php } ?>
	</table>
</div>

<!-- tableau/liste des grades -->
<div class="hide tab_panel w75 rounded mx-auto ombre" id="rank_div">
	<table class="table table-striped text-center vincent">
		<thead>
			<tr class="w75">
				<th scope='col'>ID</th>
				<th scope='col'>Grade</th>
			</tr>
		</thead>
		<?php foreach ($Ranks as $row)
		{ ?>
			<tr class="font-weight-bold">
	
				<td class="font-weight-bold"><?= $row->rank_id ?></td>
				<td class="font-weight-bold"><?= $row->rank_name ?></td>
				
			</tr>
		<?php } ?>
	</table>
</div>

<!-- tableau/liste des commandes -->
<div class="hide tab_panel w75 rounded mx-auto ombre" id="orders_div">
	<table class="table table-striped text-center vincent">
		TO DO
	</table>
</div>

<!-- tableau/liste des codes promo -->
<div class="hide tab_panel w75 rounded mx-auto ombre" id="discount_div">
	<table class="table table-striped text-center vincent">
		<thead>
			<tr class="w75">
				<th scope='col'>Valeur de la promo</th>
				<th scope='col'>Code</th>
				<th scope='col'>Nombre d'utilisation</th>
			</tr>
		</thead>
		<?php foreach ($Discount as $row)
		{ ?>
			<tr class="font-weight-bold">
	
				<td class="font-weight-bold"><?= '-'.$row->disc_value.'%' ?></td>
				<td class="font-weight-bold"><?= $row->disc_code ?></td>
				<td class="font-weight-bold"><?= $row->disc_uses ?></td>
				
			</tr>
		<?php } ?>
	</table>
</div>