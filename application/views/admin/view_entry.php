<div class="viewImageWrap">

<p><img src="<?php echo site_url('files/large/'.$file->id); ?>" height="<?=$file->height?>" width="<?=$file->width?>" /></p>

<p><?php echo $file->title ?></p>
<p><?php echo $file->description ?></p>

<div>
<p>
<img src="http://graph.facebook.com/<?=$file->user_id?>/picture" height="38" />
<strong>Submitted by:</strong> <?php echo $file->first_name.' '.$file->last_name ?></p>
</div>

</div>