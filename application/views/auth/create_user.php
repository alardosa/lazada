<div class="grid_7">
<div class="box">
	<h2><?php echo ($this->uri->segment(2) == 'create_user') ? 'Create User' : 'Edit User'; ?></h2>
<div class='mainInfo'>

	<br />
	<p>Please enter the users information below.</p>
	
    <?php echo form_open();?>

		<fieldset>
			<legend>Personal Information</legend>

		      <p><label> Username:</label><br />
		      <?php echo form_input('user_name',$user->user_name);?>
		      </p>
			  		
		      <p><label> Name:</label><br />
		      <?php echo form_input('first_name',$user->first_name);?>
		      </p>
		      
		      <p><label>Last Name:</label><br />
		      <?php echo form_input('last_name', $user->last_name);?>
		      </p>
		      
		      <p><label>Email:</label><br />
		      <?php echo form_input('email',$user->email);?>
		      </p>
		
			  <?php if($this->uri->segment(2) == 'create_user'): ?>
		      <p><label>Password:</label><br />
		      <?php echo form_password('password');?>
		      </p>
		      
		      <p><label>Confirm Password:</label><br />
		      <?php echo form_password('password_confirm');?>
		      </p>
			  <?php endif; ?>
	
				<?php echo form_submit('submit', ($this->uri->segment(2) == 'create_user') ? 'Create User' : 'Edit User');?>
		</fieldset>
      
    <?php echo form_close();?>

</div>
</div><!--.box-->
</div><!--.grid_8-->
