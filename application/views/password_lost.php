<div class="w75 boudin_blanc ombre text-center" id="signup_div">
	<!-- Title -->
	<p class="font-weight-bold ombre-t" id="pwdLostTitle">Mot de passe oublié ?</p>
	<!-- Show the question -->
	<p class="font-weight-bolder">Question de sécurité :</p>
	<p class="security_question font-weight-bold"><?= $result->user_question ?></p>
	<!-- form to write the answer and choose to try again or to reset the password -->
	<?= form_open('brain/password_lost') ?>
		<!-- hidden input to grab back the login for DB manipulation -->
		<input type="hidden" name="login" value=<?= $result->user_login ?>>

		<label class="" for="answer" >Réponse :</label><br>
		<input type="text" class="input border-right-0  border-left-0  border-top-0" name="answer" placeholder="votre réponse" value=<?= isset($_POST["answer"]) ? $_POST["answer"] : "" ?>><br>
		<span id="password_span" class="text-danger font-weight-bold"><?= isset($spanAnswer) ? $spanAnswer : form_error('answer') ?></span><br>
		
		<input type="submit" class="btn" name="remember" value="Je m'en souviens !">
		<input type="submit" class="btn" name="mail" value="Réinitialiser">
	</form>
</div>

