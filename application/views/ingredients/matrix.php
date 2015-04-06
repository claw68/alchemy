<script src="<?php echo site_url(''); ?>includes/js/matrix.js"></script>
<div id="ingredients_matrix" class="row">
	<div class="page-title medium-12 columns">
		<p>Ingredients Matrix</p>
	</div>
	<?php foreach ($ingredients as $key => $ingredient) { ?>
		<div class="primary medium-12 columns">
			<input type="hidden" class="primary-id" value="<?php echo $ingredient['id']; ?>" />
			<p><?php echo $ingredient['name']; ?></p>
			
			<?php foreach ($ingredient['secondary'] as $secondary) { ?>
				<div class="secondary">
					<input type="hidden" class="secondary-id" value="<?php echo $secondary['id']; ?>" />
					<p><?php echo $secondary['name']; ?> <span>+</span></p>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="next medium-12 columns">
		<p><a href="<?php echo site_url('/ingredients/matrix/'.($page+1)); ?>">Next Page >></a></p>
	</div>
</div>