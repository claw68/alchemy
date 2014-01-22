<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Object extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('object_m', 'object');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		$data->object = $this->object->all();
		
		$navigation = navigation();
		render_layout('object/list', $data, $navigation);
	}
	
	function add()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		render_layout('object/add', $data, $navigation);
	}
	
	function doAdd()
	{
		$post = $this->input->post();
		$this->object->add($post);
		redirect('/object');
	}
	
	function edit($id)
	{
		$data = new stdClass();
		$data->id = $id;
		$data->object = $this->object->get($id);
		if(!$data->object)
			redirect('/object');
		
		$navigation = navigation();
		render_layout('object/edit', $data, $navigation);
	}
	
	function doEdit()
	{
		$post = $this->input->post();
		$this->object->update($post["id"], $post);
		redirect('/object');
	}
	
	function delete($id)
	{
		$this->object->delete($id);
		redirect('/object');
	}
}

/* End of file object.php */
/* Location: ./application/controllers/object.php */