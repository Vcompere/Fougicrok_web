
<div class="text-center mt-3">
<?php echo form_open(); ?>
	<input type="text" name="cat_type" class="circled">
	<input type="text" name="cat_parent">
	<input type="submit">
</form>
</div>
<div class="white_block_right">
	<?php
	foreach ($list as $row)
	{?>
	<div class="d-flex" style="margin-left: 40%">
      <a href="<?= site_url('brain/categ_modif/'.$row->cat_id); ?>"><button type="button"class="btn btn-outline-black btn-lg ml-3">Modifier</button></a>
			<h3 class = "text-center ml-2"><?= $row->cat_id ?></h3>
			<h3 class ="text-center ml-2"><?= $row->cat_type ?></h3>
			<h3 class ="text-center ml-2"><?= $row->cat_parent ?></h3>
			<button type="button" id="deleteButton" class="btn btn-outline-danger btn-lg ml-3" value="supprimer" data-toggle="modal" data-target="#confirm<?= $row->cat_id ?>">Supprimer</button>
	</div>

    <div class="modal fade bd-example-modal-lg gif" id="confirm<?= $row->cat_id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class=" modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <div class="modal-header bg-danger text-center ">
            <h5 class="tC modal-title text-white font-weight-bold " id="exampleModalLabel"><?= $row->cat_type ?></h5>
          </div>

          <div class="modal-body bg-light">
            <p class="font-weight-bold">Vous êtes sur le point de supprimer un produit de manière définitive!</p>
            <?php echo form_open('brain/delete'); ?>
              <label class="mt-3" for="idH"></label>
              <input type="hidden" name="idH" id="<?= $row->cat_id ?>" class="form-control" value=<?= $row->cat_id; ?>>
            <button type="button" class="btn btn-outline-info bordLarge btn-lg font-weight-bold" data-dismiss="modal">Annuler</button>
            <button type="submit"  name="delete" class="btn btn-outline-danger bordLarge ml-2 btn-lg font-weight-bold">Confirmer</button>
            </form>
          </div>
        </div>
      </div>
    </div>

	<?php } ?>
</div>