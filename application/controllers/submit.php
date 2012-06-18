<?php
	class Submit extends CI_Controller{
		
	public function __construct(){
		parent::__construct();
		//added
		$this->load->library('securimage');
		
		$this->load->model('submit_model', 'submit');
		$this->load->library('form_validation');
		
		$this->load->helper(array('url','form','facebook','html'));
		$this->load->model('user_model','user_m');
		
		$this->load->library('form_validation');
	}
	

	private $upload_frm = array(
		array(
			'field'	 	=> 'title',
			'label'  	=> 'Title',
			'rules'		=> 'required|xss_clean'
		),
		array(
			'field'	 	=> 'description',
			'label'  	=> 'Description',
			'rules'		=> 'required|xss_clean'
		),
		array(
			'field'		=> 'captcha',
			'label'		=> 'Captcha',
			'rules'		=> 'required|xss_clean|callback_check'
		),
		array(
			'field'		=> 'userfile',
			'label'		=> 'Upload File',
			'rules'		=> 'callback__checkfile'
		)
	);
	
	/*captcha - jerson*/
	public function check($str){
		//$imagecode = $this->input->post('imagecode');
		$captcha = $this->securimage->check($str);
		if ($str == $captcha){
			return TRUE;
		}else{
			$this->form_validation->set_message('check', 'Captcha dont match');
			return FALSE;
		}
    }
	/*captcha - jerson*/
	
	//callback for image validation if !empty
	public function _checkfile($userfile){
		if(!empty($_FILES['userfile']['name'])){
			return TRUE;
		}else{
			$this->form_validation->set_message('_checkfile','File must be uploaded.');
			return FALSE;
		}
	}
	
	public function index(){
		$this->load->library('email');
		$this->facebook = new Facebook(array(
		            'appId' => $this->config->item('facebook_app_id'),
		            'secret' => $this->config->item('facebook_secret_key'),
		            'cookie' => true
		        ));
		
		$session = $this->facebook->getSession();
		
		if(!empty($session)) {
			# Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
			try{
				$uid =$this->facebook->getUser();
				$user =$this->facebook->api('/me');
			} catch (Exception $e){}
			//echo var_dump($user);
			if(!empty($user)){
				
		        $username = $user['name'];
		        $fname = $user['first_name'];
		        $lname = $user['last_name'];
				$gender = $user['gender'];
		        $bday = $user['birthday'];
		        $email = $user['email'];
		        $htown = (!empty($user['hometown']['name'])) ? $user['hometown']['name'] : '' ; 
							
					//check if user already submit entry
					$user_entry = $this->submit->user_exist($uid);
					$this->session->set_userdata('user_id',$uid);
					
					//if user id found return to gallery				
					//if($user_entry != 1 && $user_entry == NULL){

				    //$this->session->set_userdata('oauth_id',$userdata['oauth_uid']);
					//$this->session->set_userdata('username',$userdata['username']);
					//$this->session->set_userdata('oauth_provider',$userdata['oauth_provider']);
					
					/*-- set validation rules --*/
					$this->form_validation->set_rules($this->upload_frm);
					$error = '';
					
					if($this->form_validation->run() == TRUE){
						$file = $this->file_upload();   
						
						if(!empty($file) && is_array($file)):
						//Save entry
						$create = $this->submit->create($uid, $file);
						
						if($create == TRUE){
							$userdata = $this->user_m->checkUser($uid, 'facebook', $username, $fname, $lname, $gender, $bday, $email, $htown);

							$data['email_data'] = array(
								'name'			=> $fname.' '.$lname,
								'title'			=> $this->input->post('title'),
								'description'	=> $this->input->post('description'),
								'filename'		=> $file['file_name']
							);

							//Send email notification for success upload
							$this->email->from('noreply@lazada.com.ph', 'Lazada Online Shop Philippines');
							$this->email->to($email);
							
							$this->email->subject('LAZADA Photo Contest');
							$this->email->set_mailtype('html');
							$msg = $this->load->view('emails/upload_success', $data, true);
							$this->email->message($msg);
							$this->email->send();
							
							$this->session->set_userdata('success','File has been successfully uploaded.');
							
						}
						redirect('submit/success');
						else:
							$error = $file;
						endif;	
						
						foreach($this->upload_frm as $key => $field):
							$txtfield->$field['field'] = set_value($field['field']);
						endforeach;	
					}else{
						foreach($this->upload_frm as $key => $field):
							$txtfield->$field['field'] = set_value($field['field']);
						endforeach;
					}
			
					
					$this->template->set_layout('gallery')
								->append_metadata('<link rel="stylesheet" href="'.CSS.'uniform.default.css" type="text/css" media="screen" />')					
								->append_metadata('<script type="text/javascript" src="'.JS.'jquery.uniform.js"></script>')
								->set('txtfield',$txtfield)
								->set('error',$error)
								->build('pages/submit');
				//}
			} else {
				# For testing purposes, if there was an error, let's kill the script 
   				 redirect('submit'); 
			}
		} else {
			# There's no active session, let's generate one
			$login_url = $this->facebook->getLoginUrl(array(
		                'req_perms' => 'email, user_activities, user_likes, user_birthday, user_hometown, user_location, user_photos',
		                                      ));
			redirect($login_url);
			//redirect('submit/upload_entry');
		}
	}
	
	public function success(){
		$this->template->set_layout('gallery')
					->build('pages/submit_success');
	}

	public function upload_entry(){
		$file = $this->file_upload();
		//echo var_dump($file);
		
		if(!empty($file)):
		$create = $this->submit->create($file);
			redirect('gallery');
		endif;
		
		$this->template->build('pages/submit');
	}
		
	public function file_upload(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '1000';
		$config['max_height']  = '1000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = $this->upload->display_errors();
			return $error;
		}
		else
		{
			$data = $this->upload->data();
			return $data;
		}
	}
		
	}

?>