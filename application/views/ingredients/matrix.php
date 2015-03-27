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
		<div class="medium-12 columns">
			<a href="<?php echo site_url('/ingredients/matrix/'.($page+1).'/'.$generate); ?>">More Ingredients</a>
		</div>
	<?php } ?>
</div>