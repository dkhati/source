<div id="prc">
<?php echo $this->Form->create(array('label' => false,'div' =>false)); ?>
		<div id="prc_top">
        	<h3>Forgot your Password?</h3>
            <p>Type your email or username below to reset pasword.</p>
        </div>
        <div id="prc_form">
			<?php echo $this->Form->input('User.email_address',array('label' => false,'div' =>false,'placeholder'=>'Email address'));?>
            <span>or</span>
			<?php echo $this->Form->input('User.username',array('label' => false,'div' =>false,'placeholder'=>'Username'));?>
        </div>
		<a href="#" id="next_btn" onclick="$('#UserPasswordRecoveryForm').submit()" >Next</a>
<?php echo $this->Form->end(); ?>
</div>