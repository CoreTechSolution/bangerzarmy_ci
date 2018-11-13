<div class="logged-in-usermenus">
    <ul>
        <li><a href="<?php echo base_url($this->session->userdata('user_type')); ?>/dashboard"><i class="fa fa-thumb-tack fa-fw" aria-hidden="true"></i>Dashboard</a></li>
        <li><a href="#"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i> Personal Information</a></li>
        <li><a href="<?php echo base_url($this->session->userdata('user_type')); ?>/subscriptions"><i class="fa fa-ticket fa-fw" aria-hidden="true"></i> Subscription Plans</a></li>
        <li><a href="<?php echo base_url(); ?>users/logout"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Logout</a></li>
    </ul>
</div>