	<div class="grid_4" style="margin: 6% auto 6%;">
				<div class="box">
					<h2>
						<a href="#" id="toggle-login-forms">Login Forms</a>
					</h2>
					<div class="block" id="login-forms">
						<?php echo form_open("auth/login");?>
							<fieldset class="login">
								<legend>Login</legend>
								<p class="notice"><?php echo $message;?></p>
								<p>
									<label>Username: </label>
									<?php echo form_input($identity);?>
								</p>
								<p>
									<label>Password: </label>
									<?php echo form_input($password);?>
								</p>
								<p>
									<label for="remember">Remember Me:</label>
									<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
								 </p>
								<input class="login button" type="submit" value="Login" />
							</fieldset>
						<?php echo form_close();?>
					</div>
				</div>
		</div>
