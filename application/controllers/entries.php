<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Entries extends CI_Controller{
		
	public function __construct(){
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->model('user_model','user_m');
		$this->load->model('files_model','file_m');
		$this->load->helper('form');
		
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login');
		}
	}
	
	

	public function index($sort_by = 'fblike', $sort_order = 'desc'){
		$this->load->helper('pagination');

		$data['fields'] = array(
			'fblike'	 	=> 'Likes',
			'full_name' 	=> 'Full Name',
			'email' 		=> 'Email',
			'home_town' 	=> 'Home Town',
			'image_link' 	=> 'Image Link',
			'status' 		=> 'Status',
			'date_added'	=> 'Date Added'
		);
		
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
				
		// Create pagination links
		$total_rows = $this->user_m->entries_all();
		$limit = 10;
		$pagination = create_pagination('/entries/entries/'.$sort_by.'/'.$sort_order, $total_rows, $limit, 5);

		// Using this data, get the relevant results
		$data['entries'] = $this->user_m->entries($limit,$this->uri->segment(5),$sort_by,$sort_order);	

		$this->template->set_layout('admin')
						->title(DEFAULT_TITLE,'Entries')
						->set('pagination',$pagination)
						->build('admin/entries', $data);
	}
	
	public function view_entry($id = 0){
		$file = $this->file_m->get($id);

		$this->template->set_layout('gallery')
						->set('file', $file)
						->build('admin/view_entry');
	}
	
	public function action($id = 0){
		switch ($this->input->post('btnAction')){
			case 'publish':
			$this->status($id, 1);
			break;
				
			case 'draft':
			$this->status($id, 0);
			break;		
			
			default:
			redirect('entries');
			break;	
		
		}
	}
	
	public function status($id = 0, $stat){
		$this->load->helper('url');
		$this->load->library('email');
		$ids = ($id) ? array($id) : $this->input->post('action_to');

		if(!empty($ids)){
		$select = 0;
		$deselect = 0;
		$to_select = 0;

			// Loop through each ID		
			foreach($ids as $id){
			// Get the file
			$file = $this->file_m->get($id);
				if(!empty($file)){
					$this->file_m->status($id,$stat);
					
					if($stat == 0 && $file->status !=0){
						$deselect++;
					}
					
					if ($stat == 1 && $file->status !=1){
					$select++;
					$data['email_data'] = array(
						'name'			=> $file->first_name.' '.$file->last_name,
						'title'			=> $file->title,
						'description'	=> $file->description,
						'filename'		=> $file->filename
					);
							
					//Send email notification for success upload
					$this->email->from('noreply@lazada.com.ph', 'Lazada Online Shop Philippines');
					$this->email->to($file->email);
					
					$this->email->subject('LAZADA Photo Contest');
					$this->email->set_mailtype('html');
					$msg = $this->load->view('emails/approved_entry', $data, true);
					$this->email->message($msg);
					$this->email->send();
					}
					$to_select++;
				}
			}
		if($stat == 1):
		$this->session->set_flashdata('success', sprintf('%s entry out of %s successfully activated.', $select, $to_select));
		else:
		$this->session->set_flashdata('success', sprintf('%s entry out of %s successfully deactivated.', $deselect, $to_select));
		endif;
		}
		redirect('entries');		
	}
	
	/*----- Lists Contestant -----*/
	public function contestants($sort_by = 'last_name', $sort_order = 'asc'){
		$this->load->helper('pagination');

		$data['fields'] = array(
			'last_name' 	=> 'Full Name',
			'gender'		=> 'Gender',
			'age'			=> 'Age',
			'birthday'		=> 'Birthday',
			'email' 		=> 'Email',
			'hometown' 		=> 'Home Town',
			'created_at'	=> 'Date Added'
		);
		
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
				
		// Create pagination links
		$total_rows = $this->user_m->contestants_all()->num_rows();

		$limit = 10;
		$pagination = create_pagination('/entries/contestants/'.$sort_by.'/'.$sort_order, $total_rows, $limit, 5);

		// Using this data, get the relevant results
		$data['entries'] = $this->user_m->contestants($limit,$this->uri->segment(5),$sort_by,$sort_order);

		$this->template->set_layout('admin')
						->title(DEFAULT_TITLE,'List Contestants')
						->set('pagination',$pagination)
						->build('admin/contestants', $data);
	}	
	
}

?>
