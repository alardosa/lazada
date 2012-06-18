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
	<script type="text/javascript">
		$(function(){
			$('.file_upload').uniform();
		});
	</script>	
		<div id="fb-root"></div>
		
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=319607828121764";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<script>
		    window.fbAsyncInit = function() {
				
				/* for liking the image */
				$(document).ready(function(){
					FB.Event.subscribe('edge.create', function (href, widget) {
						var str = href;
						alert (str);
						$.post("http://lazadapromo.com/jers_test/check/check.php",{ url: str },
				        function(data) {
				            $('#feedback').html(data);
				        });
					});
				});
				
				/* for unliking the image */
		    	$(document).ready(function(){
		        	FB.Event.subscribe('edge.remove', function (href, widget) {
		            	var str = href;
						alert (str);
						$.post("http://lazadapromo.com/jers_test/check/check.php",{ url: str },
				        function(data) {
				            $('#feedback').html(data);
				        });
					});   
		        });
		    };
		
		    (function(d) {
		        var js, id = 'facebook-jssdk'; if (d.getElementById(id)) { return; }
		        js = d.createElement('script'); js.id = id; js.async = true;
		        js.src = "//connect.facebook.net/en_US/all.js";
		        d.getElementsByTagName('head')[0].appendChild(js);
		    }(document));
		</script>
		
		<!-- twitter -->
		<script>
		!function(d,s,id){
			var js,fjs=d.getElementsByTagName(s)[0];
			if(!d.getElementById(id)){
				js=d.createElement(s);
				js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);
		}}(document,"script","twitter-wjs");
		</script>
		<!-- twitter -->
	</head>
	
	<body>
		<?php echo $template['body'];?>
		<div id="feedback"></div>
	</body>
</html>