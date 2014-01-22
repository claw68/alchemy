<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		render_layout('generate/view', $data, $navigation);
	}
}

/* End of file generate.php */
/* Location: ./application/controllers/generate.php */