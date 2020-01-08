<div <?= !isset($signup) ? 'class="w75 rond_blanc ombre"' : 'class="w75 boudin_blanc ombre"' ?> id="signup_div">
	<div id="signup" <?= !isset($signup)  ? 'class="vertical-align-middle"' : 'class="hide"' ?>>
		<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">S'inscrire</h3>
	</div>


	
	<div id="signup_form" <?= !isset($signup)  ? 'class="hide"' : 'class="show"' ?>>
		<?= form_open('brain/signup'); ?>
		<div class="container">
			<div class="row">

				<div class="col-sm text-center">
					<label class="hide" for="user_firstname">Prénom</label>
		            <input required type="text" name="user_firstname" id="user_firstname" class="form_signup input border-right-0  border-left-0  border-top-0" placeholder="Prénom" value='<?= isset($_POST["user_firstname"]) ? $_POST["user_firstname"] : "" ?>'><br>
		            <span id="user_firstname_span" class="span_signup text-danger font-weight-bold"><?= form_error('user_firstname') ?></span><br>

		            <label class="hide" for="user_login">Login</label>
					<input id="user_login" required type="text" name="user_login" class="form_signup input border-right-0  border-left-0  border-top-0" placeholder="Login" value='<?= isset($_POST["user_login"]) ? $_POST["user_login"] : "" ?>'><br>
					<span id="user_login_span" class="span_signup text-danger font-weight-bold"><?= form_error('user_login') ?></span><br>

					<label class="hide" for="user_password">Mot de passe</label>
					<input id="user_password" required type="password" name="user_password" class="form_signup input border-right-0  border-left-0  border-top-0" placeholder="Mot de passe"><br>
					<span id="user_password_span" class="span_signup text-danger font-weight-bold"><?= form_error('user_password') ?></span><br>
				</div>

				<div class="col-sm text-center">
		            <label class="hide" for="user_name">Nom</label>
					<input required  type="text" name="user_name" id="user_name" class="form_signup input border-right-0  border-left-0  border-top-0" placeholder="Nom" value='<?= isset($_POST["user_name"]) ? $_POST["user_name"] : "" ?>'><br>
					<span id="user_name_span" class="span_signup text-danger font-weight-bold"><?= form_error('user_name') ?></span><br>

					<label class="hide" for="user_mail">Mail</label>
					<input id="user_mail" required type="text" name="user_mail" class="form_signup input border-right-0  border-left-0  border-top-0" placeholder="Mail" value='<?= isset($_POST["user_mail"]) ? $_POST["user_mail"] : "" ?>'><br>
					<span id="user_mail_span" class="span_signup text-danger font-weight-bold"><?= form_error('user_mail') ?></span><br>

					<label class="hide" for="user_passwordConfirm">Confirmer mot de passe</label>
					<input id="user_passwordConfirm" required type="password" name="user_passwordConfirm" class="input border-right-0  border-left-0  border-top-0" placeholder="Confirmer mot de passe"> <br>
					<span id="passwordConfirm_span" class="span_signup text-danger font-weight-bold"><?= form_error('user_passwordConfirm') ?></span><br>
				</div>

			    <label class="hide" for="user_question">Question de sécurité :</label>
				<select name="user_question" class="form_signup question_select"  value='<?= isset($_POST["user_question"]) ? $_POST["user_question"] : "" ?>'>
					<option value="Quelle est la couleur préférée de Vincent ?">Quelle est la couleur préférée de Vincent ?</option>
					<option value="Quelle est la qualité que tu préfère chez vincent ?">Quelle est la qualité que tu préfère chez Vincent ?</option>
					<option value="À quelle fréquence rêves-tu de Vincent ?">À quelle fréquence rêves-tu de Vincent ?</option>
					<option value="Depuis quand est-tu amoureux de Vincent ?">Depuis quand est-tu amoureux de Vincent ?</option>
					<option value="J'ai plus trop d'idée de question">J'ai plus trop d'idée de question</option>
				</select>
				<span id="user_question_span" class="text-danger font-weight-bold"><?= form_error('user_question') ?></span><br>

				<label class="hide" for="user_answer">Réponse à la question de sécurité</label>
				<input id="user_answer" required type="text" name="user_answer" class="form_signup input border-right-0  border-left-0  border-top-0 fullw mt-3" placeholder="Réponse à la question de sécurité" value='<?= isset($_POST["user_answer"]) ? $_POST["user_answer"] : "" ?>'>
				<span id="user_answer_span" class="text-danger font-weight-bold"><?= form_error('user_answer') ?></span><br>

		    </div>
		    <div class="user_text-center">
				<input type="submit" class="btn" value="S'inscrire" name="signup_submit">
				<button type="button" class="btn" id="close_signup">X</button>
			</div>
			</form>
		</div>
	</div>

</div>

<div <?= !isset($signin) ? 'class="w75 rond_blanc ombre"' : 'class="w75 boudin_blanc ombre"' ?> id="signin_div">
	<div id="signin" <?= !isset($signin)  ? 'class="vertical-align-middle"' : 'class="hide"' ?>>
		<h3 class="text-center va text-white ombre-t font-weight-bold mx-auto">Se connecter</h3>
	</div>

	<div id="signin_form" <?= !isset($signin)  ? 'class="hide"' : 'class="show"' ?>>
		<?= form_open('brain/signin'); ?>
		<div class="container">
			<div class="row">
				<div class="col-sm text-center">
					<label class="hide" for="user_login">Login</label>
					<input  type="text" name="signin_login" class="input border-right-0  border-left-0  border-top-0" placeholder="Login" value='<?= isset($_POST["signin_login"]) ? $_POST["signin_login"] : "" ?>'><br>
					<span id="login_span" class="text-danger font-weight-bold"><?= isset($spanLogin) ? $spanLogin : form_error('signin_login') ?></span><br>
				</div>

				<div class="col-sm text-center">
					<label class="hide" for="user_password">Mot de passe</label>
					<input required type="password" name="signin_password" class="input border-right-0  border-left-0  border-top-0" placeholder="Mot de passe"><br>
					<span id="password_span" class="text-danger font-weight-bold"><?= form_error('signin_password') ?></span><br>
				</div>
			</div>
		</div>
		<div class="text-center">
			<input type="submit" class="btn" value="Se connecter">
			<button type="button" class="btn" id="close_signin">X</button>
		</div>
		</form>
	</div>
	
</div>
