<?php echo $this->Html->script('jquery-1.5b1',false);  ?>
<script type="text/javascript" src="http://platform.linkedin.com/in.js">
  api_key: qqv5pbiktf8s
  authorize: true 
</script>
<script type="text/javascript">
function loadData() {
	window.location=site_url+'/signup/select_account_type'
}
</script>
<div id="supc">
		<h3 class="supc_ttl">Sign Up</h3>
        <p id="supc_txt1">Sign up using an account you already own.</p>
        <div id="soc_btn">
            <a href="#">
                <img src="<?php echo $this->base ?>/images/supc_in_btn.png" width="186" height="35" alt="" />
            </a>
			<script type="IN/Login" data-onAuth="loadData">
			</script>
            <a href="#">
                <img src="<?php echo $this->base ?>/images/supc_fb_btn.png" width="194" height="35" alt="" />
            </a>
            <a href="#">
                <img src="<?php echo $this->base ?>/images/supc_tw_btn.png" width="171" height="34" alt="" />
            </a>
        </div>
        <p id="supc_txt2">If you don't want to sign up with a social network, click here to 
        <a href="<?php echo $this->base ?>/signup/select_account_type">create a new account.</a></p>
</div>