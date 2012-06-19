<?php
	if(validation_errors()):
		echo '<div class="notification errors">'.validation_errors().'</div>';
	endif;
	
	if($this->session->flashdata('success')):
		echo '<div class="notification success">'.$this->session->flashdata('success').'</div>';
	endif;
	
	if($this->session->flashdata('error')):
		echo '<div class="notification errors">'.$this->session->flashdata('error').'</div>';
	endif;
	
	if($this->session->userdata('file_error')):
		echo '<div class="notification errors"><p>'.$this->session->userdata('file_error').'</p></div>';
	endif;
?>