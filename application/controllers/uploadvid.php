<?php 

class Uploadvid extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','html'));
		$this->load->library('form_validation');
	}
	
	private $upload_vid = array(
		array(
			'field'		=> 'video',
			'label'		=> 'Upload Video',
			'rules'		=> 'callback__checkfile'
		)
	);

	public function _checkfile($userfile){
		if(!empty($_FILES['video']['name'])){
			return TRUE;
		}else{
			$this->form_validation->set_message('_checkfile','File must be uploaded.');
			return FALSE;
		}
	}
	
	public function index()
	{
		$this->form_validation->set_rules($this->upload_vid);
		
		if($this->form_validation->run() == TRUE){
			$upload = $this->add_video(); 
		}else{
			$file = $this->file_upload(); 
		}
	}
	
	public function file_upload(){
		$this->load->view('pages/uploadvid');
		//$this->template->build('pages/uploadvid');
	}
	
	public function add_video(){
        if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
            unset($config);
            $date = date("ymd");
            $configVideo['upload_path'] = './video';
            $configVideo['max_size'] = '10240';
            $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|swf';
            $configVideo['overwrite'] = FALSE;
            $configVideo['remove_spaces'] = TRUE;
            $video_name = $date.$_FILES['video']['name'];
            $configVideo['file_name'] = $video_name;

            $this->load->library('upload', $configVideo);
            $this->upload->initialize($configVideo);
            if (!$this->upload->do_upload('video')) {
                echo $this->upload->display_errors();
            } else {
                $videoDetails = $this->upload->data();
                echo "Successfully Uploaded";
            }
        }
	}
}
?>