<div id="header">
	<script>
	$(function() {
		var activeurl = '<?php echo current_url(); ?>';
		$("#navigation > li > a").each(function() {
			if ($(this).attr('href') == activeurl)
				$(this).parent().addClass('nav-active');
		});
	});
	</script>
	<ul class="navigation" id="navigation">
		<?php foreach ($navigation as $nav) { ?>
		<li><a href="<?php echo site_url().$nav->url; ?>"><?php echo $nav->label; ?></a></li>
		<?php } ?>
	</ul>
	<?php if (isset($profile) && isset($username)) { ?>
	<ul class="navigation" id="user-info">
		<li>Logged in as: <a href="<?php echo site_url(); ?>dashboard/profile"><?php echo $username; ?></a></li>
		<li>Hi, <strong><?php echo $profile->first_name." ".$profile->last_name; ?></strong>!</li>
		<li><a href="<?php echo site_url(); ?>auth/logout">Logout</a></li>
	</ul>
	<?php } ?>
	<div class="clearer"></div>
</div>