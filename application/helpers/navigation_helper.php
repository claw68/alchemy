<?php
	function navigation()
	{
		$navigation = Array();
		$navigation[] = (object) Array('url' => 'dashboard', 'label' => 'Dashboard');
		$navigation[] = (object) Array('url' => 'dashboard/profile', 'label' => 'Profile');
		$navigation[] = (object) Array('url' => 'object', 'label' => 'Object');
		$navigation[] = (object) Array('url' => 'demo', 'label' => 'Demo');
		$navigation[] = (object) Array('url' => 'gallery', 'label' => 'Gallery');
		return $navigation;
	}
?>
