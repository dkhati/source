<?php echo $this->Form->create('Mobile'); ?>
		<div class="main border" id="">
        	<div class="main_ttl">
            	<h3>Mobile</h3>
                <h4>Set up your mobile connection to Consultr to receive notifications. </h4>
            </div>
            <div class="form_box mobile" id="passw_main">
            	<div class="clear"></div>
                    <label for="MobileCountryRegion">Country/region</label>
					<?php echo $this->Form->input('country_region',array('label'=>''));?>
            		<div class="clear"></div>
            	<div class="clear"></div>
                    <label for="MobilePhoneNumber">Phone number</label>
                    <?php echo $this->Form->input('phone_number',array('label'=>''));?>
            	<div class="clear"></div>
                    <?php echo $this->Form->input('find_by_mb',array('label'=>''));?>
                    <span>Lets others find me by my phone number.</span>
            	<div class="clear"></div> 
				<input type="submit" value="Save changes" class="save_btn" id="save16_btn" />    
            </div>
        </div>
<?php echo $this->Form->end(); ?> 	 