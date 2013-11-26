<div>
	Profile
	<br />
	<br />
	<script>
	function validate()
	{
		var message  ="";
		
		if($('#first_name').val() == '' || $('#first_name').val() == null)
		{
			message += 'First Name should have a value\n';
		}
		
		if($('#last_name').val() == '' || $('#last_name').val() == null)
		{
			message += 'Last Name should have a value\n';
		}
		
		if($('#gender').val() == '' || $('#gender').val() == null)
		{
			message += 'Gender should have a value\n';
		}
		
		if($('#birthdate').val() == '' || $('#birthdate').val() == null)
		{
			message += 'Birthdate should have a value\n';
		}
		
		if($('#country').val() == '' || $('#country').val() == null)
		{
			message += 'Country should have a value\n';
		}
		
		if($('#state').val() == '' || $('#state').val() == null)
		{
			message += 'State should have a value\n';
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
	<form onSubmit='return validate()' action="<?php echo site_url(); ?>dashboard/doProfile" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Field</th>
				<th>Value</th>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" value="<?php echo $profile->first_name; ?>" id="first_name" name="first_name" /></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" value="<?php echo $profile->last_name; ?>" id="last_name" name="last_name" /></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<select id="gender" name="gender">
						<option value=""></option>
						<option value="M">Male</option>
						<option value="F">Female</option>
					</select>
					<script>
						$(function(){
							$('#gender').val('<?php echo $profile->gender; ?>');
						});
					</script>
				</td>
			</tr>
			<tr>
				<td>Birthdate</td>
				<td>
					<input type="text" value="<?php echo $profile->birthdate; ?>" id="birthdate" name="birthdate" />
					<script>
						$(function(){
							$('#birthdate').datepicker({
								dateFormat: 'yy-mm-dd',
								changeMonth: true,
								changeYear: true
							});
						});
					</script>
				</td>
			</tr>
			<tr>
				<td>Country</td>
				<td><input type="text" value="<?php echo $profile->country; ?>" id="country" name="country" /></td>
			</tr>
			<tr>
				<td>State</td>
				<td><input type="text" value="<?php echo $profile->state; ?>" id="state" name="state" /></td>
			</tr>
		</table>
		<br />
		<input type="submit" class="submit" value="Submit" />
	</form>
</div>