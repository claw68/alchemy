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
		//most valuable single effects
		$effects = $this->effects->list_by_price();
		
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
			$result = $this->effects_map->list_effects_combination_by_ingredients($ids[0], $ids[1], $ids[2]);
			$with_giant[$key]['result'] = $result;
			$with_giant[$key]['price'] = array_sum(array_column($result, 'price'));
		}
		
		$price = Array();
		foreach ($with_giant as $key => $row) {
			$price[$key] = $row['price'];
		}
		
		array_multisort($price, SORT_DESC, $with_giant);
		
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
			$result = $this->effects_map->list_effects_combination_by_ingredients($ids[0], $ids[1], $ids[2]);
			$without_giant[$key]['result'] = $result;
			$without_giant[$key]['price'] = array_sum(array_column($result, 'price'));
		}
		
		$price = Array();
		foreach ($without_giant as $key => $row) {
			$price[$key] = $row['price'];
		}
		
		array_multisort($price, SORT_DESC, $without_giant);
		
		$data = new stdClass();
		$data->effects = $effects;
		$data->with_giant = $with_giant;
		$data->without_giant = $without_giant;
		
		$navigation = navigation();
		
		render_layout('ingredients/tips', $data, $navigation);
	}

	function calculator()
	{
		$data = new stdClass();
		$data->ingredients = $this->ingredients->all();
		
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
				$ing = $this->effects_map->list_compatible_ingredients($primary, $secondary['id']);
				$max = 0;
				foreach ($ing as $colkey => $col) {
					$effects = $this->effects_map->list_effects_combination_by_ingredients($primary, $secondary['id'], $col['id']);
					$price = array_sum(array_column($effects, 'price'));
					if($price > $max)
						$max = $price;
				}
				
				$ingredients[$key]['price'] = $price;
				$ingredients[$key]['max'] = $max;
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

	function matrix($page = 1, $generate = false) {
		$limit = 5;
		$offset = ($page - 1)*$limit;
		$ingredients = $this->ingredients->all($limit, $offset);
		foreach ($ingredients as $pri_key => $primary) {
			$secondary_list = $this->effects_map->list_compatible_ingredients($primary['id']);
			$ingredients[$pri_key]['secondary'] = $secondary_list; 
			foreach ($secondary_list as $sec_key => $secondary) {
				$tertiary_list = $this->effects_map->list_compatible_ingredients($primary['id'], $secondary['id']);
				
				foreach ($tertiary_list as $ter_key => $tertiary) {
					$price = $this->effects_map->list_effects_combination_by_ingredients($primary['id'], $secondary['id'], $tertiary['id']);
					$tertiary_list[$ter_key]['price'] = array_sum(array_column($price, 'price'));
				}
				
				$price = Array();
				foreach ($tertiary_list as $ter_key => $tertiary) {
					$price[$ter_key]  = $tertiary['price'];
				}
				
				array_multisort($price, SORT_DESC, $tertiary_list);
				
				$ingredients[$pri_key]['secondary'][$sec_key]['tertiary'] = $tertiary_list;
				
				if($generate) {
					$data = Array();
					$data['primary'] = $primary['id'];
					$data['secondary'] = $secondary['id'];
					$data['tertiary'] = $tertiary_list[0]['id'];
					$data['price'] = $tertiary_list[0]['price'];
					
					$this->max_price->save($data);
				}
			}
		}
		
		$data = new stdClass();
		$data->ingredients = $ingredients;
		
		$navigation = navigation();
		render_layout('ingredients/matrix', $data, $navigation);
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