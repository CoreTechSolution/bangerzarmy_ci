<div class="wrapper3 users">
<div class="container">
    <div class="row">
        <?php $this->template_part->admin_users_profile_sec(); ?>
        <div class="col-lg-9">
            <div class="contentSection">
                <div class="dashboard-section">
                    <div class="box-wrapper">
                        <div class="box-title">Welcome to Beat Supply</div>
                        <div class="box-container">
                            <?php
                            
                             if($not_connected == 1) { ?>
								<a href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_AQUs1uvoGvoqst7cmZavAlqPQ2LaUl8w&scope=read_write&redirect_uri=<?php echo urlencode($redirect_uri); ?>&state=<?php echo $state_enc; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/stripe-blue-on-light.png" /></a>
								<?php } else { ?>
								<p class="successMsg">Connected with stripe</p>
								<?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>