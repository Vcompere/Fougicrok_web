<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Fil rouge</title>
      	<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Bootstrap jambon core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">
		<!-- personnal css -->
        <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>">
    </head>
    <body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark transcateg-color font-weight-bolder sticky-top">

	  <!-- Navbar brand -->
	   <a class="navbar-brand" href="<?= site_url("brain/accueil"); ?>">
	    <img src="<?= base_url("assets/img/logo.png"); ?>" alt="mdb logo" class="nav_size">
	  </a>

	  <!-- Collapse button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
	    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Collapsible content -->
	  <div class="collapse navbar-collapse" id="basicExampleNav">

	    <!-- Links -->
	    <ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<?php if($this->session->rank == 'admin' || $this->session->rank == 'super_admin')
				{ ?>
					<a class="nav-link font-weight-bold" href="<?= site_url("admin/panel"); ?>">Administration</a>
				<?php } ?>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= site_url("brain/category"); ?>">Catégorie</a>
			</li>

	      <!-- Dropdown -->
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
	          aria-haspopup="true" aria-expanded="false">Produits</a>
	        
	        <div class="dropdown-menu w75 mt-1" aria-labelledby="navbarDropdownMenuLink">
	        	<?php
				foreach ($categ as $row)
				{ 
					if($row->cat_parent==0)
					{?>
		          		<a class="dropdown-item font-weight-bolder" href="<?= site_url("brain/category/".$row->cat_id) ?>"><?= $row->cat_type ?></a>
		          		<?php
		          		foreach ($categ as $key) 
		          		{
		          			if($key->cat_parent == $row->cat_id)
		          			{ ?>
		          				<a class="dropdown-item ml-3" href="<?= site_url("brain/products/".$key->cat_id) ?>"><?= $key->cat_type ?></a>
		          			<?php }
		          		}
		          	}
	          	} ?>
	        </div>

	      </li>
	    </ul>
	  </div>


	    <?php echo form_open(); ?>
	      <div class="">
	        <input class="input_header border border-right-0  border-left-0  border-top-0" type="text" placeholder="Rechercher" aria-label="Rechercher">
	      </div>
	    </form>


	<ul class="navbar-nav ml-auto nav-flex-icons">
		<li class="nav-item align-middle">
			<a href="<?= 'PANIER' ?>" class=" align-middle">
				<i class="fas fa-shopping-basket nav_size text-white my-auto"></i>
			</a>
		</li>
		<li class="nav-item avatar">
    		<a class="nav-link p-0" href="<?= site_url("brain/profile"); ?>">
  				<img src="<?= base_url('assets/img/products/plants/dio000.jpg') ?>" class="rounded-circle z-depth-0 nav_size" alt="avatar image">
			</a>
		</li>
		<a href="<?= site_url('brain/logout') ?>">Déconnexion</a>
	</ul>
	  <!-- Collapsible content -->

</nav>