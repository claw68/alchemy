<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Max_price_index_m extends CI_Model 
{
	var $table = 'max_price_index';
	
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
	
	function update($id, $data)
	{
		$data = $this->_strip_keys($data);
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	
	function save($data)
	{
		if($row = $this->find($data['primary'], $data['secondary'], $data['tertiary'])) {
			$this->update($row['id'], $data);
			return $row['id'];
		} else {
			return $this->add($data);
		}
	}
	
	function find($primary, $secondary, $tertiary)
	{
		$this->db->where('primary', $primary);
		$this->db->where('secondary', $secondary);
		$this->db->where('tertiary', $tertiary);
		
		$query = $this->db->get($this->table);
		$results =  $query->result_array();
		if ($query->num_rows() > 0)
			return $results[0];
		else
			return FALSE;
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
	
	function get_max_price_by_ingredients($primary, $secondary) {
		$query = $this->db->get_where($this->table, array('primary' => $primary, 'secondary' => $secondary));
		$results =  $query->result_array();
		if ($query->num_rows() > 0)
			return $results[0];
		else
			return FALSE;
	}
	
	function list_best_value_combination($ingredient = false)
	{
		$sql = "
			SELECT *, CONCAT_WS(',',
				LEAST(`primary`, secondary, tertiary),
				REPLACE(
					REPLACE(
						REPLACE(
							CONCAT(`primary`,',',secondary,',',tertiary,','),
							CONCAT(LEAST(`primary`, secondary, tertiary),','),
							''
						),
						GREATEST(`primary`, secondary, tertiary),
						''
					),',',''),
				GREATEST(`primary`, secondary, tertiary)) AS ids
			FROM max_price_index mpi
			WHERE
				mpi.`primary` NOT IN (
					SELECT i.id 
					FROM ingredients i 
					WHERE addon != 0
				) AND
				mpi.`secondary` NOT IN (
					SELECT i.id 
					FROM ingredients i 
					WHERE addon != 0
				) AND
				mpi.`tertiary` NOT IN (
					SELECT i.id 
					FROM ingredients i 
					WHERE addon != 0
				) ";
		
		if($ingredient)
				$sql .= " AND mpi.`primary` = ? ";
		
		$sql .= " 
			GROUP BY ids
			ORDER BY price DESC
			LIMIT 0,15";
		if($ingredient)
			$query =  $this->db->query($sql, Array($ingredient));
		else
			$query =  $this->db->query($sql);
		
		$results =  $query->result_array();
		return $results;
	}
}