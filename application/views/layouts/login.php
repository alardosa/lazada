<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo $template['title']?></title>
		<link rel="stylesheet" type="text/css" href="<?=CSS?>reset.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?=CSS?>auth/text.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?=CSS?>auth/grid.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?=CSS?>auth/layout.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?=CSS?>auth/nav.css" media="screen" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?=CSS?>auth/ie6.css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="<?=CSS?>auth/ie.css" media="screen" /><![endif]-->
	</head>
	<body>
		<div class="container_12">
			<div class="grid_12">
				<h1 id="branding">
					Lazada Photo Contest Admin
				</h1>
			</div>
			<div class="clear"></div>
			<div class="grid_12">
				<ul class="nav main">
					<li></li>
				</ul>
			</div>

			<div class="clear"></div>

				<?php echo $template['body']; ?>

			<div class="clear"></div>
			<div class="grid_12" id="site_info">
				<div class="box">
					<p></p>
				</div>
			</div>
			<div class="clear"></div>
		</div>

	</body>
</html>