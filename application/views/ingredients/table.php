<div id="ingredients_table" class="row">
	<div class="medium-12 columns" style="padding-bottom: 15px;">
		<p style="font-weight: bold;">Ingredients Table</p>
	</div>
	<div class="medium-12 columns">
		<table class="list">
			<tr>
				<th>Ingredient</th>
				<th>Primary</th>
				<th>Secondary</th>
				<th>Tertiary</th>
				<th>Quarternary</th>
			</tr>
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
				</tr>
			<?php } ?>
		</table>
	</div>
</div>