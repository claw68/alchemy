<div id="effects_view" class="row">
	<div class="medium-12 columns">
		<p><?php echo $effect['name']; ?> - Ingredients List</p>
	</div>
	<div class="medium-12 columns">
		<table>
			<tr>
				<th><?php echo $effect['name']; ?></th>
			</tr>
			<tr>
				<td>
					<?php foreach ($ingredients as $row) { ?>
						<?php echo $row['name']; ?><br />
					<?php } ?>
				</td>
			</tr>
		</table>
	</div>
</div>
