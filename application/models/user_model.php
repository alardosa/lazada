<?php
	class User_model extends CI_model{
		
	public function checkUser($uid, $oauth_provider, $username, $fname, $lname, $gender, $bday, $email, $hometown){
		# We have an active session, let's check if we have already registered the user
		$query = $this->db->get_where('users',array('oauth_uid' => $uid, 'oauth_provider' => $oauth_provider));
		$result = $query->result();
		
		# If not, let's add it to the database
		if(empty($result)){
			$bday_arr = explode("/", $bday); 
		 	$data = array(
				'oauth_provider' 	=> $oauth_provider,
				'oauth_uid'			=> $uid,
				'username'			=> $username,
				'first_name'		=> $fname,
				'last_name'			=> $lname,
				'gender'			=> $gender,
				'birthday'			=> $bday_arr[2].'-'.$bday_arr[0].'-'.$bday_arr[1],
				'email'				=> $email,
				'hometown'			=> $hometown,
				'created_at'		=> date('Y-m-d H:i:s')
			);
		 	$this->db->insert('users',$data);
			$query = $this->db->get_where('users',array('id' => $this->db->insert_id()));
			$result = $query->result();
		}
		
		return $result;
	}
	
	public function entries_all(){
		$query = $this->db->join('users as u','u.oauth_uid = f.user_id')
						  ->get('tbl_files as f')
						  ->num_rows();
		return $query;
	}
		
	public function entries($limit,$offset,$sort_by,$sort_order){
		$query = $this->db->select('u.oauth_uid, u.first_name, u.last_name, u.email, u.hometown, f.id as file_id, f.fblike, f.user_id, f.filename, f.status, f.date_added')
						  ->join('users as u','u.oauth_uid = f.user_id')
						  ->order_by($sort_by,$sort_order)	
						  ->limit($limit, $offset)
						  ->get('tbl_files as f')
						  ->result();
		return $query;
	}

	
	public function contestants_all(){
		$query = $this->db->get('users');
		return $query;
	}
		
	public function contestants($limit,$offset,$sort_by,$sort_order){
		$query = $this->db->order_by($sort_by,$sort_order)	
						  ->limit($limit, $offset)
						  ->get('users')
						  ->result();
		return $query;
	}
		
	}

?>