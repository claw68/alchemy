<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uploads_m extends CI_Model 
{
	var $table = 'uploads';
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function delete($id)
	{
		$this->db->delete($this->table, array('id' => $id));
	}
	
	function delete_by_table_id($table, $id)
	{
		$this->db->delete($this->table, array('table_name' => $table, 'table_id' => $id));
	}
	
	function add($data)
	{
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
	
	function get_by_table_id($table_name, $table_id, $type)
	{
		$this->db->order_by("create_date", "desc");
		$query = $this->db->get_where($this->table, array('table_name'=> $table_name, 'table_id' => $table_id, 'type' => $type));
		$results =  $query->result_array();
		if ($query->num_rows() > 0)
			return $results[0];
		else
			return FALSE;
	}
}