<div id="ingredients_matrix" class="row">
	<?php foreach ($ingredients as $key => $ingredient) { ?>
		<?php foreach ($ingredient['secondary'] as $secondary) { ?>
			<div class="page-title medium-12 columns">
				<p><?php echo $ingredient['name']; ?> + <?php echo $secondary['name']; ?></p>
			</div>
			<div class="medium-12 columns">
				<table>
					<tr>
						<th>Ingredients</th>
						<th>Price</th>
					</tr>
					<?php foreach ($secondary['tertiary'] as $tertiary) { ?>
						<tr>
							<td>
								<?php echo $tertiary['name']; ?>
							</td>
							<td>
								<?php echo $tertiary['price']; ?>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		<?php } ?>
	<?php } ?>
</div>