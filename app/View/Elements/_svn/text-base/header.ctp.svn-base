<?php $sessionVal=$this->Session->read('CurUser');
echo $this->Html->css('loginbox'); 
echo $this->Html->script('jquerypopupbox'); 
?>	
<div class="hdr_wrp">
	<?php if(empty($sessionVal)): ?>
	<div class="hdr" id="hdr6">
    	<a href="<?php echo $this->base; ?>" class="logo">Consultr</a>		
        <p>Have an account? <a href="#login-box" class="login-window">Sign In</a></p>
    </div>
	<div id="login-box" class="login-popup">
			<a href="#" class="close"><img src="<?php echo $this->base; ?>/images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
			  <form id="SignInForm" method="post" class="signin" action="#">
					<fieldset class="textbox">
					<label class="username">
					<span>Username</span>
					<input id="login_username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
					</label>
					<label class="password">
					<span>Password</span>
					<input id="login_password" name="password" value="" type="password" placeholder="Password">
					</label>
					<button class="submit button" id="LoginButton" type="button">Sign in</button>
					<p>
					<a class="forgot" id="forgetPassword" href="#">Forgot your password?</a>
					</p>        
					</fieldset>
			  </form>
			  <form  id="ForGetForm" method="post" class="signin hide" action="#">
					<fieldset class="textbox">
						<label class="username">
						<span>Email Address</span>
						<input id="login_email_address" name="email_address" value="" type="text" autocomplete="on" placeholder="Email">
						</label>
						<button class="submit button" id="ForgetButton" type="button">Send</button>
						<p>
						<a class="forgot" id="SignInBox" href="#">Sign in</a>
						</p>        
					</fieldset>
			  </form> 
	</div>
	<?php else: ?>
	<div class="hdr" id="hdr15">
    	<a href="<?php echo $this->base; ?>" class="logo">Consultr</a>
        <p>
        	<b>
            	<img src="<?php echo $this->base; ?>/images/hdr_ico1.png" width="10" height="14" alt="" />
                7
            </b>
            <b>
            	<img src="<?php echo $this->base; ?>/images/hdr_ico2.png" width="17" height="14" alt="" />
                12
            </b>
            <b>
            	<img src="<?php echo $this->base; ?>/images/hdr_ico3.png" width="16" height="14" alt="" />
                12
            </b>
        </p>
        <input type="text" placeholder="Search" id="hdr_srch" />
		<a class="logo" id="signOut" href="<?php echo $this->base; ?>/users/logout">Sign Out</a>
    </div>
	<?php  endif; ?>
</div>