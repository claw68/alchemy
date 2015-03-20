<div id="ingredients_tips" class="row">
	<div class="medium-12 columns">
		<p>Alchemy Tips</p>
	</div>
	<div class="medium-12 columns">
		<table class="list">
			<tr>
				<th>Most Valuable Single Effects</th>
			</tr>
			<?php foreach ($effects as $row) { ?>
				<tr>
					<td>
						<a href="<?php echo site_url("effects/view/".$row['id']); ?>">
							<?php echo $row['name']; ?>
						</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>