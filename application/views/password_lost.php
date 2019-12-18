<div class="va text-center">
	<p class="succes ombre-t text-center">Mot de passe oublié ?</p>
</div>

<div class="w75 boudin_blanc ombre" id="signup_div">

	<p class="font-weigth-bold">Question de sécurité :</p>
	<p class="font-weigth-bold"><?= $user_question ?></p>
	<?= form_open('brain/password_lost') ?>
		<input type="hidden" name="login" value=<?= $user_login ?>>
		<label class="" for="anwser">Réponse :</label><br>
		<input type="text" class="input border-right-0  border-left-0  border-top-0" name="anwser" placeholder="votre réponse" value=<?= isset($_POST["answer"]) ? $_POST["answer"] : "" ?>><br>
		<span id="password_span" class="text-danger font-weight-bold"><?= isset($spanAnswer) ? $spanAnswer : form_error('answer') ?></span><br>
		<input type="submit" class="btn" value="Je m'en souviens !">


</div>

