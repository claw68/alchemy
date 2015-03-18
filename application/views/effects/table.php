<div>
	<div style="padding-bottom: 15px;">
		<p style="font-weight: bold;">Effects Table</p>
	</div>
	<table class="list">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Ingredients</th>
		</tr>
		<?php foreach ($effects as $row) { ?>
			<tr>
				<td><?php echo htmlspecialchars($row["id"], ENT_QUOTES); ?></td>
				<td><?php echo htmlspecialchars($row["name"], ENT_QUOTES); ?></td>
				<td>
					<?php foreach ($row['ingredients'] as $col) { ?>
						<?php echo htmlspecialchars($col["name"], ENT_QUOTES); ?><br />
					<?php } ?>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>