	var EmailExistChk=false;
	var UserExistChk=false;

	$(document).ready(function(){
	
	$('.error').hide(); 
	
	$("#submitForm").click(function() {  
    // validate and process form here 
			
			var full_name = $("input#full_name").val();  
			var email_address = $("input#email_address").val();  
			var password = $("input#password").val();  
			var username = $("input#username").val();  
			
			
			UserExists(username);
			
			if (full_name == "" || full_name== 'Full Name') 
				{  
					$("label#fullname_error").show();  
					$("input#full_name").focus();  
					return false;
				} 
				else{
					$("label#fullname_error").hide();  
				}
						
			if (email_address == "" || email_address == "Email") 
				{ 
					$("label#email_error").show();  
					$("input#email_address").focus(); 

					return false;
				} 
				else{
					$("label#email_error").hide();  
					EmailExists(email_address);
				}
			if(IsEmail(email_address) == false)
				{
					$("label#email_invalid").show();  
					$("input#email_address").focus();
					return false;
				}
			else{
					$("label#email_invalid").hide();			
			}
			if(EmailExistChk==true){
					$("label#email_exist").show();
					$("input#email_address").focus();
					return false;
			}
			else{	
					$("label#email_exist").hide();
				}				

			if (password == "" || password == 'Password') 
				{  
					$("label#password_error").show();  
					$("input#password ").focus();
					return false;
				} 
			else{
					$("label#password_error").hide();  
			}
				
			
			if (username == "" || username == "Username") 
				{  
					$("label#username_error").show();  
					$("input#username").focus();  
					return false;
				}
			else if(UserExistChk==true){
					$("label#username_error").hide(); 
					$("label#username_exist").show();
					return false;
			}	
			else{
					$("label#username_error").hide();  
					$("label#username_exist").hide();
			}

				$('#join_form').submit();
		}); 
	}); 
	
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