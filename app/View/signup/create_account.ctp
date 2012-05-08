<?php echo $this->Html->script('create_account',false);  ?>
<?php echo $this->Html->css('term-slider.css' ,null, array('inline' => false));  ?>
<?php echo $this->Html->script('jquery-1.5b1',false);  ?>
<script type="text/javascript" src="http://platform.linkedin.com/in.js">
  api_key: qqv5pbiktf8s
  authorize: true 
</script>
<script type="text/javascript">
function loadData() {
 IN.API.Profile("me")
    .fields(["id", "firstName", "lastName", "pictureUrl","headline"])
    .result(function(result) {
      profile = result.values[0];
	 // alert(profile.id);
      profHTML =  profile.firstName + " " + profile.lastName;
      $("#UserFullName").val(profHTML);
    });
}
</script>
<span class="hide"><script type="IN/Login" data-onAuth="loadData"></script></span>
<div id="cmac">
<?php echo $this->Form->create(array('label' => false,'div' =>false)); ?>
		<h3 id="cmac_ttl">Join Consultr today.</h3>
		<div id="cmac_form">
        	<?php echo $this->Form->input('User.full_name',array('placeholder'=>'Full Name','error' => false));?>
			<span class="message_full_name"></span>
    	<div class="clear"></div>
        	<?php echo $this->Form->input('User.email_address',array('placeholder'=>'Email','error' => false));?>
			<span class="message_email_address"></span>
    	<div class="clear"></div>
        	<?php echo $this->Form->input('User.password',array('type'=>'password','placeholder'=>'Password','error' => false));?>
			<span class="message_password"></span>
    	<div class="clear"></div>
        	<?php echo $this->Form->input('User.username',array('placeholder'=>'Username','error' => false));?>
			<span class="message_username"></span>
    	</div>
        <span id="keep_me"><?php echo $this->Form->checkbox('User.loggedIn');?><label for="UserLoggedIn"> Keep me logged-in on this computer.</label></span>
<table border=1>
	<tr>
		<td>
			<div id="slidermain">
				<div class="tos">
						<div class="scroller">
						  <p class="header">By clicking the button, you agree to the terms below:</p>
						<div class="import"> 
							<?php echo $this->element('termsOfservice'); ?>
						</div>
					</div>
				</div>
			</div>
		</td>
		<td class='valigntop'>
			<div id="terms_box">
				 <p>Printable versions:<br /><a href="<?php echo $this->base.'/tos'; ?>">Terms of Service - Privacy</a></p>
			 </div>
		</td>
	</tr>
		<tr>
		<td colspan=2 >
			<a href="#" id="cmac_btn_bg" >Create my account</a>
				<p id="cmac_note_txt">Note: Others will be able to find you by name, username or email.Your email<br /> will not be show publicly. You can change your privacy settings any time.</p>
		</td>
	</tr>
</table>
<?php echo $this->Form->end(); ?> 	
</div>