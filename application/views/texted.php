<div class="va text-center">
	<p class="succes ombre-t text-center"><?= $msg ?></p>

	<?php
	if(isset($reMail))
	{
		echo form_open('brain/reMail') ?>
			<input type="hidden" name="blocked" value=<?= $blocked ?>>
			<input type="hidden" name="login" value=<?= $login ?>>
			<input type="hidden" name="oriMail" value=<?= $mail ?>>
			<label class="mt-5" for="mail">Mauvaise adresse ?</label><br>
			<input type="text" class="input border-right-0  border-left-0  border-top-0" name="mail" value=<?= $mail ?>><br>
			<span id="password_span" class="text-danger font-weight-bold"><?= form_error('mail') ?></span><br>
			<input type="submit" class="btn" value="Renvoyer un mail">
		</form>
	<?php } ?>
</div>


