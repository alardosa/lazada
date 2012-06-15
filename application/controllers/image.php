<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class Image extends CI_Controller {
    function Image(){
        parent:: __construct();
        $this->load->library('securimage');        
    }
    function securimage(){
        $this->securimage->show();
    }
} 