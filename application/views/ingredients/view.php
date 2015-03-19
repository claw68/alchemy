<div id="ingredients_view" class="row">
	<div class="medium-12 columns">
		<p><?php echo $ingredient['name']; ?> - Effects List</p>
	</div>
	<?php foreach ($effects as $effect) { ?>
		<div class="medium-3 columns">
			<table>
				<tr>
					<th>
						<a href="<?php echo site_url("effects/view/".$effect['id']); ?>">
							<?php echo $effect['name']; ?>
						</a>
					</th>
				</tr>
				<tr>
					<td>
						<?php foreach ($effect['ingredients'] as $row) { ?>
							<a href="<?php echo site_url("ingredients/view/".$row['id']); ?>">
								<?php echo $row['name']; ?>
							</a><br />
						<?php } ?>
					</td>
				</tr>
			</table>
		</div>
	<?php } ?>
</div>