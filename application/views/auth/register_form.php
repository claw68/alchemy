<?php
$first_name = array(
	'name'	=> 'first_name',
	'id'	=> 'first_name',
	'value'	=> set_value('first_name'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$last_name = array(
	'name'	=> 'last_name',
	'id'	=> 'last_name',
	'value'	=> set_value('last_name'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($use_username) {
	$username = array(
		'name'	=> 'username',
		'id'	=> 'username',
		'value' => set_value('username'),
		'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
		'size'	=> 30,
	);
}
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'value' => set_value('password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$confirm_password = array(
	'name'	=> 'confirm_password',
	'id'	=> 'confirm_password',
	'value' => set_value('confirm_password'),
	'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
	'size'	=> 30,
);
$gender = array(
	'name'	=> 'gender',
	'id'	=> 'gender'
);
$gender_opt = array (
	'' => '',
	'M' => 'Male',
	'F' => 'Female'
);
$birthdate = array(
	'name'	=> 'birthdate',
	'id'	=> 'birthdate',
	'value'	=> set_value('birthdate'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$country = array(
	'name'	=> 'country',
	'id'	=> 'country',
	'value'	=> set_value('country'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$state = array(
	'name'	=> 'state',
	'id'	=> 'state',
	'value'	=> set_value('state'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<form id="register-form" action="<?php echo base_url(); ?>auth/register" method="post" accept-charset="utf-8">
	<div id="register-title">Registration</div>
	<script>
	function display_error(id,msg) {
		if(msg.length > 0) {
			$("#"+id).attr('title', msg);
			$("#"+id).css('border-color', '#FF7427');
			$("#"+id).tooltip();
		}
	}
	</script>
<table id="register-table">
	<tr>
		<td><?php echo form_label('First Name', $first_name['id']); ?></td>
		<td><?php echo form_input($first_name); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($first_name['name']); ?><?php echo isset($errors[$first_name['name']])?$errors[$first_name['name']]:''; ?>";
				display_error('first_name',msg);
			});
		</script>
	</tr>
	<tr>
		<td><?php echo form_label('Last Name', $last_name['id']); ?></td>
		<td><?php echo form_input($last_name); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($last_name['name']); ?><?php echo isset($errors[$last_name['name']])?$errors[$last_name['name']]:''; ?>";
				display_error('last_name',msg);
			});
		</script>
	</tr>
	<?php if ($use_username) { ?>
	<tr>
		<td><?php echo form_label('Username', $username['id']); ?></td>
		<td><?php echo form_input($username); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>";
				display_error('username',msg);
			});
		</script>
	</tr>
	<?php } ?>
	<tr>
		<td><?php echo form_label('Email Address', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>";
				display_error('email',msg);
			});
		</script>
	</tr>
	<tr>
		<td><?php echo form_label('Password', $password['id']); ?></td>
		<td><?php echo form_password($password); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($password['name']); ?>";
				display_error('password',msg);
			});
		</script>
	</tr>
	<tr>
		<td><?php echo form_label('Confirm Password', $confirm_password['id']); ?></td>
		<td><?php echo form_password($confirm_password); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($confirm_password['name']); ?>";
				display_error('confirm_password',msg);
			});
		</script>
	</tr>
	<tr>
		<td><?php echo form_label('Gender', $gender['id']); ?></td>
		<td><?php echo form_dropdown($gender['name'],$gender_opt,set_value('gender'),'id="'.$gender['id'].'"'); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($gender['name']); ?><?php echo isset($errors[$gender['name']])?$errors[$gender['name']]:''; ?>";
				display_error('gender',msg);
			});
		</script>
	</tr>
	<tr>
		<td><?php echo form_label('Birthdate', $birthdate['id']); ?></td>
		<td>
			<?php echo form_input($birthdate); ?>
			<script>
				$(function(){
					$('#<?php echo $birthdate['id'];?>').datepicker({
						dateFormat: 'yy-mm-dd',
						changeMonth: true,
						changeYear: true
					});
				});
			</script>
		</td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($birthdate['name']); ?><?php echo isset($errors[$birthdate['name']])?$errors[$birthdate['name']]:''; ?>";
				display_error('birthdate',msg);
			});
		</script>
	</tr>
	<tr>
		<td><?php echo form_label('Country', $country['id']); ?></td>
		<td><?php echo form_input($country); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($country['name']); ?><?php echo isset($errors[$country['name']])?$errors[$country['name']]:''; ?>";
				display_error('country',msg);
			});
		</script>
	</tr>
	<tr>
		<td><?php echo form_label('State', $state['id']); ?></td>
		<td><?php echo form_input($state); ?></td>
		<script>
			$(function(){
				var msg = "<?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?>";
				display_error('state',msg);
			});
		</script>
	</tr>

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>
</table>
<?php echo form_submit('register', 'Register'); ?>
<?php echo form_close(); ?>