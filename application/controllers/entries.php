<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Entries extends CI_Controller{
		
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model','user_m');
		$this->load->model('files_model','file_m');
		$this->load->helper('form');
	}

	public function index(){
		$this->load->helper('pagination');
		// Create pagination links
		$total_rows = $this->user_m->entries_all();
		$limit = 8;
		$pagination = create_pagination('/entries/entries/', $total_rows, $limit);

		// Using this data, get the relevant results
		$data['entries'] = $this->user_m->entries($limit,$this->uri->segment(3));	
		
		$this->template->set_layout('admin')
						->set('pagination',$pagination)
						->build('admin/entries', $data);
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

		//echo var_dump($this->input->post('action_to'));
		// Loop through each ID
		if(!empty($ids)){
			foreach($ids as $id){
			// Get the file
			$file = $this->file_m->get($id);
				if(!empty($file)){
					$this->file_m->status($id,$stat);
					if ($stat == 1 && $file->status !=1){
					
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
				}
			}
		}
		redirect();		
	}

	
}

?>
