(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=319607828121764";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


    window.fbAsyncInit = function() {
		
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


/* twitter */

!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0];
	if(!d.getElementById(id)){
		js=d.createElement(s);
		js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);
}}(document,"script","twitter-wjs");

/* twitter */