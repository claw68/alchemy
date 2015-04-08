<script src="<?php echo site_url(''); ?>includes/js/tips.js"></script>
<div id="ingredients_tips" class="row">
	<div class="page-title medium-12 columns">
		<p>Alchemy Tips</p>
	</div>
	<div class="medium-4 large-3 columns">
		<table class="list">
			<tr>
				<th>Ingredients</th>
			</tr>
			<?php foreach ($ingredients as $row) { ?>
				<tr>
					<td>
						<a href="<?php echo site_url("ingredients/view/".$row['id']); ?>">
							<?php echo $row['name']; ?>
						</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<div class="medium-8 large-9 columns">
		<table class="list">
			<tr>
				<th colspan="3">Best Value Ingredients Combination with <?php echo $current_ingredient['name']; ?></th>
				<th>Sell Price</th>
			</tr>
			<?php foreach ($by_ingredient as $row) { ?>
				<tr>
					<?php foreach ($row as $key => $col) { ?>
						<td>
							<a href="<?php echo site_url("ingredients/view/".$col['id']); ?>">
								<?php echo $col['name']; ?>
							</a>
						</td>
					<?php if($key > 1) break; } ?>
					<td>
						<?php echo array_sum(array_column($row['result'], 'price')); ?>
					</td>
				</tr>
			<?php } ?>
		</table>
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
						<?php echo array_sum(array_column($row['result'], 'price')); ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>