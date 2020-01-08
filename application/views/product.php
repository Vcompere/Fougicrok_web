<div class="boudin_blanc w75 ombre">

	<!-- item's name -->
	<h2 class="text-center text-white ombre-t mt-5 font-weight-bold text-uppercase"><?= $prod_name ?></h2>
	<!-- item's picture -->
	<img src="<?= base_url('assets/img/products/plants/'.$prod_ref.'.'.$prod_img) ?>" alt="<?= $prod_name ?>" class="rounded-circle img_card ombre" title="<?= $prod_name ?>">
	<!-- item's description -->
	<p class="text-center my-auto"><?= $prod_description ?></p>
	<!-- item's price -->
	<p class="text-center font-weight-bold text-white ombre-t mx-auto"><?= $prod_price.' €' ?></p>
	
	<!-- formulaire caché pour récupération de donnée et ajout au panier -->
		<!-- <input type="hidden" name="id" value="<?= $prod_id ?>">
		<input type="submit" name="addToBasket" value="Ajouter au panier">

	</form> -->
	<input id="basketAdd<?= $prod_id ?>" type="submit" name="addToBasket" class="basketAdd btn" value=<?= $prod_id ?>>

</div>