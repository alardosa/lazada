<!DOCTYPE>
<html>

<head></head>
<?php echo $this->load->view('partials/notices'); ?>
<form class="cssform" name="property" id="property" method="POST" action="<?php echo site_url('uploadvid')?>"  enctype="multipart/form-data" >
    <table>
    <tr>
        
		<td><label>Upload Video :
		<?php
			echo form_upload('video');
		?></label>
		</td>
        <!--td><input type="file" id="video" name="video" ></td-->
    </tr>
    <tr>
        <td> <input type="submit" id="button" name="submit" value="Submit" /></td>
    </tr>
</table>
</form>
</html>