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
					<td><?php echo htmlspecialchars($row["ingredient"], ENT_QUOTES); ?></td>
					<td><?php echo htmlspecialchars($row["primary"], ENT_QUOTES); ?></td>
					<td><?php echo htmlspecialchars($row["secondary"], ENT_QUOTES); ?></td>
					<td><?php echo htmlspecialchars($row["tertiary"], ENT_QUOTES); ?></td>
					<td><?php echo htmlspecialchars($row["quarternary"], ENT_QUOTES); ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>