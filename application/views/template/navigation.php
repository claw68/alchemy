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
	<nav class="top-bar">
		<ul class="navigation" id="navigation">
			<?php foreach ($navigation as $nav) { ?>
			<li><a href="<?php echo site_url().$nav->url; ?>"><?php echo $nav->label; ?></a></li>
			<?php } ?>
		</ul>
	</nav>
	<div class="clearer"></div>
</div>