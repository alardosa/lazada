<?php

	class Files_model extends CI_Model{
		
		public function select_all(){
			$query = $this->db->where('f.status', 1)		
							  ->join('users as u','u.oauth_uid = f.user_id')		
							  ->get('tbl_files as f');
			return $query;
		}
		
		public function image_paging($limit,$offset){
			$query = $this->db->select('u.oauth_uid, u.first_name, u.last_name, u.email, u.hometown, f.*')
							  ->order_by('f.date_added', 'desc')
							  ->where('f.status', 1)		
							  ->join('users as u','u.oauth_uid = f.user_id')		
							  ->limit($limit, $offset)
							  ->get('tbl_files as f')
							  ->result();	
			return $query;
		}			

		public function get($id){
		$query = $this->db->select('u.oauth_uid, u.first_name, u.last_name, u.email, u.hometown, f.*')
						  ->where('f.id',$id)
						  ->join('users as u','u.oauth_uid = f.user_id')	
						  ->get('tbl_files as f')
						  ->row();	
			return $query;
		}

		public function status($id, $stat){
			$data = array(
               'status' => $stat            
			);
			$this->db->update('tbl_files', $data, array('id' => $id));
			return TRUE;
		}

	}

?>