<div>
	<p style="font-weight: bold;">List Gallery</p>
	<br />
	<a class="add" href='<?php echo site_url(); ?>gallery/add'>Add Gallery</a>
	<br />
	<br />
	<table class="list">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($gallery as $row) { ?>
		<tr>
			<td><?php echo htmlspecialchars($row["id"], ENT_QUOTES); ?></td>
			<td><?php echo htmlspecialchars($row["name"], ENT_QUOTES); ?></td>
			<td><?php echo htmlspecialchars($row["desc"], ENT_QUOTES); ?></td>
			<td>
				<a class="delete" href="<?php echo site_url('')."gallery/delete/".$row['id']?>">X</a>&nbsp;
				<a class="edit" href="<?php echo site_url('')."gallery/edit/".$row['id']?>">Edit</a>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>