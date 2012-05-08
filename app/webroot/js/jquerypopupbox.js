$(document).ready(function() {
	$('a.login-window').click(function() {
		$('#SignInForm').show();
		$('#ForGetForm').hide();
                //Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border see css style
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	  }); 
	return false;
	});

	$('#LoginButton').click(function(){
		if($('#login_username').val()=='' || $('#login_username').val()=='Username'){
			alert('Please enter username.');
			return false;
		}

		if($('#login_password').val()=='' || $('#login_password').val()=='Password'){
			alert('Please enter password.');
			return false;
		}

			$.ajax({
			 type : "post",
			 url : site_url+'/ajaxrequest/UserLogin',
			 dataType : "text",
			 data:'userName='+$('#login_username').val()+"&userPassword="+$('#login_password').val(),
			 success: function(data) {
				if(data=='yes'){
					window.location=site_url+'/settings';
				}
				else{
					alert('Invalid username or password.');
				}
			 }
			});
	
		return false;		
	});

	$('#ForgetButton').click(function(){
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

		if ($('#login_email_address').val() == "" || $('#login_email_address').val() == "Email") 
		{ 
			alert('Please enter email address');
			return false;
		} 
		else if(!emailReg.test($('#login_email_address').val()))
		{
			alert('Please enter a valid email address');
			return false;
		}

			
		ForgetEmailExists($('#login_email_address').val());

		if(forgetEmailExist==false){
			alert('Email does not exist');		
		}

		$.ajax({
		 type : "post",
         url : site_url+'/ajaxrequest/passwordSend',
		 dataType : "text",
		 data:'emailAddress='+$('#login_email_address').val(),
		 async:false,
         success: function(data) {
			if(data=='yes'){
				 alert('Username & password sent to your email address');
				 
				$('#mask , .login-popup').fadeOut(300 , function() {
					$('#mask').remove();  
				}); 
				return false;
			}
         }
		});

		return false;	
	});

	$('#forgetPassword').click(function(){	
		$('#SignInForm').hide();
		$('#ForGetForm').show();	
	});

	$('#SignInBox').click(function(){	
		$('#SignInForm').show();
		$('#ForGetForm').hide();	
	});


});

var forgetEmailExist=false;

function ForgetEmailExists(email_address_var){
		$.ajax({
		 type : "get",
         url : site_url+'/ajaxrequest/emailexist/'+email_address_var,
		 dataType : "text",
		 async:false,
         success: function(data) {
			if(data=='yes'){
				forgetEmailExist=true;			
			}
			else{
				forgetEmailExist=false;
			}
         }
		});
}