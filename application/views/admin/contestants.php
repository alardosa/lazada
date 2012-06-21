

<div class="grid_12">
	<div class="box">
	<h2>Entries</h2>
		<input type="button" id="refresh" value="Refresh">
		<div style="margin: 0px; position: static; overflow: hidden;">
		<div id="tables" class="block" style="margin: 0px;">
		
		<?php echo form_open('entries/action'); ?>
		<table cellspacing="0" cellpadding="0" border="1">
		  <thead>
		  	<th width="50">&nbsp;</th>
			<?php foreach($fields as $field_name => $field_display): ?>
			<th <?php if ($sort_by == $field_name) echo "class=\"sort_$sort_order\"" ?>>
				<?php 
					echo anchor("entries/contestants/$field_name/" .
					(($sort_order == 'asc' && $sort_by == $field_name) ? 'desc' : 'asc') ,
					$field_display, 'class="sort"'); 
				?>
			</th>
			<?php endforeach; ?>
		  </thead>
		<?php
		
		//display age
		function age($birthday){
			list($year,$month,$day) = explode("-",$birthday);
			$year_diff  = date("Y") - $year;
			$month_diff = date("m") - $month;
			$day_diff   = date("d") - $day;
			if ($day_diff < 0 || $month_diff < 0)
			$year_diff--;
			return $year_diff;
		}

		  foreach ($entries as $entry):
		  echo'
		  <tr height="20">
		  	<td><a href="http://facebook.com/'.$entry->oauth_uid.'" target="_blank"><img src="http://graph.facebook.com/'.$entry->oauth_uid.'/picture" /></a></td>
		    <td>'.ucfirst($entry->last_name).', '.ucfirst($entry->first_name).'</td>
			<td>'.ucfirst($entry->gender).'</td>
			<td>'.age($entry->birthday).'</td>
			<td>'.date('F d, Y', strtotime($entry->birthday)).'</td>
		    <td>'.$entry->email.'</td>
		    <td>'.$entry->hometown.'</td>
			<td>'.date("Y-m-d", strtotime($entry->created_at)).'</td>
		  </tr>';
		  endforeach;
		?>
		</table>
		<?php echo $pagination['links']; ?>
	
		</div><!--#tables-->
		</div>

	</div><!--.box-->
</div><!--.grid_8--> 