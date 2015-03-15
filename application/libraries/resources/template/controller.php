<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class __Object extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('__object_m', '__object');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		$data->__object = $this->__object->all();
		
		$navigation = navigation();
		render_layout('__object/list', $data, $navigation);
	}
	
	function add()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		
		render_layout('__object/add', $data, $navigation);
	}
	
	function doAdd()
	{
		$post = $this->input->post();
		
		$this->__object->add($post);
		
		redirect('/__object');
	}
	
	function edit($id)
	{
		$data = new stdClass();
		$data->id = $id;
		$data->__object = $this->__object->get($id);
		
		if (!$data->__object)
			redirect('/__object');
		
		$navigation = navigation();
		
		render_layout('__object/edit', $data, $navigation);
	}
	
	function doEdit()
	{
		$post = $this->input->post();
		
		$this->__object->update($post["id"], $post);
		
		redirect('/__object');
	}
	
	function delete($id)
	{
		$this->__object->delete($id);
		
		redirect('/__object');
	}
}

/* End of file __object.php */
/* Location: ./application/controllers/__object.php */