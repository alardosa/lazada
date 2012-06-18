<div id="mainWrap">
<br /><br />
<font face="Verdana" style="font-size: 20pt" color="#FFFFFF"><a href="#">HOT DEALS</a> | <a href="#">Back to School</a> | <a href="#">Submit Entry</a> | <a href="http://lazadapromo.com/rose_test/index.php/gallery">Gallery</a></font>
<br /><br />
<?php echo $this->load->view('partials/notices'); ?>

<?php echo form_open_multipart(site_url('submit'),'class="form"');
	echo form_hidden('user_id',$this->session->userdata('user_id'));
	echo '<div class="inpWrap"><label>Title</label>'.form_input('title',$txtfield->title).'</div>';
	echo '<div class="inpWrap"><label>Description</label>'. form_textarea('description',$txtfield->description).'</div>';
	echo '<div class="inpWrap"><label>Upload file</label>'. form_upload('userfile','','class="file_upload"').'</div>';
	
	//added
	echo img('image/securimage', TRUE).'<br />';
	echo '<div class="inpWrap"><label>Enter Captcha</label>'.form_input('captcha',$txtfield->captcha).'</div>';

	echo form_submit('submit','Submit');
	
echo form_close();?>
</div>	