<div id="ingredients_tips" class="row">
	<div class="medium-12 columns">
		<p style="font-weight: bold;">Alchemy Tips</p>
	</div>
	<div class="medium-3 columns">
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
	<div class="medium-9 columns">
		<table class="list">
			<tr>
				<th colspan="3">Best Value Ingredients Combination with Giant's Toe</th>
			</tr>
			<?php foreach ($with_giant as $row) { ?>
				<tr>
					<?php foreach ($row as $key => $col) { ?>
						<td>
							<a href="<?php echo site_url("ingredients/view/".$col['id']); ?>">
								<?php echo $col['name']; ?>
							</a>
						</td>
					<?php } ?>
				</tr>
			<?php } ?>
		</table>
		<table class="list">
			<tr>
				<th colspan="3">Best Value Ingredients Combination without Giant's Toe</th>
			</tr>
			<?php foreach ($without_giant as $row) { ?>
				<tr>
					<?php foreach ($row as $key => $col) { ?>
						<td>
							<a href="<?php echo site_url("ingredients/view/".$col['id']); ?>">
								<?php echo $col['name']; ?>
							</a>
						</td>
					<?php } ?>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>