<div class="text-center text-danger text-weight-bold">
<h1 class="text-center">PROFIL</h1>
<p class="text-center"><?= $_SESSION['login'] ?></p>
</div>

<div class="mx-auto sign">
	<div class="nav nav-justified" role="tablist">
		<div class="bg-info nav-item">
			<a class="nav-link" id="sign_up_link" data-toggle="tab" href="#sign_up" role="tab" aria-controls="sign_up" aria-selected="true">S'inscrire</a>
		</div>
		<div class="bg-secondary nav-item">
			<a class="nav-link" id="sign_in_link" data-toggle="tab" href="#sign_in" role="tab" aria-controls="sign_in" aria-selected="false">Se connecter</a>
		</div>
	</div>

	<div class="tab-content">
			<div class="tab-pane bg-info show active" id="sign_up" role="tabpanel" aria-labelledby="sign_up_link">
				toto
			</div>

			<div class="tab-pane bg-secondary" id="sign_in" role="tabpanel" aria-labelledby="sign_in_link">
				tata
			</div>
	</div>
</div>



<!-- première version un peu foireuse -->
	<div class="mx-auto sign text-white rond">
		<ul class="nav nav-tabs nav-justified rond" id="myTab" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active  bg-danger text-white" id="sign_up-tab" data-toggle="tab" href="#sign_up" role="tab" aria-controls="home"
		      aria-selected="true">S'inscrire</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link  bg-success text-white rond" id="sign_in-tab" data-toggle="tab" href="#sign_in" role="tab" aria-controls="profile"
		      aria-selected="false">Se connecter</a>
		  </li>
		</ul>
		<div class="tab-content rond" id="myTabContent">
		  	<div class="tab-pane show  active text-center bg-danger rond" id="sign_up" role="tabpanel" aria-labelledby="sign_up-tab">
		  		<h3>Inscription</h3>
		  		<?= form_open(); ?>
		            <input type="text" name="cat_type" class="input border border-right-0  border-left-0  border-top-0" placeholder="FORMULAIRE D'INSCRIPTION"><br>
		            <input type="text" name="cat_type" class="input border border-right-0  border-left-0  border-top-0" placeholder="FORMULAIRE D'INSCRIPTION"><br>
		            <input type="text" name="cat_type" class="input border border-right-0  border-left-0  border-top-0" placeholder="FORMULAIRE D'INSCRIPTION"><br>
		          </form>
		      </div>

			  <div class="tab-pane bg-success text-center bg-success" id="sign_in" role="tabpanel" aria-labelledby="sign_in-tab">
			  	<H3>CONNEXION</H3>
			  	<?= form_open(); ?>
		            <input type="text" name="cat_type" class="input border border-right-0  border-left-0  border-top-0" placeholder="FORMULAIRE DE CONNEXION"><br>
		            <input type="text" name="cat_type" class="input border border-right-0  border-left-0  border-top-0" placeholder="FORMULAIRE DE CONNEXION"><br>
		            <input type="text" name="cat_type" class="input border border-right-0  border-left-0  border-top-0" placeholder="FORMULAIRE DE CONNEXION"><br>
		        </form>
			  </div>
		</div>
	</div>

