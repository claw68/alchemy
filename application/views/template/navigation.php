<script>
	var activeurl = '<?php echo str_replace(site_url(), '', current_url()); ?>';
	$("#navigation > li > a").each(function(){
		if($(this).attr('href') == activeurl)
			$(this).parent().addClass('nav-active');
	});
</script>
<ul class="navigation" id="navigation">
	<?php foreach($navigation as $nav) { ?>
	<li><a href="<?php echo site_url().$nav->url; ?>"><?php echo $nav->label; ?></a></li>
	<?php } ?>
</ul>