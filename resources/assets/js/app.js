window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

$( document ).ready(function() {
		var $username = $('#username'),
				$pass		 = $('#password'),
				$token		 = $('#token');

		$username.on('change', function() { $(this).removeClass('error'); });
		$pass.on('change', function() { $(this).removeClass('error'); });


    $('#add-resena').on('click', function() {
    	var $this = $(this);
    	
    	if ( $this.hasClass('not-logged') ) {
    		
				$('#login-modal').modal();

				$('#login-modal-submit').on('click', function (evt) {
					evt.preventDefault();

					//$(this).addClass('disabled');

					$('#ajax_loading').show();

					

					var error = 0;

					if ($username.val().length === 0 ) {
							$username.addClass('error');
							error++;
					}
					if ($pass.val().length === 0 ) {
							$pass.addClass('error');
							error++;
					}

					if (error > 0) {
						return;
					}

					$.ajax({ 
					    type: "POST",
					    url: "/login",  // Send the login info to this page
					    data: 'email=' + $username.val() + '&password=' + $pass.val() + '&_token=' + $token.val(), 
					    success: function(msg){
					    	console.log(msg);
					    }
					  });
				});
			}
		});
});
			