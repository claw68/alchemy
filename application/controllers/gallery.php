<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_m', 'gallery');
		
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		}
	}

	public function index()
	{
		$data = new stdClass();
		$data->gallery = $this->gallery->all();
		
		$navigation = navigation();
		
		render_layout('gallery/list', $data, $navigation);
	}
	
	function add()
	{
		$data = new stdClass();
		$data->gallery['picture'] = get_default_image('gallery');
		
		$navigation = navigation();
		
		render_layout('gallery/add', $data, $navigation);
	}
	
	function doAdd()
	{
		$post = $this->input->post();
		$id = $this->gallery->add($post);
		
		if (is_uploaded_file($_FILES['picture']['tmp_name']))
			upload_image('gallery', 'picture', $id);
		
		redirect('/gallery');
	}
	
	function edit($id)
	{
		$data = new stdClass();
		$data->id = $id;
		$data->gallery = $this->gallery->get($id);
		$data->gallery['picture'] = get_latest_image('gallery', $id);
		
		if (!$data->gallery)
			redirect('/gallery');
		
		$navigation = navigation();
		render_layout('gallery/edit', $data, $navigation);
	}
	
	function doEdit()
	{
		$post = $this->input->post();
		$this->gallery->update($post["id"], $post);
		
		if (is_uploaded_file($_FILES['picture']['tmp_name']))
			upload_image('gallery', 'picture', $post["id"], TRUE);
		
		redirect('/gallery');
	}
	
	function delete($id)
	{
		$this->gallery->delete($id);
		redirect('/gallery');
	}
}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */