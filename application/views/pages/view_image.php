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
			
			
			<div class="viewImageWrap" align="center">
<?php if($file->status == 1):?>
<p><img src="<?php echo site_url('files/large/'.$file->id); ?>" height="<?=$file->height?>" width="<?=$file->width?>" /></p>

<div class="fb-like" data-href="<?php echo site_url('gallery/view/'.$file->id)?>" data-send="false" data-layout="standard" data-width="450" data-show-faces="true"></div>

<p>Title: <?php echo $file->title ?></p>
<p>Description: <?php echo $file->description ?></p>

<div>
<p>
<img src="http://graph.facebook.com/<?=$file->user_id?>/picture" height="38" /><br />
<strong>Submitted by:</strong> <?php echo $file->first_name.' '.$file->last_name ?></p>
</div>

<div class="fb-comments" data-href="<?php echo site_url('gallery/view/'.$file->id)?>" data-num-posts="2" data-width="470"></div>
<?php 
else:
redirect('gallery');
endif; ?>
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