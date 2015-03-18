<div id="effects_view" class="row">
	<div class="medium-12 columns">
		<p style="font-weight: bold;">Effect Ingredients List</p>
	</div>
	<div class="medium-12 columns">
		<table>
			<tr>
				<th><?php echo $effects['name']; ?></th>
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
