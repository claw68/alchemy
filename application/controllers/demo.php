<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('demo_m', 'demo');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		$data->demo = $this->demo->all();
		
		$navigation = navigation();
		render_layout('demo/list', $data, $navigation);
	}
	
	function add()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		render_layout('demo/add', $data, $navigation);
	}
	
	function doAdd()
	{
		$post = $this->input->post();
		$this->demo->add($post);
		redirect('/demo');
	}
	
	function edit($id)
	{
		$data = new stdClass();
		$data->id = $id;
		$data->demo = $this->demo->get($id);
		if (!$data->demo)
			redirect('/demo');
		
		$navigation = navigation();
		render_layout('demo/edit', $data, $navigation);
	}
	
	function doEdit()
	{
		$post = $this->input->post();
		$this->demo->update($post["id"], $post);
		redirect('/demo');
	}
	
	function delete($id)
	{
		$this->demo->delete($id);
		redirect('/demo');
	}
}

/* End of file demo.php */
/* Location: ./application/controllers/demo.php */