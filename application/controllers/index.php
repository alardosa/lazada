<?php if ( !defined('BASEPATH')) exit ('No direct script allowed');
 	class Index extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			
			
		}
		
		public function index(){
		
			$this->template->set_layout('index')
							->build('pages/index');			
		}
	}
?>