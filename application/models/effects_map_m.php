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
				em1.`effect_name` AS `primary`,
				em2.`effect_name` AS secondary,
				em3.`effect_name` AS tertiary,
				em4.`effect_name` AS quarternary
			FROM
				ingredients i
					LEFT JOIN (
						SELECT 
							em.* , e.`name` AS effect_name 
						FROM effects_map em, effects e 
						WHERE em.`effect` = e.`id`) em1 
						ON i.`id` = em1.`ingredient` AND em1.`position` = 1
					
					LEFT JOIN (
						SELECT
							em.* , e.`name` AS effect_name
						FROM effects_map em, effects e 
						WHERE em.`effect` = e.`id`) em2
						ON i.`id` = em2.`ingredient` AND em2.`position` = 2
						
					LEFT JOIN (
						SELECT
							em.* , e.`name` AS effect_name 
						FROM effects_map em, effects e
						WHERE em.`effect` = e.`id`) em3 
						ON i.`id` = em3.`ingredient` AND em3.`position` = 3
					
					LEFT JOIN (
						SELECT 
							em.* , e.`name` AS effect_name
						FROM effects_map em, effects e
						WHERE em.`effect` = e.`id`) em4 
						ON i.`id` = em4.`ingredient` AND em4.`position` = 4";
						
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