<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<?php
					foreach ($navigation as $key => $value) {
						echo '<li><a href="' . site_url($value) . '">' . $key . '</a></li>';
					}
				?>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php
	        		if (count($loginnav) > 1) {
						echo '<li class="dropdown navbar-right">';
						echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $identity . '<span class="caret"></span></a>';
						echo '<ul class="dropdown-menu" role="menu">';
						foreach ($adminnav as $key => $value) {
							echo '<li><a href="' . site_url($value) . '">' . $key . '</a></li>';
						}
						echo '<li class="divider"></li>';
						foreach ($loginnav as $key => $value) {
							echo '<li><a href="' . site_url($value) . '">' . $key . '</a></li>';
						}
						echo '</ul>';
					}
					else {
						foreach ($loginnav as $key => $value) {
							echo '<li><a href="' . site_url($value) . '">' . $key . '</a></li>';
						}
					}
				?>
      		</ul>
		</div>
	</div>
</nav>
<h2><?php echo $page_header ?></h2>