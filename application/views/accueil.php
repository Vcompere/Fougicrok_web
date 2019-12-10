
<div class="text-center mt-3">
<?php echo form_open(); ?>
	<input type="text" name="rank_name" class="circled">
</form>
</div>

<div class="white_block_left mt-5 ombre">
	<h2 class ="text-left">Plante carnivore ?! Petite histoire de la carnivorie</h2>
	<p>		L'histoire de la carnivorie des plantes remonte à bien longtemps. Au XVème siècle, des botanistes avaient déjà répertorié certaines plantes telles que les Drosera et Pinguicula, mais sans supposer quoi que ce soit de leur étrangeté carnivore. Ce n'est qu'au XVIIIème siècle que le débat va vraiment être lancé : en 1875, Charles Darwin, après certaines expériences et travaux de recherche sur le genre Drosera, mettra en évidence la faculté de ces plantes à capturer et à assimiler une proie. On parle alors de nutrition carnivore au sein du règne végétal !<br><br>

	S'en suit une guerre scientifique, politique, voire religieuse autour de cette théorie et de son inventeur. Bien que la plupart des scientifiques aient reconnu qu'il existait une interaction nutritive entre certaines plantes et les insectes, ce n'est que pendant les années 1970 que des équipes de chercheurs purent prouver par des tests chimiques que certaines plantes digèrent leurs proies : des plantes carnivores !. La carnivorité n'est pas seulement le fait d'attraper une proie, elle inclut sa digestion, grâce à des enzymes secrétées par la plante elle-même ou grâce à des bactéries présentes dans le liquide digestif, et l'assimilation des nutriments issus de ce processus de digestion.<br>
	Aujourd’hui, on reconnaît officiellement plus de 700 plantes carnivores, appartenant à 19 genres, eux-mêmes classés en 11 familles.<p>
</div>
<div class="white_block_right ombre">
	<ul>
		<?php
		foreach ($list as $raw)
		{?>
			<div class="inline">
				<p class ="text-center"><?= $raw->prod_id ?></p>
				<p class ="text-center"><?= $raw->prod_name ?></p>
				<p class ="text-center"><?= $raw->prod_ref ?></p>
				<p class ="text-center"><?= $raw->prod_description ?></p>
				<p class ="text-center"><?= $raw->prod_price ?>€</p>
			</div>

		<?php } ?>
	</ul>
</div>
