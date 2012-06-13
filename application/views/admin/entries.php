

<div class="grid_12">
	<div class="box">
	<h2>Entries</h2>
	<input type="button" id="refresh" value="Refresh">
		<div style="margin: 0px; position: static; overflow: hidden;">
		<div id="tables" class="block" style="margin: 0px;">
		
		<?php echo form_open('entries/action'); ?>
		<table cellspacing="0" cellpadding="0" border="1">
		  <thead>
		  <tr height="20">
		    <th><input type="checkbox" class="checkall" /></th>
		    <th>Likes</th>
			<th>Shares</th>
		    <th>Full Name</th>
		    <th>Email</th>
		    <th>Home Town</th>
		    <th>Image Link</th>
		    <th>Status</th>
			<th>Date Added</th>
		  </tr>
		  </thead>
		<?php
		  foreach ($entries as $entry):
		  $status = ($entry->status == 1) ? 'Active' : 'Inactive';
		  echo'
		  <tr height="20">
		    <td height="20"><input type="checkbox" name="action_to[]" value="'.$entry->file_id.'" /></td>
			<td>'.$entry->fblike.'</td>
			<td>'.$entry->fbshare.'</td>
		    <td>'.$entry->first_name.' '.$entry->last_name.'</td>
		    <td>'.$entry->email.'</td>
		    <td>'.$entry->hometown.'</td>
		    <td><a href="'.base_url().'index.php/gallery/view/',$entry->file_id.'" class=iframe><img src="'.site_url('files/thumb/'.$entry->file_id.'/60/60').'" /></a></td>
		    <td>'.$status.'</td>
			<td>'.$entry->date_added.'</td>
		  </tr>';
		  endforeach;
		?>
		</table>
		<?php echo $pagination['links']; ?>
		<div class="table_action_buttons">		
			<button value="publish" name="btnAction" type="submit">
				<span>Publish</span>
			</button>
										
			<button value="draft" name="btnAction" type="submit">
				<span>Draft</span>
			</button>
		</div>
		<?php echo form_close();?>		
		</div><!--#tables-->
		</div>

	</div><!--.box-->
</div><!--.grid_8--> 