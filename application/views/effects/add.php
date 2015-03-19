<div>
	<div style="padding-bottom: 15px;">
		<p style="font-weight: bold;">Add Effects</p>
	</div>
	<div style="padding-bottom: 20px;">
		<a class="add" href='<?php echo site_url(); ?>effects'>Back to List</a>
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
	<form onSubmit='return validate()' action="<?php echo site_url(); ?>effects/doAdd" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<table>
			<tr>
				<td><label for='name'>Name</label></td>
				<td><input type='text' value='' id='name' name='name' /></td>
			</tr>
		</table>
		<div style="padding-top: 15px;">
			<input class="submit" type="submit" name="" value="Submit" />
		</div>
	</form>
</div>