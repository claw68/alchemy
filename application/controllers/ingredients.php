<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ingredients extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ingredients_m', 'ingredients');
		$this->load->model('effects_map_m', 'effects_map');
		$this->load->model('effects_m', 'effects');
		$this->load->model('max_price_index_m', 'max_price');
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
			$max = $this->max_price->list_best_value_combination($row['id'], 1, true);
			$ingredients[$key]['max'] = $max[0];
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
		
		$ideal = $this->effects_map->list_ideal_ingredients($id);
		foreach ($ideal as $key => $row) {
			$ideal[$key]['effects'] = $this->effects_map->list_effects_by_two_ingredients($row['ingredient'], $id);
		}
		
		$effects = $this->effects_map->list_effects_by_ingredient($id);
		foreach ($effects as $key => $row) {
			$effects[$key]['ingredients'] = $this->effects_map->list_ingredients_by_effect_not($row['id'], $id);
			
			foreach($effects[$key]['ingredients'] as $colkey => $col) {
				$max = $this->max_price->get_max_price_by_ingredients($id, $col['id']);
				$effects[$key]['ingredients'][$colkey]['max'] = $max['price'];
				
				$effects[$key]['ingredients'][$colkey]['result'] = $this->effects_map->list_effects_combination_by_ingredients($id, $col['id']);
			}
		}
		
		$data = new stdClass();
		$data->ingredient = $ingredient;
		$data->effects = $effects;
		$data->ideal = $ideal;
		
		$navigation = navigation();
		
		render_layout('ingredients/view', $data, $navigation);
	}
	
	function tips()
	{
		//all ingredients
		$ingredients = $this->ingredients->all();
		
		//best value ingredient combination of an ingredient
		$by_ingredient = $this->_best_value($ingredients[0]['id']); //default: first ingredient
		
		//best value ingredients combination: without giant's toe
		$ingredient = $this->max_price->list_best_value_combination(false, 101);
		
		$all_ingredients = Array();
		foreach ($ingredient as $key => $row) {
			$all_ingredients[$key] = Array();
			$all_ingredients[$key][] = $this->ingredients->get($row['primary']);
			$all_ingredients[$key][] = $this->ingredients->get($row['secondary']);
			$all_ingredients[$key][] = $this->ingredients->get($row['tertiary']);
			
			$result = $this->effects_map->list_effects_combination_by_ingredients($row['primary'], $row['secondary'], $row['tertiary']);
			$all_ingredients[$key]['result'] = $result;
			$all_ingredients[$key]['price'] = array_sum(array_column($result, 'price'));
		}
		
		$data = new stdClass();
		$data->ingredients = $ingredients;
		$data->by_ingredient = $by_ingredient;
		$data->all_ingredients = $all_ingredients;
		
		$navigation = navigation();
		
		render_layout('ingredients/tips', $data, $navigation);
	}

	private function _best_value($id) 
	{
		//best value ingredient combination of an ingredient
		$info = $this->ingredients->get($id);
		$ingredient = $this->max_price->list_best_value_combination($id, 30, true);
		
		$by_ingredient = Array();
		foreach ($ingredient as $key => $row) {
			$by_ingredient[$key] = Array();
			$by_ingredient[$key][] = $this->ingredients->get($row['primary']);
			$by_ingredient[$key][] = $this->ingredients->get($row['secondary']);
			$by_ingredient[$key][] = $this->ingredients->get($row['tertiary']);
			
			$result = $this->effects_map->list_effects_combination_by_ingredients($row['primary'], $row['secondary'], $row['tertiary']);
			$by_ingredient[$key]['result'] = $result;
			$by_ingredient[$key]['price'] = array_sum(array_column($result, 'price'));
		}
		
		$data = new stdClass();
		$data->info = $info;
		$data->by_ingredient = $by_ingredient;
		
		return $this->load->view('ingredients/best_value', $data, TRUE);
	}

	function calculator($primary = 0, $secondary = 0)
	{
		$data = new stdClass();
		$data->ingredients = $this->ingredients->all();
		$data->primary = $primary;
		$data->secondary = $secondary;
		
		$navigation = navigation();
		render_layout('ingredients/calculator', $data, $navigation);
	}
	
	function calculate($primary, $secondary = 0, $tertiary = 0)
	{
		$data = new stdClass();
		
		$data->ingredients = Array();
		$data->result = Array();
		if($primary == 0 && $secondary == 0 && $tertiary == 0) {
			$data->ingredients = $this->ingredients->all();
		} else if($primary && $secondary == 0 && $tertiary == 0) {
			$ingredients = $this->effects_map->list_compatible_ingredients($primary);
			
			foreach($ingredients as $key => $secondary) {
				$max = $this->max_price->get_max_price_by_ingredients($primary, $secondary['id']);
				
				if($max)
					$ingredients[$key]['max'] = $max['price'];
				else 
					$ingredients[$key]['max'] = $secondary['price'];
			}
			
			$price = Array();
			foreach ($ingredients as $key => $row) {
				$price[$key]  = $row['max'];
			}
			
			array_multisort($price, SORT_DESC, $ingredients);
			
			$data->ingredients = $ingredients;
			$data->result = $this->effects_map->list_effects_by_ingredient($primary);
		} else if($primary && $secondary && $tertiary == 0) {
			$ingredients = $this->effects_map->list_compatible_ingredients($primary, $secondary);
			foreach ($ingredients as $key => $row) {
				$price = $this->effects_map->list_effects_combination_by_ingredients($primary, $secondary, $row['id']);
				$ingredients[$key]['price'] = array_sum(array_column($price, 'price'));
			}
			
			$price = Array();
			foreach ($ingredients as $key => $row) {
				$price[$key]  = $row['price'];
			}
			
			array_multisort($price, SORT_DESC, $ingredients);
			
			$data->ingredients = $ingredients;
			$data->result = $this->effects_map->list_effects_combination_by_ingredients($primary, $secondary);
		} else if($primary && $secondary && $tertiary) {
			$ingredients = $this->effects_map->list_compatible_ingredients($primary, $secondary);
			foreach ($ingredients as $key => $row) {
				$price = $this->effects_map->list_effects_combination_by_ingredients($primary, $secondary, $row['id']);
				$ingredients[$key]['price'] = array_sum(array_column($price, 'price'));
			}
			
			$price = Array();
			foreach ($ingredients as $key => $row) {
				$price[$key]  = $row['price'];
			}
			
			array_multisort($price, SORT_DESC, $ingredients);
			
			$data->ingredients = $ingredients;
			$data->result = $this->effects_map->list_effects_combination_by_ingredients($primary, $secondary, $tertiary);
		}
		
		echo json_encode($data);
	}

	function matrix($page = 1) {
		$limit = 5;
		$offset = ($page - 1) * $limit;
		$ingredients = $this->ingredients->all($limit, $offset);
		foreach ($ingredients as $pri_key => $primary) {
			$secondary_list = $this->effects_map->list_compatible_ingredients($primary['id']);
			$ingredients[$pri_key]['secondary'] = $secondary_list; 
		}
		
		$data = new stdClass();
		$data->page = $page;
		$data->ingredients = $ingredients;
		
		$navigation = navigation();
		render_layout('ingredients/matrix', $data, $navigation);
	}
	
	function tertiary($primary = 0, $secondary = 0) {
		if($primary != 0 && $secondary != 0) {
			$tertiary = $this->effects_map->list_compatible_ingredients($primary, $secondary);
			
			foreach ($tertiary as $key => $row) {
				$price = $this->effects_map->list_effects_combination_by_ingredients($primary, $secondary, $row['id']);
				$tertiary[$key]['price'] = array_sum(array_column($price, 'price'));
			}
			
			$price = Array();
			foreach ($tertiary as $key => $row) {
				$price[$key]  = $row['price'];
			}
			
			array_multisort($price, SORT_DESC, $tertiary);
			
			$save = Array();
			$save['primary'] = $primary;
			$save['secondary'] = $secondary;
			$save['tertiary'] = $tertiary[0]['id'];
			$save['price'] = $tertiary[0]['price'];
			
			$this->max_price->save($save);
			
			$data = new stdClass();
			$data->tertiary = $tertiary;
			
			$this->load->view('ingredients/tertiary', $data);
		}
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