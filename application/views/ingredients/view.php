<div id="ingredients_view" class="row">
	<div class="medium-12 columns">
		<p><?php echo $ingredient['name']; ?> - Effects List</p>
	</div>
	<div class="medium-12 columns">
		<?php foreach ($effects as $effect) { ?>
			<table>
				<tr>
					<th><?php echo $effect['name']; ?></th>
				</tr>
				<tr>
					<td>
						<?php foreach ($effect['ingredients'] as $row) { ?>
							<?php echo $row['name']; ?><br />
						<?php } ?>
					</td>
				</tr>
			</table>
		<?php } ?>
	</div>
</div>