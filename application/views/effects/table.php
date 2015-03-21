<div id="effects_table" class="row">
	<div class="page-title medium-12 columns">
		<p>Effects Table</p>
	</div>
	<div class="medium-12 columns">
		<table class="list">
			<thead>
				<tr>
					<th>Effect</th>
					<th>Price</th>
					<th>Ingredients</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($effects as $row) { ?>
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
			</tbody>
		</table>
	</div>
</div>