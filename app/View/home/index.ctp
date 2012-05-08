    	<div id="fpc">
			<h3>Consultr<br />
			<small>Collaborate with the world's leading <br />
			Professional Consultants</small></h3>
			<div id="fpc_form">
			<?php echo $this->Form->create(array('action'=>'index')); ?>
				 <?php echo $this->Form->input('username',array('label'=>false,'div'=>false,'id'=>'fpc_fn','placeholder'=>'Full Name'));?>
				 <div class="clear"></div>
				 <?php echo $this->Form->input('password',array('type'=>'password','label'=>false,'div'=>false,'id'=>'fpc_psw','placeholder'=>'Password'));?>
				 <a href="#" id="SignInSubmit" class="sign_in_btn" onclick="$('#UserIndexForm').submit()" >Sign in</a>
				 <div class="clear"></div>
				 <a href="<?php echo $this->base.'/signup' ?>" id="fpc_btn2" >Create my account</a>
			<?php echo $this->Form->end; ?>
			</div>
		</div>