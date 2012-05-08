 <?php echo $this->Form->create('Notifications'); ?>
		<div class="main border" id="not_main_wrp">
        	<div class="main_ttl">
            	<h3>Notifications</h3>
                <h4>
                Control when and how often Consultr sends emails to you. (You can change your<br />
                SMS notifications on <a href="#">your mobile settings page</a>).
                </h4>
            </div>
            <div class="form_box not_main">
            	<h5>Messages</h5>
                <div class="clear"></div>
                <h6>Email me when</h6>
                	<div class="qaz">
                        <?php echo $this->Form->checkbox('messages_direct',array('label'=>''));?>
                        <span>I'm sent a direct message</span>						 
                        <div class="clear"></div>
                        <?php echo $this->Form->checkbox('messages_reply',array('label'=>''));?>
                        <span>I'm sent a reply or @mentioned</span>
                    </div>       
            </div>
            <div class="form_box not_main">
            	<h5>Fee and Schedule</h5>
                <div class="clear"></div>
                <h6>Email me when</h6>
                	<div class="qaz">
                        <?php echo $this->Form->checkbox('fee_and_schedule_inquiries',array('label'=>''));?>
                        <span>Someone inquiries about my consulting fee</span>
                        <div class="clear"></div>
                        <?php echo $this->Form->checkbox('fee_and_schedule_meeting',array('label'=>''));?>
                        <span>Someone request a meeting</span>
                        <div class="clear"></div>
                        <?php echo $this->Form->checkbox('fee_and_schedule_30minprior',array('label'=>''));?>
                        <span>(<a href="#">Mobile</a>) Text message me 30min prior to a meeting.</span>
                    </div>       
            </div>
            <div class="form_box not_main">
            	<h5>Activity</h5>
                <div class="clear"></div>
                <h6>Email me when</h6>
                	<div class="qaz">
						<?php echo $this->Form->checkbox('activity_followed',array('label'=>''));?>
                        <span>I'm followed by someone new</span>
                        <div class="clear"></div>
                        <?php echo $this->Form->checkbox('activity_linked',array('label'=>''));?>
                        <span>My post or comments are liked</span>
                        <div class="clear"></div>
                        <?php echo $this->Form->checkbox('activity_reposted',array('label'=>''));?>
                        <span>My post or comments are reposted</span>
                    </div>       
            </div>
            <div class="form_box not_main not_main_last">
            	<h5>Updates</h5>
                <div class="clear"></div>
                <h6>Email me when</h6>
                	<div class="qaz">
                        <?php echo $this->Form->checkbox('updates_new_products',array('label'=>''));?>
                        <span>Updates about new Consultr products, features, and tips</span>
                        <div class="clear"></div>
                        <?php echo $this->Form->checkbox('updates_products_update',array('label'=>''));?>
                        <span>Product or service updates related to my Consultr account</span>
                    </div>       
            </div>
            <input type="submit" value="Save changes" class="save_btn" id="save16_btn" /> 
        </div>
 <?php echo $this->Form->end(); ?> 	 