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
		$user_id = $this->tank_auth->get_user_id();
		
		$data->username = $this->tank_auth->get_username();
		$data->profile = $this->users->get_profile_by_user_id($user_id);
		
		$navigation = navigation();
		render_layout('generate/view', $data, $navigation);
	}
}

/* End of file generate.php */
/* Location: ./application/controllers/generate.php */