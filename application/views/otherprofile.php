<div class="row">
	<div class="col-sm-6">
		<?php
		
			echo "<p>" . $text . "</p>";
		
			$data = array('class' => 'form-horizontal');
			echo form_open('user/update_profile', $data);
			
			echo "<input type=\"hidden\" name=\"email\" value=\"" . $userInfo['email'] . "\" />";
			echo "<input type=\"hidden\" name=\"id\" value=\"" . $userInfo['id'] . "\" />";
			
			$data = array('class' => 'form-control', 'name' => 'nickname', 'placeholder' => $userInfo['nickname']);
			echo "<p>";
			echo '<div class="input-group">';
			echo '<span class="input-group-addon">Nickname</span>';
			echo form_input($data);
			echo '</div>';
			echo "</p>";
			
			$data = array('class' => 'form-control', 'name' => 'role', 'placeholder' => $userInfo['role']);
			echo "<p>";
			echo '<div class="input-group">';
			echo '<span class="input-group-addon">Role</span>';
			echo form_input($data);
			echo '</div>';
			echo "</p>";
			
			$data = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'Old Password');
			echo "<p>";
			echo form_password($data);
			echo "</p>";
			
			$data = array('class' => 'form-control', 'name' => 'newpassword', 'placeholder' => 'New Password');
			echo "<p>";
			echo form_password($data);
			echo "</p>";
			
			$data = array('class' => 'form-control', 'name' => 'cpassword', 'placeholder' => 'Confirm password');
			echo "<p>";
			echo form_password($data);
			echo "</p>";
			
			$data = array('class' => 'btn btn-default', 'name' => 'update_submit', 'value' => 'Update');
			echo "<p>";
			echo form_submit($data);
			echo "</p>";
			
			echo form_close();
		?>
	</div>
	<div class="col-sm-6">
		<?php
			echo validation_errors();
			if ($alert != '') {
				echo '<div class="alert alert-dismissible alert-info">';
  				echo $alert;
				echo '</div>';
			}
		?>
	</div>
</div>