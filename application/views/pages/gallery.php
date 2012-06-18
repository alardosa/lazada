<div id="mainWrap">
	<p><?php echo anchor('submit','Submit Entry'); ?></p>
	<ul class="gallery">
<?php foreach($images as $file):?>
	<li><a href="<?=site_url('gallery/view/'.$file->id) ?>" target="_blank"><img src="<?=site_url('files/thumb/'.$file->id.'/150/150');?>" /></a><br />
	
	<div class="fb-like" data-href="<?php echo site_url('gallery/view/'.$file->id)?>" data-send="false" data-layout="button_count" data-width="95" data-show-faces="false" style="vertical-align:top; zoom:1; *display:inline"></div>
	
	<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal" data-counturl="<?=site_url('gallery/view/'.$file->id)?>" data-url="<?=site_url('gallery/view/'.$file->id )?>" data-text="Follow @JersonelsA @angelprisz">Tweet</a>

	</li>
	
<?php endforeach; ?>
	</ul>
	<div style="clear:both"></div>
	<?php echo $pagination['links']; ?>
</div>