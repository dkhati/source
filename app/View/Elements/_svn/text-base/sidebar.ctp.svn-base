 <?php $sessionVal=$this->Session->read('CurUser');
 ?>
		<div class="user_sb">
        	<div class="user border">
            	<div class="foto">
				<?php if(!empty($sessionVal['picture'])){ 
				echo	$this->Image->resize('/uploads/' . $sessionVal['picture'], 33, 40);
					 } ?>
                </div>
                <p>
                	<b><?php echo $sessionVal['full_name']; ?></b>
                    <a href="<?php echo $this->base; ?>/profile/<?php echo $sessionVal['username'];  ?>">View my profile page</a>
                </p>
            </div>
            <div class="tool">
            	<ul class="sb_list border">
                	<li><a href="#">Inbox</a></li>
                	<li><a href="#">Schedule</a></li>
                	<li><a href="#">Billing</a></li>
                	<li><a href="#">Meeting</a></li>
                </ul>
            </div>
            <div class="settings">
            	<h3>Settings</h3>
            	<ul class="sb_list border">
                	<li><a href="<?php echo $this->base.'/settings/account'; ?>">Account</a></li>
                <!--	<li><a href="#">Verification</a></li> -->
                	<li><a href="<?php echo $this->base.'/settings/profile'; ?>">Profile</a></li>
                	<li><a href="<?php echo $this->base.'/settings/password'; ?>">Password</a></li>
                	<li><a href="<?php echo $this->base.'/settings/resume'; ?>">Resume</a></li>
					<li><a href="<?php echo $this->base.'/settings/notifications'; ?>">Notifications</a></li>
                <!-- 	<li><a href="<?php echo $this->base.'/settings/mobile'; ?>">Mobile</a></li> -->
                </ul>
            </div>
            <div class="box border">
            </div>
        </div>