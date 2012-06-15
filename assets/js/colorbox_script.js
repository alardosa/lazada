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