<div id="ingredients_calculator" class="row">
	<div class="page-title medium-12 columns">
		<p>Ingredients List</p>
	</div>
	<div class="medium-12 columns">
		<table class="list">
			<thead>
				<tr>
					<th>Ingredient</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($ingredients as $row) { ?>
					<tr>
						<td><?php echo $row['name']; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>