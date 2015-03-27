<div>
	<div style="padding-bottom: 15px;">
		<p style="font-weight: bold;">Edit Max_price_index</p>
	</div>
	<div style="padding-bottom: 20px;">
		<a class="add" href='<?php echo site_url(); ?>max_price_index'>Back to List</a>
	</div>
	<script>
	function validate() {
		var message  ="";
		
		if ($('#name').val() == '' || $('#name').val() == null) {
			message += 'Name should have a value\n';
		}
		
		if (message == "") {
			return true;
		} else {
			alert(message);
			return false;
		}
	}
	</script>
	<form onSubmit='return validate()' action="<?php echo site_url(); ?>max_price_index/doEdit/<?php echo $id; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label for='name'>Name</label></td>
				<td><input type='text' value='<?php echo htmlspecialchars($max_price_index['name'], ENT_QUOTES); ?>' id='name' name='name' /></td>
			</tr>
		</table>
		<div style="padding-top: 15px;">
			<input class="submit" type="submit" name="" value="Submit" />
			<input type='hidden' id='id' name='id' value='<?php echo htmlspecialchars($id, ENT_QUOTES); ?>' />
		</div>
	</form>
</div>