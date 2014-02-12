<div>
	<p style="font-weight: bold;">List Demo</p>
	<br />
	<a class="add" href='<?php echo site_url(); ?>demo/add'>Add Demo</a>
	<br />
	<br />
	<table class="list">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($demo as $row) { ?>
		<tr>
			<td><?php echo htmlspecialchars($row["id"], ENT_QUOTES); ?></td>
			<td><?php echo htmlspecialchars($row["name"], ENT_QUOTES); ?></td>
			<td>
				<a class="delete" href="<?php echo site_url('')."demo/delete/".$row['id']?>">X</a>&nbsp;
				<a class="edit" href="<?php echo site_url('')."demo/edit/".$row['id']?>">Edit</a>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>