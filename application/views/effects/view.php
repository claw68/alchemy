<div id="effects_view" class="row">
	<div class="medium-12 columns">
		<p><?php echo $effect['name']; ?></p>
	</div>
	<div class="medium-12 columns">
		<table>
			<tr>
				<th>Ingredients List</th>
			</tr>
			<tr>
				<td>
				<?php foreach ($ingredients as $row) { ?>
					<a href="<?php echo site_url("ingredients/view/".$effect['id']); ?>">
						<?php echo $row['name']; ?>
					</a><br />
				<?php } ?>
				</td>
			</tr>
		</table>
	</div>
</div>
