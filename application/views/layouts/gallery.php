<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" 
	xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
	<title>Lazada Photo Contest</title>
	<link rel="stylesheet" href="<?=CSS?>colorbox.css" />
	<link rel="stylesheet" href="<?=CSS?>reset.css" />
	<link rel="stylesheet" href="<?=CSS?>style.css" />
	<?php echo $template['metadata']; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="<?=JS?>jquery.colorbox.js"></script>
		<script>
			// Initialize colorbox for gallery links
			$(function() {
			    if (!$.fn.colorbox) return;
			    // Initialize Colorbox for the IFRAME links, setting a loading width and height and
			    //   telling Colorbox to wait until the IFRAME finishes before calling onComplete
			    $(".iframe").colorbox({
			    "iframe": true,
			    "fastIframe": false,
			    "innerWidth": 50,
			    "innerHeight": 50,
			    "onComplete": function() {
			        // Do some work to automatically calculate the height and width of the IFRAME's content
			        var iframe = $("iframe.cboxIframe"),
			        body = iframe.contents().find("body"),
			        floatStyle = body.css("float");
			        // Float the BODY so that it assumes a minimal width
			        body.css("float", "left");
			        // Resize the colorbox
			        $.colorbox.resize({ "innerWidth": iframe.contents().width()+10, "innerHeight": iframe.contents().height()+10 })
			        // Remove our float style on the BODY
			        body.css("float", floatStyle);
			    }
			    });
			});
		</script>
	</head>
	
	<body>
	
	<!--fb:login-button></fb:login-button-->
	<div id="fb-root"></div>
	
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=319607828121764";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<!-- jerson -->
	<script>
	    window.fbAsyncInit = function() {
	        /*
			FB.init({
	            appId: '319607828121764',
	            status: true,
	            cookie: true,
	            xfbml: true
	        });
			*/
			
			/* for liking the image */
			$(document).ready(function(){
				FB.Event.subscribe('edge.create', function (href, widget) {
					var str = href;
					//alert (str);
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
					//alert (str);
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
	
		<?php echo $template['body'];?>
	</body>
	<!--input type="button" id="driver" value="Load Data" /-->
	<div id="feedback"></div>
</html>