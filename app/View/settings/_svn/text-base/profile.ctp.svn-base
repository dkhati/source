 <?php echo $this->Form->create('User',array('type' => 'file')); ?>
		<div class="main border">
        	<div class="main_ttl">
            	<h3>Profile</h3>
                <h4>This information will appear on your public profile, search results and beyond.</h4>
            </div>
            <div class="form_box" id="foto_upload">
            	<label for="ProfilePicture">Picture</label>
                <div id="foto_box">
				<?php if(!empty($profilePicture)){ 
				echo	$this->Image->resize('/uploads/' . $profilePicture, 89, 84);
					 } ?>
				</div>
                <div id="upload">
					<?php echo $this->Form->file('picture',array('label'=>''));?>
            		<div class="clear"></div>
                    <span>Maximum size of 700K, JPG, GIF, PNG</span>
                </div>
            </div>
            <div class="form_box" id="profile_main">
            	<div class="clear"></div>
                    <label for="ProfileName">Name</label>
                    <?php echo $this->Form->input('full_name',array('label'=>''));?>
                    <p>Enter your real name, so people you know can recognize you.</p>
            	<div class="clear"></div>
                    <label for="ProfileLocation">Location</label>
                    <?php echo $this->Form->input('location',array('label'=>''));?>
                    <p>Where in the world are you?</p>  
            	<div class="clear"></div>
                    <label for="ProfileWeb">Web</label>
                    <?php echo $this->Form->input('web',array('label'=>''));?>
                    <p>&nbsp;</p>  
            	<div class="clear"></div>
                    <label for="ProfileBio">Bio</label>
                    <?php echo $this->Form->textarea('bio',array('label'=>''));?>
                    <p>About yourself infew than 160 chars.</p>  
            	<div class="clear"></div>
                <input type="submit" value="Save changes" class="save_btn" id="save17_btn" />    
            </div>
        </div>
<?php echo $this->Form->end(); ?> 