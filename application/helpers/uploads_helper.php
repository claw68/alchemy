<?php
	function upload_image($table, $file, $id, $replace = FALSE)
	{
		$ci =& get_instance();
		$ci->load->model('uploads_m','uploads');
		
		$user_id = $ci->session->userdata('user_id');
		
		$upload_dir = 'includes/uploads/'.$table.'/'.$id.'/';
		
		if (!file_exists($upload_dir)) 
   			mkdir($upload_dir, 0755, TRUE);
		
		$config['upload_path'] = $upload_dir;
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['encrypt_name'] = TRUE;
		$config['overwrite'] = FALSE;
		$ci->load->library('upload', $config);

		if ( ! $ci->upload->do_upload($file)) 
		{
			$info = $ci->upload->display_errors();
			$filename = "";
		}
		
		else 
		{
			$info = $ci->upload->data();
			$filename = $info['file_name'];
			if($replace)
				replace_latest_image($table, $id, $filename, $upload_dir, $user_id);
			else
				add_image($table, $id, $filename, $upload_dir, $user_id);
		}
		
		return $upload_dir.$filename;
	}
	
	function add_image($table, $id, $filename, $upload_dir, $user_id)
	{
		$ci =& get_instance();
		$ci->load->model('uploads_m','uploads');
				
		$post['table_name'] = $table;
		$post['table_id'] = $id;
		$post['type'] = 'image';
		$post['filename'] = $filename;
		$post['path'] = $upload_dir.$filename;
		$post['user_id'] = $user_id;
		
		$ci->uploads->add($post);
	}
	
	function replace_latest_image($table, $id, $filename, $upload_dir, $user_id)
	{
		$ci =& get_instance();
		$ci->load->model('uploads_m','uploads');
		
		$image = $ci->uploads->get_by_table_id($table, $id, 'image');
		if($image)
		{
			if(file_exists($image['path']))
			unlink($image['path']); 
			
			$post['table_name'] = $table;
			$post['table_id'] = $id;
			$post['type'] = 'image';
			$post['filename'] = $filename;
			$post['path'] = $upload_dir.$filename;
			$post['user_id'] = $user_id;
			
			$ci->uploads->update($image['id'], $post);
		}
		else 
		{
			add_image($table, $id, $filename, $upload_dir, $user_id);
		}
	}
	
	function get_latest_image($table, $id)
	{
		$ci =& get_instance();
		$ci->load->model('uploads_m','uploads');
		
		$type = 'image';
		
		$img = $ci->uploads->get_by_table_id($table, $id, $type);
		
		if($img)
			return $img['path'];
		else
			return get_default_image($table);
	}
	
	function get_default_image($table)
	{
		$directory = 'includes/images/default';
		
		if($table == 'team')
			$path = $directory.'/team.png';
		else if($table == 'player')
			$path = $directory.'/player.png';
		else
			$path = $directory.'/league.png';
		
		return $path;
	}
	
	function delete_uploads($table, $id)
	{
		$ci =& get_instance();
		$ci->load->model('uploads_m','uploads');
				
		$ci->uploads->delete_by_table_id($table, $id);
		remove_all_files($table, $id);
	}
	
	function remove_all_files($table, $id)
	{
		$path = 'includes/uploads/'.$table.'/'.$id.'/';
		
		delete_files($path, true);
		rmdir($path);
	}
?>