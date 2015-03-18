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
				ef1.`effect_name` AS `primary`,
				ef2.`effect_name` AS secondary,
				ef3.`effect_name` AS tertiary,
				ef4.`effect_name` AS quarternary
			FROM
				ingredients i
					LEFT JOIN (
						SELECT 
							ef.* , e.`name` AS effect_name 
						FROM effects_map ef, effects e 
						WHERE ef.`effect` = e.`id`) ef1 
					ON i.`id` = ef1.`ingredient` AND ef1.`position` = 1
					
					LEFT JOIN (
						SELECT
							ef.* , e.`name` AS effect_name
						FROM effects_map ef, effects e 
						WHERE ef.`effect` = e.`id`) ef2
						ON i.`id` = ef2.`ingredient` AND ef2.`position` = 2
						
					LEFT JOIN (
						SELECT
							ef.* , e.`name` AS effect_name 
						FROM effects_map ef, effects e
						WHERE ef.`effect` = e.`id`) ef3 
						ON i.`id` = ef3.`ingredient` AND ef3.`position` = 3
					
					LEFT JOIN (
						SELECT 
							ef.* , e.`name` AS effect_name
						FROM effects_map ef, effects e
						WHERE ef.`effect` = e.`id`) ef4 
						ON i.`id` = ef4.`ingredient` AND ef4.`position` = 4";
						
		$query =  $this->db->query($sql);
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