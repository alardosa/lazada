<div class="viewImageWrap">
<?php if($file->status == 1):?>
<p><img src="<?php echo site_url('files/large/'.$file->id); ?>" height="<?=$file->height?>" width="<?=$file->width?>" /></p>

<div class="fb-like" data-href="<?php echo site_url('gallery/view/'.$file->id)?>" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false"></div>

<p><?php echo $file->title ?></p>
<p><?php echo $file->description ?></p>

<div>
<p>
<img src="http://graph.facebook.com/<?=$file->user_id?>/picture" height="38" />
<strong>Submitted by:</strong> <?php echo $file->first_name.' '.$file->last_name ?></p>
</div>

<div class="fb-comments" data-href="<?php echo site_url('gallery/view/'.$file->id)?>" data-num-posts="2" data-width="470"></div>
<?php 
else:
redirect('gallery');
endif; ?>
</div>