<div class="row">
	<div class="col-sm-6">
		<?php
			$data = array('class' => 'form-horizontal');
			echo form_open('user/login_validation', $data);
			
			$data = array('class' => 'form-control', 'name' => 'email', 'placeholder' => 'Email', 'value' => set_value('email'));
			echo "<p>";
			echo form_input($data);
			echo "</p>";
			
			$data = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Password');
			echo "<p>";
			echo form_password($data);
			echo "</p>";
			
			$data = array('class' => 'btn btn-default', 'name' => 'login_submit', 'value' => 'Login');
			echo "<p>";
			echo form_submit($data);
		?>
			<a href="<?php echo base_url()."index.php/site/register"?>" class="btn btn-primary">Sign up!</a>
		<?php
			echo "</p>";
			
			echo form_close();
		?>
	</div>
	<div class="col-sm-6">
		<?php
			echo validation_errors();
		?>
	</div>
</div>