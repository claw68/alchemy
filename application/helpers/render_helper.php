<?php
	function render_layout($view, $data, $nav = Array())
	{
		$ci =& get_instance();
		$content = $ci->load->view($view, $data, TRUE);
		
		$datanav = new stdClass;
		$datanav->navigation = $nav;
		$navigation = $ci->load->view('template/navigation', $datanav, TRUE);
		$footer = $ci->load->view('template/footer', Array(), TRUE);
		$content_class = new stdClass;
		$content_class->navigation = $navigation;
		$content_class->content = $content;
		$content_class->footer = $footer;
		$ci->load->view('template/main', $content_class);
	}
?>
