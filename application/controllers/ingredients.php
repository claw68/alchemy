<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingredients extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ingredients_m', 'ingredients');
		$this->load->model('effects_map_m', 'effects_map');
		$this->load->model('effects_m', 'effects');
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
		foreach ($ingredients as $key => $row) {
			$ingredients[$key]['best'] = $this->effects_map->list_best_effects_by_ingredient($row['id']);
		}
		
		$data = new stdClass();
		$data->ingredients = $ingredients;
		
		$navigation = navigation();
		render_layout('ingredients/table', $data, $navigation);
	}
	
	function view($id)
	{
		$ingredient = $this->ingredients->get($id);
		
		if (!$ingredient)
			redirect('/ingredients/table');
		
		$compatible = $this->effects_map->list_compatible_ingredients($id);
		foreach ($compatible as $key => $row) {
			$compatible[$key]['effects'] = $this->effects_map->list_compatible_effects($row['ingredient'], $id);
		}
		
		$effects = $this->effects_map->list_effects_by_ingredient($id);
		foreach ($effects as $key => $row) {
			$effects[$key]['ingredients'] = $this->effects_map->list_ingredients_by_effect_not($row['id'], $id);
		}
		
		$data = new stdClass();
		$data->ingredient = $ingredient;
		$data->effects = $effects;
		$data->compatible = $compatible;
		
		$navigation = navigation();
		
		render_layout('ingredients/view', $data, $navigation);
	}
	
	function tips()
	{
		//most valuable single effects
		$valuable = Array(34, 4, 6, 30, 49, 11, 38, 39, 40);
		
		$effects = Array();
		foreach ($valuable as $id) {
			$effects[] = $this->effects->get($id);
		}
		
		//best value ingredients combination: with giant's toe
		$ingredient = Array();
		$ingredient[] = Array(44, 6, 51);
		$ingredient[] = Array(44, 25, 108);
		$ingredient[] = Array(44, 12, 14);
		$ingredient[] = Array(44, 108, 87);
		$ingredient[] = Array(44, 108, 110);
		
		$with_giant = Array();
		foreach ($ingredient as $key => $ids) {
			$with_giant[$key] = Array();
			foreach ($ids as $id) {
				$with_giant[$key][] = $this->ingredients->get($id);
			}
		}
		
		//best value ingredients combination: without giant's toe
		$ingredient = Array();
		$ingredient[] = Array(22, 42, 106);
		$ingredient[] = Array(22, 66, 106);
		$ingredient[] = Array(22, 66, 70);
		$ingredient[] = Array(29, 31, 86);
		$ingredient[] = Array(25, 68, 87);
		
		$without_giant = Array();
		foreach ($ingredient as $key => $ids) {
			$without_giant[$key] = Array();
			foreach ($ids as $id) {
				$without_giant[$key][] = $this->ingredients->get($id);
			}
		}
		
		$data = new stdClass();
		$data->effects = $effects;
		$data->with_giant = $with_giant;
		$data->without_giant = $without_giant;
		
		$navigation = navigation();
		
		render_layout('ingredients/tips', $data, $navigation);
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