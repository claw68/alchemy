<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Effects extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('effects_m', 'effects');
		$this->load->model('effects_map_m', 'effects_map');
	}

	public function index()
	{
		$data = new stdClass();
		$data->effects = $this->effects->all();
		
		$navigation = navigation();
		render_layout('effects/list', $data, $navigation);
	}
	
	function table()
	{
		$effects = $this->effects->all();
		
		foreach ($effects as $key => $row) {
			$effects[$key]['ingredients'] = $this->effects_map->list_ingredients_by_effect($row['id']);
		}
		
		$data = new stdClass();
		$data->effects = $effects;
		
		$navigation = navigation();
		render_layout('effects/table', $data, $navigation);
	}
	
	function view($id){
		$effect = $this->effects->get($id);
		
		if (!$effect)
			redirect('/effects/table');
		
		$ingredients = $this->effects_map->list_ingredients_by_effect($id);
		
		$data = new stdClass();
		$data->effect = $effect;
		$data->ingredients = $ingredients;
		
		$navigation = navigation();
		
		render_layout('effects/view', $data, $navigation);
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