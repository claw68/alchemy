<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingredients extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ingredients_m', 'ingredients');
		$this->load->model('effects_map_m', 'effects_map');
	}

	public function index()
	{
		$data = new stdClass();
		$data->ingredients = $this->ingredients->all();
		
		$navigation = navigation();
		render_layout('ingredients/list', $data, $navigation);
	}
	
	function table()
	{
		$ingredients = $this->effects_map->ingredients_table();
		
		$data = new stdClass();
		$data->ingredients = $ingredients;
		
		$navigation = navigation();
		render_layout('ingredients/table', $data, $navigation);
	}
	
	function add()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		
		render_layout('ingredients/add', $data, $navigation);
	}
	
	function doAdd()
	{
		$post = $this->input->post();
		
		$this->ingredients->add($post);
		
		redirect('/ingredients');
	}
	
	function edit($id)
	{
		$data = new stdClass();
		$data->id = $id;
		$data->ingredients = $this->ingredients->get($id);
		
		if (!$data->ingredients)
			redirect('/ingredients');
		
		$navigation = navigation();
		
		render_layout('ingredients/edit', $data, $navigation);
	}
	
	function doEdit()
	{
		$post = $this->input->post();
		
		$this->ingredients->update($post["id"], $post);
		
		redirect('/ingredients');
	}
	
	function delete($id)
	{
		$this->ingredients->delete($id);
		
		redirect('/ingredients');
	}
}

/* End of file ingredients.php */
/* Location: ./application/controllers/ingredients.php */