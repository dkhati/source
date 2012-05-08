<?php echo $this->Form->create('Account',array('url'=>'account')); ?>
		<div class="main border" id="acc_main">
        	<div class="main_ttl">
            	<h3>Account</h3>
                <h4>Change your basic account, language, privacy and location settings</h4>
            </div>
            <div class="form_box" id="basic_top">
            	<div class="clear"></div>
                    <label for="UserUsername">Username</label>
					 <?php echo $this->Form->input('User.username',array('label'=>''));?>
                    <p>https://twitter.com/</p>
            	<div class="clear"></div>
                    <label for="UserEmailAddress">Email</label>
                    <?php echo $this->Form->input('User.email_address',array('label'=>''));?>
                    <p>Email will not be publicly displayed</p>
            </div>
            <div class="form_box" id="basic_main">
            	<div class="clear"></div>
                    <label for="AccountLanguage">Language</label>
					<?php echo $this->Form->input('Account.language',array('label'=>''));?>
                    <p>What language would you like Consultr in?</p>
            	<div class="clear"></div>
                    <label for="AccountTimeZone">Time Zone</label>
                    <?php echo $this->Form->input('Account.time_zone',array('label'=>''));?>
                    <p>&nbsp;</p>  
            	<div class="clear"></div>
                    <label for="AccountCountry">Country</label>
                     <?php echo $this->Form->input('Account.country',array('label'=>''));?>
                    <p>Select your country. This setting is saved to this browser. </p>  
            	<div class="clear"></div>
                    <label for="AccountHttpsOnly">HTTPS only</label>
                    <?php echo $this->Form->checkbox('Account.https_only',array('label'=>''));?>
                    <span>Always use HTTPS</span>
                    <p>Use a secure connection where possible. </p>    
            	<div class="clear"></div>
                <input type="submit" onclick="$('#AccountAccountForm').submit()" value="Save changes" class="save_btn" id="save15_btn" /> 
                <a href="#" id="deactv_btn">Deactivate my account</a>      
            </div>
        </div>
<?php echo $this->Form->end(); ?>