<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('generate_m', 'generate');
		$this->load->model('object_m', 'object');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		
		$navigation = navigation();
		render_layout('generate/view', $data, $navigation);
	}
	
	public function doGenerate()
	{
		$object = strtolower($this->input->post('name'));
		
		$template = 'resource/template/controller.php';
		$target = 'application/controllers/'.$object.'.php';
		$this->generateByTemplate($template, $object, $target);
		
		$template = 'resource/template/model.php';
		$target = 'application/models/'.$object.'_m.php';
		$this->generateByTemplate($template, $object, $target);
		
		$target_dir = 'application/views/'.$object.'/';
		if (!file_exists($target_dir)) 
   			mkdir($target_dir, 0755, TRUE);
		
		$template = 'resource/template/views/add.php';
		$this->generateByTemplate($template, $object, $target_dir.'add.php');
		$template = 'resource/template/views/edit.php';
		$this->generateByTemplate($template, $object, $target_dir.'edit.php');
		$template = 'resource/template/views/list.php';
		$this->generateByTemplate($template, $object, $target_dir.'list.php');
		
		$template = 'resource/template/sql.sql';
		$target = 'application/sql/'.$object.'.sql';
		$file = $this->generateByTemplate($template, $object, $target);
		$this->executeSQL($file);
		
		$post = $this->input->post();
		$this->object->add($post);
		redirect('/object');
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
				$this->generate->executeSQL($sql);
			}
		}
	}
}

/* End of file generate.php */
/* Location: ./application/controllers/generate.php */