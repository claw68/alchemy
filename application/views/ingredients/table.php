<div id="ingredients_table" class="row">
	<div class="page-title medium-12 columns">
		<p>Ingredients Table</p>
	</div>
	<div class="medium-12 columns">
		<table class="list">
			<thead>
				<tr>
					<th>Ingredient</th>
					<th>Primary</th>
					<th>Secondary</th>
					<th>Tertiary</th>
					<th>Quarternary</th>
					<th>Most Expensive</th>
					<th>Price</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($ingredients as $row) { ?>
					<tr>
						<td>
							<a href="<?php echo site_url("ingredients/view/".$row['id']); ?>">
								<?php echo htmlspecialchars($row["ingredient"], ENT_QUOTES); ?></td>
							</a>
						<td>
							<a href="<?php echo site_url("effects/view/".$row['em1id']); ?>">
								<?php echo htmlspecialchars($row["primary"], ENT_QUOTES); ?>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("effects/view/".$row['em2id']); ?>">
								<?php echo htmlspecialchars($row["secondary"], ENT_QUOTES); ?>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("effects/view/".$row['em3id']); ?>">
								<?php echo htmlspecialchars($row["tertiary"], ENT_QUOTES); ?>
							</a>
						</td>
						<td>
							<a href="<?php echo site_url("effects/view/".$row['em4id']); ?>">
								<?php echo htmlspecialchars($row["quarternary"], ENT_QUOTES); ?>
							</a>
						</td>
						<td>
							<?php foreach($row['best'] as $key => $col) { ?>
								<a href="<?php echo site_url("effects/view/".$col['eid']); ?>">
									<?php echo htmlspecialchars($col["effect_name"], ENT_QUOTES); if($key < sizeof($row['best']) - 1) echo ", "; ?>
								</a>
							<?php } ?>
						</td>
						<td>
							<?php echo htmlspecialchars($row["max_price"], ENT_QUOTES);?>
						</td>
						<td>
							<?php echo htmlspecialchars($row["price_total"], ENT_QUOTES); ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>