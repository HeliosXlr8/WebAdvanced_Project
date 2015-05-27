<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>
		<link rel="stylesheet" href="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "css", "bootstrap.min.css"))?>">
		<link rel="stylesheet" href="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "css", "bootstrap-datetimepicker.min.css"))?>">
		<link rel="stylesheet" href="<?=base_url(array("assets", "custom", "css", "defaultstyle.css"))?>">
		<script src="<?=base_url(array("assets", "jquery", "jquery-2.1.3.min.js"))?>"></script>
		<script src="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "js", "bootstrap.min.js"))?>"></script>
		<script src="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "js", "moment.min.js"))?>"></script>
		<script src="<?=base_url(array("assets", "bootstrap-3.3.4-dist", "js", "bootstrap-datetimepicker.min.js"))?>"></script>
		<script src="https://apis.google.com/js/client:platform.js" async defer></script>
	</head>
	<body>
		<script>
			window.fbAsyncInit = function() {
				FB.init({
					appId : '1153150484712220',
					xfbml : true,
					version : 'v2.3'
				});
			}; ( function(d, s, id) {
					var js,
					    fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) {
						return;
					}
					js = d.createElement(s);
					js.id = id;
					js.src = "//connect.facebook.net/en_US/sdk.js";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="container">