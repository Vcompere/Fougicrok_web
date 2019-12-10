<h2 class="text-center text-white ombre-t mt-5 font-weight-bold text-uppercase"><?= $categ->cat_type ?></h2>


<!-- card produits -->
<div class="container-fluid mx-auto div_card">
	<div class="row mr-5 ml-5 mt-5 ">
		<?php
	foreach ($list as $row)
	{?>
		<div class="col-sm-3 mt-5">
			<div class="pro_card ombre w75">
				<img src="<?= base_url('assets/img/products/plants/'.$row->prod_ref.'.'.$row->prod_img) ?>" alt="<?= $row->prod_name ?>" class="rounded-circle img_card ombre" title="<?= $row->prod_name ?>">
				<p class="text-center font-weight-bolder mt-2 mb-5"><?= $row->prod_name ?></p>
				<p class="text-center my-auto"><?= $row->prod_description ?></p>
				<p class="text-center font-weight-bold text-white price_card ombre-t mx-auto"><?= $row->prod_price.' €' ?></p>
			</div>
		</div>
		<?php } ?>
	</div>
</div>