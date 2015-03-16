<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Template</title>
		
		<link rel="shortcut icon" href="<?php echo site_url(''); ?>includes/images/favicon.ico">
		<link rel="stylesheet" href="<?php echo site_url(''); ?>includes/js/jquery.ui/jquery.ui.css" />
		<link rel="stylesheet" href="<?php echo site_url(''); ?>includes/foundation/css/normalize.min.css" />
		<link rel="stylesheet" href="<?php echo site_url(''); ?>includes/foundation/css/foundation.min.css" />
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
		<script src="includes/foundation/js/vendor/modernizr.js"></script>
		
		<script src="<?php echo site_url(''); ?>includes/js/jquery.js"></script>
		<script src="<?php echo site_url(''); ?>includes/foundation/js/vendor/jquery.placeholder.js"></script>
		<script src="<?php echo site_url(''); ?>includes/js/jquery.ui/jquery.ui.js"></script>
		<script src="<?php echo site_url(''); ?>includes/foundation/js/foundation.min.js"></script>
		<script>$(document).foundation();</script>
		<script src="<?php echo site_url(''); ?>includes/js/main.js"></script>
		<script src="<?php echo site_url(''); ?>includes/foundation/js/vendor/rem.js"></script>
	</body>
</html>