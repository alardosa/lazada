

<div class="grid_12">
	<div class="box">
	<h2>Entries</h2>
		<div style="margin: 0px; position: static; overflow: hidden;">
		<div id="tables" class="block" style="margin: 0px;">
		
		<?php echo form_open('entries/action'); ?>
		<table cellspacing="0" cellpadding="0" border="1">
		  <thead>
		  	<th><input type="checkbox" class="checkall" /></th>
			<?php foreach($fields as $field_name => $field_display): ?>
			<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
				<?php 
					if($field_name != 'full_name' && $field_name != 'email' && $field_name != 'home_town' && $field_name != 'image_link'):
						echo anchor("entries/entries/$field_name/" .
						(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') ,
						$field_display, 'class="sort"'); 
					else:
						echo $field_display;
					endif;
				?>
			</th>
			<?php endforeach; ?>
		  </thead>
		<?php
		  foreach ($entries as $entry):
		  $status = ($entry->status == 1) ? 'Active' : 'Inactive';
		  echo'
		  <tr height="20">
		    <td height="20"><input type="checkbox" name="action_to[]" value="'.$entry->file_id.'" /></td>
			<td>'.$entry->fblike.'</td>
		    <td>'.$entry->first_name.' '.$entry->last_name.'</td>
		    <td>'.$entry->email.'</td>
		    <td>'.$entry->hometown.'</td>
		    <td><a href="'.base_url().'index.php/gallery/view/',$entry->file_id.'" class=iframe><img src="'.site_url('files/thumb/'.$entry->file_id.'/60/60').'" /></a></td>
		    <td>'.$status.'</td>
			<td>'.date("Y-m-d", strtotime($entry->date_added)).'</td>
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