<div>
	<p style="font-weight: bold;">Add __Object</p>
	<br />
	<a class="add" href='<?php echo site_url(); ?>__object'>Back to List</a>
	<br />
	<br />
	<script>
	function validate()
	{
		var message  ="";
		
		if($('#name').val() == '' || $('#name').val() == null)
		{
			message += 'Name should have a value\n';
		}
		
		if(message == "")
		{
			return true;
		}
		
		else
		{
			alert(message);
			return false;
		}
	}
	</script>
	<form onSubmit='return validate()' action="<?php echo site_url()?>__object/doEdit/<?php echo $id; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label for='name'>Name</label></td>
				<td><input type='text' value='<?php echo htmlspecialchars($__object['name'], ENT_QUOTES); ?>' id='name' name='name' /></td>
			</tr>
		</table>
		<br />
		<input class="submit" type="submit" name="" value="Submit" />
		<input type='hidden' id='id' name='id' value='<?php echo htmlspecialchars($id, ENT_QUOTES); ?>' />
	</form>
</div>