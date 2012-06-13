<div class="grid_8">
<div class="box">
<h2>Users</h2>
<div style="margin: 0px; position: static; overflow: hidden;">
<div id="tables" class="block" style="margin: 0px;">

<div class="mainInfo">

	<p>Below is a list of the users.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
	<table cellpadding=0 cellspacing=10>
		<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Groups</th>
			<th>Status</th>
		</tr>
		</thead>
		<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo $user->first_name;?></td>
				<td><?php echo $user->last_name;?></td>
				<td><?php echo $user->email;?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
						<?php echo $group->name;?><br />
	                <?php endforeach?>
				</td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, 'Active') : anchor("auth/activate/". $user->id, 'Inactive');?></td>
			</tr>
		<?php endforeach;?>
	</table>

	
</div>
</div><!--#tables-->

</div><!--.box-->
</div><!--.grid_8--> 
</div>