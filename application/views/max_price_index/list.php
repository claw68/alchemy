<div>
	<div style="padding-bottom: 15px;">
		<p style="font-weight: bold;">List Max_price_index</p>
	</div>
	<div style="padding-bottom: 20px;">
		<a class="add" href='<?php echo site_url(); ?>max_price_index/add'>Add max_price_index</a>
	</div>
	<table class="list">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($max_price_index as $row) { ?>
			<tr>
				<td><?php echo htmlspecialchars($row["id"], ENT_QUOTES); ?></td>
				<td><?php echo htmlspecialchars($row["name"], ENT_QUOTES); ?></td>
				<td>
					<a class="delete" href="<?php echo site_url('')."max_price_index/delete/".$row['id']; ?>">X</a>&nbsp;
					<a class="edit" href="<?php echo site_url('')."max_price_index/edit/".$row['id']; ?>">Edit</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>