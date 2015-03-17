<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Effects extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('effects_m', 'effects');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		$data->effects = $this->effects->all();
		
		$navigation = navigation();
		render_layout('effects/list', $data, $navigation);
	}
	
	function add()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		
		render_layout('effects/add', $data, $navigation);
	}
	
	function doAdd()
	{
		$post = $this->input->post();
		
		$this->effects->add($post);
		
		redirect('/effects');
	}
	
	function edit($id)
	{
		$data = new stdClass();
		$data->id = $id;
		$data->effects = $this->effects->get($id);
		
		if (!$data->effects)
			redirect('/effects');
		
		$navigation = navigation();
		
		render_layout('effects/edit', $data, $navigation);
	}
	
	function doEdit()
	{
		$post = $this->input->post();
		
		$this->effects->update($post["id"], $post);
		
		redirect('/effects');
	}
	
	function delete($id)
	{
		$this->effects->delete($id);
		
		redirect('/effects');
	}
}

/* End of file effects.php */
/* Location: ./application/controllers/effects.php */