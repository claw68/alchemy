<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Generate {
	
	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('generate_m','gen');
	}
	
	function create($object)
	{
		$object = strtolower($object);
		
		$this->generateController($object);
		$this->generateModel($object);
		$this->generateViews($object);
		$file = $this->generateSQL($object);
		$this->executeSQL($file);
	}

	private function generateController($object)
	{
		$template = 'application/libraries/resources/template/controller.php';
		$target = 'application/controllers/'.$object.'.php';
		$this->generateByTemplate($template, $object, $target);
	}
	
	private function generateModel($object)
	{
		$template = 'application/libraries/resources/template/model.php';
		$target = 'application/models/'.$object.'_m.php';
		$this->generateByTemplate($template, $object, $target);
	}
	
	private function generateViews($object)
	{
		$target_dir = 'application/views/'.$object.'/';
		if (!file_exists($target_dir)) 
   			mkdir($target_dir, 0755, TRUE);
		
		//generate add
		$template = 'application/libraries/resources/template/views/add.php';
		$this->generateByTemplate($template, $object, $target_dir.'add.php');
		
		//generate edit
		$template = 'application/libraries/resources/template/views/edit.php';
		$this->generateByTemplate($template, $object, $target_dir.'edit.php');
		
		//generate list
		$template = 'application/libraries/resources/template/views/list.php';
		$this->generateByTemplate($template, $object, $target_dir.'list.php');
	}
	
	private function generateSQL($object)
	{
		$template = 'application/libraries/resources/template/sql.sql';
		$target = 'application/sql/'.$object.'.sql';
		$file = $this->generateByTemplate($template, $object, $target);
		
		return $file;
	}
	
	private function generateByTemplate($template, $object, $target)
	{
		$file = read_file($template);
		
		$find = Array('__Object', '__object');
		$replace = Array(ucfirst($object), $object);
		
		$file = str_replace($find, $replace, $file);
		
		write_file($target, $file);
		
		return $target;
	}
	
	private function executeSQL($file)
	{
		$query = read_file($file);
		
		$sqls = explode(';', trim($query));
		
		foreach($sqls as $sql) {
			if($sql) {
				$this->ci->gen->executeSQL($sql);
			}
		}
	}
}

/* End of file Generator.php */
/* Location: ./application/libraries/Generator.php */