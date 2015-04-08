<table class="list">
	<tr>
		<th colspan="3">Best Value Ingredients Combination <?php if($info) { ?>with <?php echo $info['name']; ?> <?php } else { ?> of All Ingredients<?php } ?></th>
		<th>Sell Price</th>
	</tr>
	<?php foreach ($combinations as $row) { ?>
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