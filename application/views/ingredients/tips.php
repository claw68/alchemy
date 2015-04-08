<script src="<?php echo site_url(''); ?>includes/js/tips.js"></script>
<div id="ingredients_tips" class="row">
	<div class="page-title medium-12 columns">
		<p>Alchemy Tips</p>
	</div>
	<div class="medium-4 large-3 columns">
		<table id="select_ingredient_tips" class="list">
			<tr>
				<th>Select Ingredient for Tips</th>
			</tr>
			<?php foreach ($ingredients as $row) { ?>
				<tr>
					<td>
						<input type="hidden" class="id" value="<?php echo $row['id']; ?>" />
						<?php echo $row['name']; ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<div class="medium-8 large-9 columns">
		<div id="by_ingredient_cont">
			<?php echo $by_ingredient; ?>
		</div>
		<?php echo $all_ingredients; ?>
	</div>
</div>