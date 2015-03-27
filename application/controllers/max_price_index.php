<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Max_price_index extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('max_price_index_m', 'max_price_index');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		$data->max_price_index = $this->max_price_index->all();
		
		$navigation = navigation();
		render_layout('max_price_index/list', $data, $navigation);
	}
	
	function add()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		
		render_layout('max_price_index/add', $data, $navigation);
	}
	
	function doAdd()
	{
		$post = $this->input->post();
		
		$this->max_price_index->add($post);
		
		redirect('/max_price_index');
	}
	
	function edit($id)
	{
		$data = new stdClass();
		$data->id = $id;
		$data->max_price_index = $this->max_price_index->get($id);
		
		if (!$data->max_price_index)
			redirect('/max_price_index');
		
		$navigation = navigation();
		
		render_layout('max_price_index/edit', $data, $navigation);
	}
	
	function doEdit()
	{
		$post = $this->input->post();
		
		$this->max_price_index->update($post["id"], $post);
		
		redirect('/max_price_index');
	}
	
	function delete($id)
	{
		$this->max_price_index->delete($id);
		
		redirect('/max_price_index');
	}
}

/* End of file max_price_index.php */
/* Location: ./application/controllers/max_price_index.php */