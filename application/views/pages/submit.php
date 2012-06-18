<div id="mainWrap">
<br /><br />
<font face="Verdana" style="font-size: 20pt" color="#FFFFFF"><a href="#">HOT DEALS</a> | <a href="#">Back to School</a> | <a href="#">Submit Entry</a> | <a href="http://lazadapromo.com/rose_test/index.php/gallery">Gallery</a></font>
<br /><br />
<?php if(validation_errors()){
	echo validation_errors();	
}
	if($error){
		echo '<p>'.$error.'</p>';
	}
?>
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