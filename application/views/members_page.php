<p>
	<?php
		echo $text;
		print_r($this->session->all_userdata());
	?>
	<br />
	<a href="<?php echo base_url()."index.php/site/logout"?>" class="btn btn-primary">Logout</a>
</p>