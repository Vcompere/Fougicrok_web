<div class="w75 boudin_blanc ombre text-center" id="signup_div">
	<p class="font-weight-bold ombre-t" id="pwdLostTitle">Réinitialiser votre mot de passe</p>

	<?= form_open('') ?>
		<div>
			<label class="hide" for="user_password">Nouveau mot de passe</label>
			<input required type="password" name="user_password" class="input border-right-0  border-left-0  border-top-0" placeholder="Nouveau mot de passe"><br>
			<span id="password_span" class="text-danger font-weight-bold"><?= form_error('user_password') ?></span><br>

			<label class="hide" for="user_passwordConfirm">Confirmer mot de passe</label>
			<input required type="password" name="user_passwordConfirm" class="input border-right-0  border-left-0  border-top-0" placeholder="Confirmer mot de passe"> <br>
			<span id="passwordConfirm_span" class="text-danger font-weight-bold"><?= form_error('user_passwordConfirm') ?></span><br>
		</div>
		<input type="submit" class="btn input"  value="Réinitialiser">
	</form>
</div>
