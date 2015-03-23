<div id="ingredients_calculator" class="row">
	<div class="page-title medium-12 columns">
		<p>Price Calculator</p>
	</div>
	<div class="medium-4 columns">
		<p>Ingredients List</p>
		<table id="calc_ingredients" class="list">
			<thead>
				<tr>
					<th>Ingredients</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($ingredients as $row) { ?>
					<tr>
						<td>
							<input type="hidden" class="id" value="<?php echo $row['id']; ?>" />
							<?php echo $row['name']; ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="medium-8 columns">
		<p>Selected Ingredients</p>
		<table id="calc_selected">
			<tr>
				<th>Primary</th>
				<th>Secondary</th>
				<th>Tertiary</th>
			</tr>
			<tr>
				<td id="primary">--</td>
				<td id="secondary">--</td>
				<td id="tertiary">--</td>
			</tr>
		</table>
		<p>Result</p>
		<table id="calc_result">
			<tr>
				<th>Effects</th>
				<th>Price</th>
			</tr>
			<tr>
				<td>--</td>
				<td>--</td>
			</tr>
			<tr>
				<td>Total</td>
				<td>--</td>
			</tr>
		</table>
	</div>
</div>