<?php if ( !defined('BASEPATH')) exit ('No direct script allowed');
 	class Gallery extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			
			
			$this->load->model('files_model','files');
			$this->load->helper('url');
			$this->load->library('pagination');
		}
		
		public function index(){
		
			$this->load->helper('facebook');
			$this->load->helper('pagination');
			// Create pagination links
			$total_rows = $this->files->select_all()->num_rows();
			$limit = 8;
			$pagination = create_pagination('/gallery/gallery/', $total_rows, $limit);

			// Using this data, get the relevant results
			$images = $this->files->image_paging($limit, $this->uri->segment(3));		
			
			$this->template->set_layout('gallery')
							->set('pagination',$pagination)
							->set('images', $images)
							->build('pages/gallery');			
		}
		
		public function view($id = 0){
			$file = $this->files->get($id);

			$this->template->append_metadata('<meta name="og:title" content="'.$file->title.'" />')
							->append_metadata('<meta name="og:type" content="photo" />')
							->append_metadata('<meta name="og:url" content="'.site_url('gallery/view/'.$file->id).'" />')
							->append_metadata('<meta name="og:description" content="'.$file->description.'" />')
							->append_metadata('<meta name="og:image" content="'.base_url().'uploads/'.$file->filename.'" />')
							->append_metadata('<meta property="og:site_name" content="LAZADA Philippines" />')
							->append_metadata('<meta property="fb:admins" content="100000204814919" />')
							->set_layout('gallery')
							->set('file', $file)
							->build('pages/view_image');
		}
	}
?>