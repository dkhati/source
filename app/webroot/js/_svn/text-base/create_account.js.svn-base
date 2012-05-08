var EmailExistChk=false,UserExistChk=false,emailMessage=false,passwordMessage=false,userMessage=false;

$(document).ready(function(){

 $('#UserFullName').focus(function() {
	 if($(this).val()==''){$('.message_full_name').html('<p>Enter your first and last name.</p>'); }
	 }).blur(function() {if($(this).val()!=''){$('.message_full_name').html('');	}
  });

   $('#UserEmailAddress').focus(function() {
	 if($(this).val()==''){	$('.message_email_address').html('<p>What\'s your email address?</p>'); }
	 }).blur(function() {emailMessage=true; emailtest();
  });

   $('#UserPassword').focus(function() {
	 if($(this).val()==''){	$('.message_password').html('<p>6 Characters or more! Get werid.</p>'); }
	 }).blur(function() {passwordMessage=true;passwordTest();
  });

   $('#UserUsername').focus(function() {
	 if($(this).val()==''){$('.message_username').html('<p>Don\'t worry you can change it later.</p>');}
	 }).blur(function() { if($.trim($(this).val())!=''){userTest($.trim($(this).val()));}else{userMessage=true;}
  });

	$('#cmac_btn_bg').click(function(){
				
			var fullnameBool=true;
			if($('#UserFullName').val()==''){
				$('.message_full_name').html('<p>Enter your first and last name.</p>');
				fullnameBool=false;
			}
			emailMessage=false;
			var emailbol= emailtest();
			
			passwordMessage=false;
			var passwordbol= passwordTest();
			
			userMessage=false;
			var userbol= userTest($.trim($('#UserUsername').val()));
		
			if(fullnameBool==false || emailbol==false || passwordbol==false  || userbol==false){
				return false;		
			}
			else{
				$('#UserCreateAccountForm').submit();
			}
	});

	$("#slidermain").find(".tos .scroller").one("mousedown", function () {
                var a = $(this),
                    b = 666;
                a.animate({
                    height: 400
                }, b).blur(), $("html, body").animate({
                    scrollTop: a.offset().top - 60
                }, b)
    });
});


function emailtest(){		
			if($('#UserEmailAddress').val() == "" || $('#UserEmailAddress').val() == "Email"){	
					if(emailMessage){
						$('.message_email_address').html('<p>What\'s your email address?</p>');
					}else{
						$('.message_email_address').html('<p class="colorred" >An email is required!</p>');
					}
					return false;
			}else if(IsEmail($('#UserEmailAddress').val()) == false)
			{
					$('.message_email_address').html('<p>Please enter a valid email address.</p>')
					return false;
			}else{
					EmailExists($('#UserEmailAddress').val());
			}

			if(EmailExistChk==true){
					$('.message_email_address').html('<p class="colorred height16">This email is already registered. Want <br>to <a href="'+site_url+'/signin" class="colorblue">login</a> or <a href="'+site_url+'/signin/password_recovery" class="colorblue">recover your password</a>?</p>');
					return false;
			}
	
			$('.message_email_address').html('');
}

function IsEmail(email_address_var) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  if( !emailReg.test(email_address_var) ) {
			return false;
		  } else {
			return true;
		  }
	}

function EmailExists(email_address_var){
		$.ajax({
		 type : "get",
         url : site_url+'/ajaxrequest/emailexist/'+email_address_var,
		 dataType : "text",
		 async:false,
         success: function(data) {
			if(data=='yes'){
				EmailExistChk=true;			
			}
			else{
				EmailExistChk=false;
			}
         }
		});
}

function passwordTest(){			
			if($.trim($('#UserPassword').val()).length<6){
				if(passwordMessage && $.trim($('#UserPassword').val())==''){
					$('.message_password').html('<p>6 Characters or more! Get werid.</p>');
				}else{
					$('.message_password').html('<p class="colorred">Password must be at least 6 characters..</p>');
				}
				return false;
			}
			$('.message_password').html('');
}

function userTest(UsernameVar){
		if(UsernameVar==''){
			if(userMessage){
				$('.message_username').html('<p>Don\'t worry you can change it later.</p>');
			}else{
				$('.message_username').html('<p class="colorred">A username is required!</p>');
			}
			return false;
		}
		else{
			UserExists(UsernameVar);
			if(UserExistChk==true){
				$('.message_username').html('<p class="colorred">This username is already taken!</p>');
				return false;
			}
			else{
				$('.message_username').html('');
			}
		}
}

function UserExists(usernamevar){		
		$.ajax({
		 type : "get",
         url : site_url+'/ajaxrequest/UserExist/'+usernamevar,
		 dataType : "text",
		 async:false,
         success: function(data) {
			if(data=='yes'){
				UserExistChk=true;		
			}
			else{
				UserExistChk=false;
			}
         }
		});
}