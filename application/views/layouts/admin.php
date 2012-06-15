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
		<link rel="stylesheet" href="<?=CSS?>colorbox.css" />
	<?php echo $template['metadata']; ?>
	
	<script src="<?=JS?>jquery.min.js"></script>
	<script src="<?=JS?>jQueryBlockUI.js"></script>
	<script src="<?=JS?>jquery.colorbox.js"></script>
	<style>
		#mainWrap{
			width: 960px;
			margin: 0 auto;
			text-align: center;
		}
		
		.form{
			text-align: left;
		}
		
		ul.gallery{float:left}
		ul.gallery li{
			float: left;
			list-style: none;
			margin: 0 15px 10px 0;
		}
		iframe{
			overflow: hidden;
		}
	</style>
		
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
		
		<script type="text/javascript">
		$(function () {
		    $('.checkall').click(function () {
		        $('#tables input:checkbox').attr('checked', this.checked);
		    });
		});
		</script>

		<script type="text/javascript">
		$(document).ready(function() {
			$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
      		$("#refresh").click(function(event){
				//$(document).ajaxStop($.unblockUI);
				$.blockUI();
          		$.post("http://lazadapromo.com/jers_test/liketest/",
             		function(data) {
						//location.reload();
						//$('#data').html(data);
						$.unblockUI();
            	});
      		});
   		});
		</script>
		
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
					<li><a href="<?php echo site_url('entries');?>">Entries</a></li>
					<li><a href="<?php echo site_url('auth');?>">Back-end Users</a></li>
					<li><a href="<?php echo site_url('auth/create_user');?>">Create a new user</a></li>
					<li class="secondary">
						<a href="<?php echo site_url('auth/logout');?>" title="Logout">Logout</a>
					</li>
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