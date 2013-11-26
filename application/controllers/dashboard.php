<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
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
		render_layout('dashboard/view', $data, $navigation);
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */