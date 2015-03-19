<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Generate_m extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function executeSQL($sql)
	{
		$this->db->query($sql);
	}
}