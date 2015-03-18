<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Effects_map extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('effects_map_m', 'effects_map');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		$data->effects_map = $this->effects_map->all();
		
		$navigation = navigation();
		render_layout('effects_map/list', $data, $navigation);
	}
	
	function add()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		
		render_layout('effects_map/add', $data, $navigation);
	}
	
	function doAdd()
	{
		$post = $this->input->post();
		
		$this->effects_map->add($post);
		
		redirect('/effects_map');
	}
	
	function edit($id)
	{
		$data = new stdClass();
		$data->id = $id;
		$data->effects_map = $this->effects_map->get($id);
		
		if (!$data->effects_map)
			redirect('/effects_map');
		
		$navigation = navigation();
		
		render_layout('effects_map/edit', $data, $navigation);
	}
	
	function doEdit()
	{
		$post = $this->input->post();
		
		$this->effects_map->update($post["id"], $post);
		
		redirect('/effects_map');
	}
	
	function delete($id)
	{
		$this->effects_map->delete($id);
		
		redirect('/effects_map');
	}
}

/* End of file effects_map.php */
/* Location: ./application/controllers/effects_map.php */