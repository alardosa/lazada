<div align="center">
	<table border="1" id="table1" bordercolor="#5A8AC8" style="border-collapse: collapse" cellspacing="5" cellpadding="3">
		<tr>
			<td>
	<table border="0" width="900" id="table6">
	<tr><td align="center"><font face="Verdana" style="font-size: 20pt" color="#FFFFFF">><a href="<?=base_url()?>">Home</a> | <a href="#">Hot Deals</a> | <a href="#">Back to School</a> | <a href="<?=base_url().'index.php/submit'?>">Submit Entry</a> | <a href="<?=base_url().'index.php/gallery'?>">Gallery</a></font></td></tr>
		<tr>
			<td>
			<table border="0" width="100%" id="table11">
				<tr>
					<td>
<div id="mainWrap">
<br /><br />
	<?php echo $this->load->view('partials/notices'); ?>
	
	<?php echo form_open_multipart(site_url('submit'),'class="form"');
		echo form_hidden('user_id',$this->session->userdata('user_id'));
		echo '<div class="inpWrap"><label>Title</label>'.form_input('title',$txtfield->title).'</div>';
		echo '<div class="inpWrap"><label>Description</label>'. form_textarea('description',$txtfield->description).'</div>';
		echo '<div class="inpWrap"><label>Upload file</label>'. form_upload('userfile','','class="file_upload"').'</div>';
		
		//added
		echo '<div class="inpWrap"><label>&nbsp;</label>'.img('image/securimage', TRUE).'</div>';
		echo '<div class="inpWrap"><label>Enter Captcha</label>'.form_input('captcha',$txtfield->captcha).'</div>';
	
		echo form_submit('submit','Submit');
		
	echo form_close();?>
<br /><br />
</div>

			
			        </td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<p align="center"><font face="Arial" size="1">
	<font class="ws8" color="#000000">Copyright (c) Lazada.com.ph -
	<a href="http://www.lazada.com.ph/">Lazada.com.ph</a> | 
	</font>
	<font class="ws8">
	<a href="#">Hot Deals</a></font><font class="ws8" color="#000000"> 
	| </font><font class="ws8">
	<a href="#">Back to School</a></font><font class="ws8" color="#000000">  
	|&nbsp; <a href="#">Disclaimer</a> 
	| </font><font class="ws8">
	<a href="#">Contact Us</a></font></font><br></div>