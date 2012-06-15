<div id="mainWrap">
<?php if(validation_errors()){
	echo validation_errors();	
}
	if($error){
		echo '<p>'.$error.'</p>';
	}
?>
<p><a href="#">HOT DEALS</a> | <a href="#">Back to School</a> | <?php echo anchor('submit','Submit Entry'); ?> | <a href="#">Gallery</a></p><br /><br /><br />
<p><a href="http://lazadapromo.com/rose_test/index.php/submit">LOGIN TO FACEBOOK TO REGISTER</a></p>
<?php echo form_open_multipart(site_url('submit'),'class="form"');
	echo form_hidden('user_id',$this->session->userdata('user_id'));
	echo 'Title '.form_input('title',$txtfield->title).'<br />';
	echo 'Description'. form_textarea('description',$txtfield->description).'<br />';
	echo 'Upload file'. form_upload('userfile').'<br />';
	
	//added
	echo img('image/securimage', TRUE).'<br />';
	echo 'Enter Captcha '.form_input('captcha',$txtfield->captcha).'<br />';
	
	echo form_submit('submit','Submit');
	
echo form_close();?>
</div>	