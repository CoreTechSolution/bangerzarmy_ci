<?php if($this->users->get_current_user_type()=='admin'){ ?>
<div class="logged-in-usermenus">
    <ul>
		<li>
			<a href="<?php echo base_url($this->session->userdata('user_type')); ?>/dashboard"><i class="fa fa-thumb-tack fa-fw" aria-hidden="true"></i>Dashboard
			</a>
		</li>
		<!-- <li>
			<a href="#"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i> Personal Information</a>
		</li> -->
		<li>
			<a href="<?php echo base_url($this->session->userdata('user_type')); ?>/users"><i class="fa fa-users fa-fw" aria-hidden="true"></i> Users</a>
		</li>
		<li>
			<a href="<?php echo base_url($this->session->userdata('user_type')); ?>/beats"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i> Beats</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/memberships"><i class="fa fa-ticket-alt fa-fw" aria-hidden="true"></i> Memberships</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/pages"><i class="fa fa-file fa-fw" aria-hidden="true"></i> Pages</a>
		</li>
		<li>
			<a href="<?php echo base_url(); ?>admin/categories"><i class="fa fa-bars fa-fw" aria-hidden="true"></i> Categories</a>
		</li>
		<li>
	        <a href="<?php echo base_url(); ?>admin/orders"><i class="fas fa-download fa-fw" aria-hidden="true"></i> Orders</a>
	    </li>
	    <li>
	        <a href="<?php echo base_url(); ?>admin/subscriptions"><i class="fas fa-download fa-fw" aria-hidden="true"></i> Subscriptions</a>
	    </li>
		<li>
			<a href="<?php echo base_url(); ?>admin/settings"><i class="fa fa-cogs fa-fw" aria-hidden="true"></i></i> Settings</a>
		</li>
        <li>
            <a href="<?php echo base_url(); ?>admin/testimonials"><i class="fa fa-quote-left fa-fw" aria-hidden="true"></i></i> Testimonials</a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>admin/blogs"><i class="fa fa-blogger-b fa-fw" aria-hidden="true"></i></i> Blogs</a>
        </li>
        <!--<li>
            <a href="<?php /*echo base_url(); */?>admin/orders"><i class="fas fa-download fa-fw" aria-hidden="true"></i> Orders</a>
        </li>-->
		<li>
			<a href="<?php echo base_url(); ?>users/logout"><i class="fa fa-sign-out-alt fa-fw" aria-hidden="true"></i> Logout</a>
		</li>
	</ul>
</div>
<?php } elseif ($this->users->get_current_user_type()=='producer') { ?>
	<div class="logged-in-usermenus">
	    <ul>
	        <li>
	        	<a href="<?php echo base_url($this->session->userdata('user_type')); ?>/dashboard"><i class="fa fa-thumb-tack fa-fw" aria-hidden="true"></i>Dashboard</a>
	        </li>
	        <li>
	        	<a href="<?php echo base_url($this->session->userdata('user_type')); ?>/personal_information"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i> Personal Information</a>
	        </li>
	        <li>
	        	<a href="<?php echo base_url($this->session->userdata('user_type')); ?>/beats"><i class="fa fa-music fa-fw" aria-hidden="true"></i> Beats</a>
	        </li>
	        <!--<li>
	        	<a href="<?php /*echo base_url($this->session->userdata('user_type')); */?>/memberships"><i class="fa fa-ticket-alt fa-fw" aria-hidden="true"></i> Membership Plans</a>
	    	</li>-->
            <li>
                <a href="<?php echo base_url(); ?>producer/orders"><i class="fas fa-download fa-fw" aria-hidden="true"></i> Orders</a>
            </li>
	        <li>
	        	<a href="<?php echo base_url(); ?>users/logout"><i class="fa fa-sign-out-alt fa-fw" aria-hidden="true"></i> Logout</a>
	    	</li>
	    </ul>
	</div>
<?php } elseif ($this->users->get_current_user_type()=='artist') { ?>
<div class="logged-in-usermenus">
    <ul>
        <li>
        	<a href="<?php echo base_url($this->session->userdata('user_type')); ?>/dashboard"><i class="fa fa-thumb-tack fa-fw" aria-hidden="true"></i>Dashboard</a>
    	</li>
        <!--<li>
        	<a href="#"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i> Personal Information</a>
    	</li>-->
        <li>
        	<a href="<?php echo base_url($this->session->userdata('user_type')); ?>/memberships"><i class="fa fa-ticket-alt fa-fw" aria-hidden="true"></i> Membership Plans</a>
    	</li>
        <li>
            <a href="<?php echo base_url($this->session->userdata('user_type')); ?>/orders"><i class="fas fa-download fa-fw"></i>  Orders</a>
        </li>
        <li>
        	<a href="<?php echo base_url(); ?>users/logout"><i class="fa fa-sign-out-alt fa-fw" aria-hidden="true"></i> Logout</a>
    	</li>
    </ul>
</div>
<?php } ?>