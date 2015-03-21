<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Effects_map_m extends CI_Model 
{
	var $table = 'effects_map';
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function _strip_keys($data)
	{
		$allowed_keys = $this->db->list_fields($this->table);
		
		foreach ($data as $key => $value) {
			if (!in_array($key, $allowed_keys))
				unset($data[$key]);
		}
		
		return $data;
	}
	
	function delete($id)
	{
		$this->db->delete($this->table, array('id' => $id));
	}
	
	function add($data)
	{
		$data = $this->_strip_keys($data);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	
	function all()
	{
		$query = $this->db->get($this->table);
		$results =  $query->result_array();
		return $results;
	}
	
	function ingredients_table()
	{
		$sql = "
			SELECT
				i.id,
				i.name AS ingredient,
				(em1.price + em2.price + em3.price + em4.price) AS price_total,
				em_max.eid AS max_id,
				em_max.effect_name AS max_name,
				em_max.price AS max_price,
				em1.eid as em1id, em1.`effect_name` AS `primary`,
				em2.eid as em2id, em2.`effect_name` AS secondary,
				em3.eid as em3id, em3.`effect_name` AS tertiary,
				em4.eid as em4id, em4.`effect_name` AS quarternary
			FROM
				ingredients i
					LEFT JOIN (
						SELECT 
							em.*, e.`name` AS effect_name, e.id AS eid, e.price
						FROM effects_map em, effects e 
						WHERE em.`effect` = e.`id`) em1 
						ON i.`id` = em1.`ingredient` AND em1.`position` = 1
					
					LEFT JOIN (
						SELECT
							em.*, e.`name` AS effect_name, e.id AS eid, e.price
						FROM effects_map em, effects e 
						WHERE em.`effect` = e.`id`) em2
						ON i.`id` = em2.`ingredient` AND em2.`position` = 2
						
					LEFT JOIN (
						SELECT
							em.*, e.`name` AS effect_name, e.id AS eid, e.price
						FROM effects_map em, effects e
						WHERE em.`effect` = e.`id`) em3 
						ON i.`id` = em3.`ingredient` AND em3.`position` = 3
					
					LEFT JOIN (
						SELECT 
							em.*, e.`name` AS effect_name, e.id AS eid, e.price
						FROM effects_map em, effects e
						WHERE em.`effect` = e.`id`) em4 
						ON i.`id` = em4.`ingredient` AND em4.`position` = 4
					LEFT JOIN (
						SELECT
							em.*, e.`name` AS effect_name, e.id AS eid, e.price
						FROM effects e, effects_map em 
							LEFT JOIN (
								SELECT em.`ingredient`, MAX(e.`price`) price
								FROM effects_map em, effects e
								WHERE em.`effect` = e.`id` 
								GROUP BY em.`ingredient`
							) emax
							ON em.`ingredient` = emax.ingredient
						WHERE em.`effect` = e.`id` AND e.`price` = emax.price
						GROUP BY em.`ingredient`
						) em_max
						ON i.`id` = em_max.ingredient";
		$query =  $this->db->query($sql);
		$results =  $query->result_array();
		return $results;
	}
	
	function list_best_effects_by_ingredient($ingredient)
	{
		$sql = "
			SELECT
				em.*, e.`name` AS effect_name, e.id AS eid, e.price
			FROM effects e, effects_map em 
				LEFT JOIN (
					SELECT em.`ingredient`, MAX(e.`price`) price
					FROM effects_map em, effects e
					WHERE em.`effect` = e.`id`
					GROUP BY em.`ingredient`
				) emax
				ON em.`ingredient` = emax.ingredient
			WHERE em.`effect` = e.`id` AND e.`price` = emax.price AND em.`ingredient` = ?";
		$query =  $this->db->query($sql, Array($ingredient));
		$results =  $query->result_array();
		return $results;
	}
	
	function list_ingredients_by_effect($effect)
	{
		$sql = "
			SELECT i.id, i.name
			FROM 
				effects_map em,
				ingredients i
			WHERE
				em.`ingredient` = i.`id` AND
				em.`effect` = ?";
		$query =  $this->db->query($sql, Array($effect));
		$results =  $query->result_array();
		return $results;
	}
	
	function list_ingredients_by_effect_not($effect, $not)
	{
		$sql = "
			SELECT i.id, i.name
			FROM 
				effects_map em,
				ingredients i
			WHERE
				em.`ingredient` = i.`id` AND
				em.`effect` = ? AND
				i.id != ?";
		$query =  $this->db->query($sql, Array($effect, $not));
		$results =  $query->result_array();
		return $results;
	}
	
	function list_effects_by_ingredient($ingredient)
	{
		$sql = "
			SELECT e.id, e.name, e.price
			FROM 
				effects_map em,
				effects e
			WHERE
				em.`effect` = e.`id` AND
				em.`ingredient` = ?";
		$query =  $this->db->query($sql, Array($ingredient));
		$results =  $query->result_array();
		return $results;
	}
	
	function list_compatible_ingredients($ingredient)
	{
		$sql = "
			SELECT *
			FROM (
				SELECT em.*, COUNT(*) AS `compatible`, SUM(e.price) AS price
				FROM effects_map em
				LEFT JOIN effects e ON em.`effect` = e.`id`
				WHERE
					effect IN (
						SELECT effect 
						FROM effects_map 
						WHERE ingredient = ?
					) 
					AND	ingredient != ?
				GROUP BY ingredient
			) em
			LEFT JOIN ingredients i ON em.ingredient = i.id
			WHERE compatible > 1
			ORDER BY price DESC, compatible DESC, i.name";
		$query =  $this->db->query($sql, Array($ingredient, $ingredient));
		$results =  $query->result_array();
		return $results;
	}
	
	function list_compatible_effects($compatible, $ingredient)
	{
		$sql = "
			SELECT *
			FROM effects_map em
			LEFT JOIN effects e ON em.`effect` = e.`id`
			WHERE
				ingredient = ? AND 
				effect IN (
					SELECT effect
					FROM effects_map
					WHERE ingredient = ?
				)
			ORDER BY e.name";
		$query =  $this->db->query($sql, Array($compatible, $ingredient));
		$results =  $query->result_array();
		return $results;
	}
	
	function list_effects_combination_by_ingredients($ingredient1, $ingredient2, $ingredient3 = false)
	{
		$sql = "
			SELECT *
			FROM (
				SELECT em.*, e.id AS eid, e.name, e.`price`, COUNT(*) AS `hits`
				FROM effects_map em, effects e
				WHERE em.`effect` = e.`id`
				AND (
					em.ingredient = ? 
					OR em.`ingredient` = ? ";
		
		if($ingredient3)
			$sql .= "OR em.`ingredient` = ? ";
			
		$sql .= ")
				GROUP BY e.id
			) em
			WHERE hits > 1";
		
		$values = Array();
		if($ingredient3)
			$values = Array($ingredient1, $ingredient2, $ingredient3);
		else 
			$values = Array($ingredient1, $ingredient2);
		
		$query =  $this->db->query($sql, $values);
		$results =  $query->result_array();
		return $results;
	}
	
	function update($id, $data)
	{
		$data = $this->_strip_keys($data);
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	
	function get($id)
	{
		$query = $this->db->get_where($this->table, array('id' => $id));
		$results =  $query->result_array();
		if ($query->num_rows() > 0)
			return $results[0];
		else
			return FALSE;
	}
}