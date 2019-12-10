<div class="text-center mt-3 text-white">
<?php echo form_open(); ?>
	<label for="cat_id">ID</label>
	<input disabled type="text" name="cat_id" value=<?= $categ->cat_id ?>><br>
	<label for="cat_type">Catégorie</label>
	<input type="text" name="cat_type" value=<?= $categ->cat_type ?>><br>
	<label for="cat_parent">ID catégorie parent</label>
	<input type="text" name="cat_parent" value=<?= $categ->cat_parent ?>><br>
	<input type="submit" value="Modifier" class="btn btn-outline-danger btn-lg">
</form>
</div>





<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
</body>
</html>