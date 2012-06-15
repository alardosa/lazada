			//Refresh to get number of likes
			$(document).ready(function() {
				$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
				$("#refresh").click(function(event){
					//$(document).ajaxStop($.unblockUI);
					$.blockUI();
					$.post("http://lazadapromo.com/jers_test/liketest/",
						function(data) {
							location.reload();
							//$('#data').html(data);
							$.unblockUI();
					});
				});
			});				
				
				
				var DIALOG_MESSAGE		= "Are you sure you want to delete this? It cannot be undone.";
				// Confirmation
				$('a.confirm').live('click', function(e){
					e.preventDefault();
		
					var href		= $(this).attr('href'),
						removemsg	= $(this).attr('title');
		
					if (confirm(removemsg || DIALOG_MESSAGE))
					{
						$(this).trigger('click-confirmed');
		
						if ($.data(this, 'stop-click')){
							$.data(this, 'stop-click', false);
							return;
						}
		
						//submits it whether uniform likes it or not
						window.location.replace(href);
					}
				});
				
				//Select all items
				$(function () {
					$('.checkall').click(function () {
						$('#tables input:checkbox').attr('checked', this.checked);
					});
				});
