<div id="effects_table" class="row">
	<div class="page-title medium-12 columns">
		<p>Effects Table</p>
	</div>
	<div class="medium-6 columns">
		<table class="list">
			<tr>
				<th>Effect</th>
				<th>Price</th>
				<th>Ingredients</th>
			</tr>
			<?php $break = 29; ?>
			<?php foreach (array_slice ($effects, 0, $break) as $row) { ?>
				<tr>
					<td>
						<a href="<?php echo site_url("effects/view/".$row['id']); ?>">
							<?php echo htmlspecialchars($row["name"], ENT_QUOTES); ?>
						</a>	
					</td>
					<td><?php echo htmlspecialchars($row["price"], ENT_QUOTES); ?></td>
					<td>
						<?php foreach ($row['ingredients'] as $col) { ?>
							<a href="<?php echo site_url("ingredients/view/".$col['id']); ?>">
								<?php echo htmlspecialchars($col["name"], ENT_QUOTES); ?>
							</a>
							<br />
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
	<div class="medium-6 columns">
		<table class="list">
			<tr>
				<th>Effect</th>
				<th>Price</th>
				<th>Ingredients</th>
			</tr>
			<?php foreach (array_slice ($effects, $break, sizeof($effects)) as $row) { ?>
				<tr>
					<td>
						<a href="<?php echo site_url("effects/view/".$row['id']); ?>">
							<?php echo htmlspecialchars($row["name"], ENT_QUOTES); ?>
						</a>	
					</td>
					<td><?php echo htmlspecialchars($row["price"], ENT_QUOTES); ?></td>
					<td>
						<?php foreach ($row['ingredients'] as $col) { ?>
							<a href="<?php echo site_url("ingredients/view/".$col['id']); ?>">
								<?php echo htmlspecialchars($col["name"], ENT_QUOTES); ?>
							</a>
							<br />
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>