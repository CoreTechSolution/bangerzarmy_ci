<div class="wrapper3 users">
<div class="container">
    <div class="row">
        <?php $this->template_part->admin_users_profile_sec(); ?>
        <div class="col-lg-9">
            <div class="contentSection">
                <div class="dashboard-section">
                    <div class="box-wrapper">
                        <div class="box-title"><?php echo $title; ?></div>
                        <div class="box-container">
                            <?php if(!empty($membership_lists)){ ?>
                                <div class="row">
                                <?php //print_r($membership_lists); exit(); ?>
                                <?php $count=1; ?>
                                <?php foreach ($membership_lists as $membership_list) { ?>

                                    <div class="col-lg-6">
                                        <ul class="price">
                                            <li class="header"><?php echo $membership_list->title; ?></li>

                                            <li class="grey">$<?php echo $membership_list->price; ?> / <?php echo $membership_list->duration; ?> Days</li>
                                            <li><?php echo $membership_list->download_no; ?> Downloads</li>
                                            <li class="grey">
                                                <a href="#" class="button" >Buy Now</a>
                                            </li>
                                        </ul>
                                    </div>
                                <?php } ?>
                                  
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>