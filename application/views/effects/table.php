<div id="effects_table" class="row">
	<div class="medium-12 columns" style="padding-bottom: 15px;">
		<p style="font-weight: bold;">Effects Table</p>
	</div>
	<div class="medium-6 columns">
		<table class="list">
			<tr>
				<th>Effect</th>
				<th>Ingredients</th>
			</tr>
			<?php $break = 29; ?>
			<?php foreach (array_slice ($effects, 0, $break) as $row) { ?>
				<tr>
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
	<div class="medium-6 columns">
		<table class="list">
			<tr>
				<th>Effect</th>
				<th>Ingredients</th>
			</tr>
			<?php foreach (array_slice ($effects, $break, sizeof($effects)) as $row) { ?>
				<tr>
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
</div>