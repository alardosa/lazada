<?php
	if(validation_errors()):
		echo '<div class="notification errors closable">'.validation_errors().'</div>';
	endif;
	
	if($this->session->flashdata('success')):
		echo '<div class="notification success closable">'.$this->session->flashdata('success').'</div>';
	endif;
	
	if($this->session->flashdata('error')):
		echo '<div class="notification errors closable">'.$this->session->flashdata('error').'</div>';
	endif;
?>