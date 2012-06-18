<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" 
	xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
	<title>Lazada Photo Contest</title>
	<!--<link rel="stylesheet" href="<?=CSS?>reset.css" />-->
	<link rel="stylesheet" href="<?=CSS?>colorbox.css" />
	<link rel="stylesheet" href="<?=CSS?>style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	
	<?php echo $template['metadata']; ?>
	
	<script type="text/javascript" src="<?=JS?>jquery.colorbox.js"></script>	
	<script type="text/javascript" src="<?=JS?>colorbox_script.js"></script>

	<div id="fb-root"></div>
	<script src="<?=JS?>fb-tw_script.js"></script>
	</head>
	
	<body>
		<?php echo $template['body'];?>
		<div id="feedback"></div>
	</body>
</html>