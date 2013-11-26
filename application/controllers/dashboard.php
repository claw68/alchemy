<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_m', 'users');
		
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
		render_layout('dashboard/view', $data, $navigation);
	}
	
	public function profile()
	{
		$data = new stdClass();
		$user_id = $this->tank_auth->get_user_id();
		
		$data->username = $this->tank_auth->get_username();
		$data->profile = $this->users->get_profile_by_user_id($user_id);
		
		$navigation = navigation();
		render_layout('dashboard/profile', $data, $navigation);
	}
	
	public function doProfile()
	{
		$user_id = $this->tank_auth->get_user_id();
		
		$post = $this->input->post();
		$this->users->update_profile($user_id, $post);
		redirect('/dashboard');
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */