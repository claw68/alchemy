<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ingredients_m extends CI_Model 
{
	var $table = 'ingredients';
	
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
	
	function all($limit = null, $offset = null)
	{
		$query = $this->db->get($this->table, $limit, $offset);
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