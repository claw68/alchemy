<?php
	function navigation()
	{
		$navigation = Array();
		$navigation[] = (object) Array('url' => 'ingredients/table', 'label' => 'Ingredients');
		$navigation[] = (object) Array('url' => 'effects/table', 'label' => 'Effects');
		$navigation[] = (object) Array('url' => 'ingredients/tips', 'label' => 'Tips');
		return $navigation;
	}
?>
