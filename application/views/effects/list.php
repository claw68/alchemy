<div>
	<div style="padding-bottom: 15px;">
		<p style="font-weight: bold;">List Effects</p>
	</div>
	<div style="padding-bottom: 20px;">
		<a class="add" href='<?php echo site_url(); ?>effects/add'>Add effects</a>
	</div>
	<table class="list">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
		<?php foreach ($effects as $row) { ?>
			<tr>
				<td><?php echo htmlspecialchars($row["id"], ENT_QUOTES); ?></td>
				<td><?php echo htmlspecialchars($row["name"], ENT_QUOTES); ?></td>
				<td>
					<a class="delete" href="<?php echo site_url('')."effects/delete/".$row['id']; ?>">X</a>&nbsp;
					<a class="edit" href="<?php echo site_url('')."effects/edit/".$row['id']; ?>">Edit</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>