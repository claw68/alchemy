<div id="ingredients_matrix" class="row">
	<?php foreach ($ingredients as $key => $ingredient) { ?>
		<?php foreach ($ingredient['secondary'] as $secondary) { ?>
			<div class="page-title medium-12 columns">
				<p><?php echo $ingredient['name']; ?> + <?php echo $secondary['name']; ?></p>
			</div>
		<?php } ?>
	<?php } ?>
	<div class="medium-12 columns">
		<a href="<?php echo site_url('/ingredients/matrix/'.($page+1).'/'.$generate); ?>">More Ingredients</a>
	</div>
</div>