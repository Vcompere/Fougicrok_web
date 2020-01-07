<div id="basket_div" class="panier ombre w75 overflow-auto">
	<p class="basket_title ombre-t text-center"><?= empty($this->basket->get_basket()) ? 'Votre panier est vide !' : 'Votre panier :' ?></p>
	<?php
	foreach ($basket as $row)
	{?>
		<div class=''>
			<a href=<?= site_url("brain/product/".$row['element']['id']) ?>>
				<img src="<?= base_url("assets/img/products/plants/".$row['element']['ref'].".".$row['element']['img']) ?>" alt="<?= $row['element']['name'] ?>" class="rounded-circle img_basket ombre" title="<?= $row['element']['name'] ?>">
			</a>
			<p class="font-weight-bold"><?= $row['element']['name'] ?></p>
			<p class="font-weight-bold">X <?= $row['qty'] ?></p>
			<p class="font-weight-bold"><?= $row['element']['price'] ?> €</p>

			<?= form_open() ?>
				<input type="hidden" name="bask_id" value="<?= $row['element']['id'] ?>">
				<input type="submit" name="removeFromBasket" value="X">
			</form>
		</div>
	<?php } ?>
	<p class="basket_title ombre-t text-center"><?= empty($this->basket->get_basket()) ? '' : 'Payer' ?></p>
</div>
