<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Template</title>
		
		<link rel="shortcut icon" href="<?php echo site_url(''); ?>includes/images/favicon.ico">
		<link rel="stylesheet" href="<?php echo site_url(''); ?>includes/js/jquery.ui/jquery.ui.css" />
		<link rel="stylesheet" href="<?php echo site_url(''); ?>includes/foundation/css/normalize.min.css" />
		<link rel="stylesheet" href="<?php echo site_url(''); ?>includes/css/main.css" />
	</head>
	<body>
		<div id="wrapper">
			<?php echo $navigation; ?>
			<div id="content">
				<?php echo $content; ?>
			</div>
			<div id="footer">
				<?php echo $footer; ?>
			</div>
		</div>
		<script src="<?php echo site_url(''); ?>includes/js/jquery.js"></script>
		<script src="<?php echo site_url(''); ?>includes/js/jquery.ui/jquery.ui.js"></script>
		<script src="<?php echo site_url(''); ?>includes/js/main.js"></script>
	</body>
</html>