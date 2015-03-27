<div id="ingredients_matrix" class="row">
	<?php foreach ($ingredients as $key => $ingredient) { ?>
		<div class="page-title medium-12 columns">
			<p><?php echo $ingredient['name']; ?></p>
		</div>
		<div class="medium-12 columns">
			<table>
				<tr>
					<th>Compatible Ingredients</th>
					<th>Price</th>
				</tr>
				<?php foreach ($ingredient['secondary'] as $secondary) { ?>
					<tr>
						<td>
							<a href="<?php echo site_url("ingredients/view/".$secondary['id']); ?>">
								<?php echo $secondary['name']; ?>
							</a>
						</td>
						<td>
							<?php echo $secondary['price']; ?>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } ?>
</div>