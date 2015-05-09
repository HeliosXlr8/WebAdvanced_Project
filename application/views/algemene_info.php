<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>
		<link rel="stylesheet" href="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "css", "bootstrap.min.css"))?>">
		<script src="<?=base_url(array("assets", "jquery", "jquery-2.1.3.min.js"))?>"></script>
		<script src="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "js", "bootstrap.min.js"))?>"></script>
	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1><?php echo $page_header ?></h1>
			</div>
		</div>
		
		<?php echo $menubar ?>
		
		<div class="container">
			<p>
				een pagina waar algemene info wordt getoond over de vereniging, een link naar hoe je lid kan worden bij de vereniging, voordelen die leden genieten,...
			</p>
		</div>
	</body>
</html>