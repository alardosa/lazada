<div class="grid_7">
<div class="box">
<h2>Change Password</h2>

<?php echo form_open();?>

      <p>Old Password:<br />
      <?php echo form_input($old_password);?>
      </p>
      
      <p>New Password (at least <?php echo $min_password_length;?> characters long):<br />
      <?php echo form_input($new_password);?>
      </p>
      
      <p>Confirm New Password:<br />
      <?php echo form_input($new_password_confirm);?>
      </p>
      
      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', 'Change');?></p>
      
<?php echo form_close();?>

</div><!--.box-->
</div><!--.grid_7-->
