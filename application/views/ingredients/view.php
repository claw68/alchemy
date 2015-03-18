<div id="ingredients_view" class="row">
	<div class="medium-12 columns">
		<p><?php echo $ingredient['name']; ?> - Effects List</p>
	</div>
	<?php foreach ($effects as $effect) { ?>
		<div class="medium-3 columns">
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
		</div>
	<?php } ?>
</div>