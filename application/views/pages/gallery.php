<div align="center">
	<table border="1" id="table1" bordercolor="#5A8AC8" style="border-collapse: collapse" cellspacing="5" cellpadding="3">
		<tr>
			<td>
	<table border="0" width="900" id="table6">
	<tr><td align="center"><font face="Verdana" style="font-size: 20pt" color="#FFFFFF"><a href="<?=base_url()?>">Home</a> | <a href="#">Hot Deals</a> | <a href="#">Back to School</a> | <a href="<?=base_url().'index.php/submit'?>">Submit Entry</a> | <a href="<?=base_url().'index.php/gallery'?>">Gallery</a></font></td></tr>
		<tr>
			<td>
			<table border="0" width="100%" id="table11">
				<tr>
					<td>
			<div id="mainWrap">
	<ul class="gallery">
<?php foreach($images as $file):?>
	<li><a href="<?=site_url('gallery/view/'.$file->id) ?>" class="iframe"><img src="<?=site_url('files/thumb/'.$file->id.'/150/150');?>" /></a><br />
	<div class="fb-like" data-href="<?php echo site_url('gallery/view/'.$file->id)?>" data-send="false" data-layout="button_count" data-width="95" data-show-faces="false"></div>
	<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="none" data-counturl="<?=site_url('gallery/view/'.$file->id)?>" data-url="<?=site_url('gallery/view/'.$file->id )?>" data-text="Follow @JersonelsA @angelprisz">Tweet</a>

	</li>
	
<?php endforeach; ?>
	</ul>
	<div style="clear:both"></div>
	<?php echo $pagination['links']; ?>
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