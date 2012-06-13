<div class="grid_7">
<div class="box">
	<h2>Create User</h2>
<div class='mainInfo'>

	<br />
	<p>Please enter the users information below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/create_user");?>

		<fieldset>
			<legend>Personal Information</legend>

		      <p><label> Username:</label><br />
		      <?php echo form_input($user_name);?>
		      </p>
			  		
		      <p><label> Name:</label><br />
		      <?php echo form_input($first_name);?>
		      </p>
		      
		      <p><label>Last Name:</label><br />
		      <?php echo form_input($last_name);?>
		      </p>
		      
		      <p><label>Email:</label><br />
		      <?php echo form_input($email);?>
		      </p>
		
		      <p><label>Password:</label><br />
		      <?php echo form_input($password);?>
		      </p>
		      
		      <p><label>Confirm Password:</label><br />
		      <?php echo form_input($password_confirm);?>
		      </p>
	
				<?php echo form_submit('submit', 'Create User');?>
		</fieldset>
      
    <?php echo form_close();?>

</div>
</div><!--.box-->
</div><!--.grid_8-->
