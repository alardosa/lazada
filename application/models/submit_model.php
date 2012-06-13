<?php
	class Submit_model extends CI_Model{
		
		public function create($uid, $file){
			$data = array(
				'user_id' 		=>  $uid,
				'title' 		=> 	$this->input->post('title'),
				'filename'		=> 	$file['file_name'],
				'description'	=>	$this->input->post('description'),
				'mimetype'		=>	$file['file_type'],
				'extension'		=>	$file['file_ext'],
				'width'			=>	$file['image_width'],
				'height'		=>	$file['image_height'],
				'filesize'		=>	$file['file_size'],
				'date_added'	=>	date('Y-m-d h:i:s')
			);
			$this->db->insert('tbl_files',$data);
			return TRUE;
		}
		
		public function user_exist($uid){
			$query = $this->db->get_where('tbl_files',array('user_id' => $uid))->num_rows();
			return $query;
		}
	}
?>