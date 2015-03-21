<div id="ingredients_view" class="row">
	<div class="page-title medium-12 columns">
		<p><?php echo $ingredient['name']; ?></p>
	</div>
	<div class="medium-12 columns">
		<table>
			<tr>
				<th colspan="2"><?php if(!$compatible) echo "No"; ?> Compatible Ingredients</th>
				<th>Sell Price</th>
			</tr>
			<?php foreach ($compatible as $row) { ?>
				<tr>
					<td>
						<a href="<?php echo site_url("ingredients/view/".$row['id']); ?>">
							<?php echo $row['name']; ?>
						</a>
					</td>
					<td>
						<?php $price = 0; ?>
						<?php foreach ($row['effects'] as $key => $col) { ?>
							<a href="<?php echo site_url("effects/view/".$col['id']); ?>">
								<?php echo $col['name']; if($key < sizeof($row['effects']) - 1) echo ", "; ?>
								<?php $price += $col['price'];?>
							</a>
						<?php } ?>
					</td>
					<td>
						<?php echo $price; ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<div class="page-title medium-12 columns">
		<p>Effects</p>
	</div>
	<?php foreach ($effects as $effect) { ?>
		<div class="medium-3 columns">
			<table>
				<tr>
					<th>
						<a href="<?php echo site_url("effects/view/".$effect['id']); ?>">
							<?php echo $effect['name']; ?>
							(<?php echo $effect['price']; ?>)
						</a>
					</th>
				</tr>
				<tr>
					<td>
						<?php foreach ($effect['ingredients'] as $row) { ?>
							<a href="<?php echo site_url("ingredients/view/".$row['id']); ?>">
								<?php echo $row['name']; ?>
								<?php if(sizeof($row['result']) > 1) echo '('.array_sum(array_column($row['result'], 'price')).')'; ?>
							</a><br />
						<?php } ?>
					</td>
				</tr>
			</table>
		</div>
	<?php } ?>
</div>