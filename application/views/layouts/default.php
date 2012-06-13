<!DOCTYPE html>
<html>
	<head>
	<title>Lazada Photo Contest</title>
	<link rel="stylesheet" href="<?=CSS?>reset.css" />
	<link rel="stylesheet" href="<?=CSS?>style.css" />
	</head>
	
	<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<!--script src="http://connect.facebook.net/en_US/all.js"></script-->
	<script src="http://connect.facebook.net/en_US/all.js">
	FB.Event.subscribe('edge.create',
    	function(response) {
        	alert('You liked the URL: ' + response);
    	}
	);
	</script>

		<?php echo $template['body'];?>
	</body>
</html>