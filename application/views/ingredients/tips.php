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
		<table class="list">
			<tr>
				<th colspan="3">Best Value Ingredients Combination of All Ingredients</th>
				<th>Sell Price</th>
			</tr>
			<?php foreach ($all_ingredients as $row) { ?>
				<tr>
					<?php foreach ($row as $key => $col) { ?>
						<td>
							<a href="<?php echo site_url("ingredients/view/".$col['id']); ?>">
								<?php echo $col['name']; ?>
							</a>
						</td>
					<?php if($key > 1) break; } ?>
					<td>
						<a href="<?php echo site_url("ingredients/calculator/".$row[0]['id']."/".$row[1]['id'])."/".$row[2]['id']; ?>">
							<?php echo array_sum(array_column($row['result'], 'price')); ?>
						</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>