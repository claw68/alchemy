<?php
	function navigation()
	{
		$navigation = Array();
		$navigation[] = (object) Array('url' => 'dashboard', 'label' => 'Dashboard');
		$navigation[] = (object) Array('url' => 'demo', 'label' => 'Demo');
		return $navigation;
	}
?>
