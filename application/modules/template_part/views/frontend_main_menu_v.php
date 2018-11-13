<div class="header-nav">
    <ul id="menu">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url(); ?>frontend/about">About</a></li>
        <li><a href="<?php echo base_url(); ?>frontend/beats">Beats</a></li>
        <li><a href="<?php echo base_url(); ?>frontend/faqs">FAQs</a></li>
        <li><a href="<?php echo base_url(); ?>frontend/blogs">Blog</a></li>
        <li><a href="<?php echo base_url(); ?>frontend/contact">Contact Us</a></li>

        <?php if($this->session->userdata('logged_in')){ ?>

        <!--<li><a href="<?php /*echo base_url($this->session->userdata('user_type')); */?>/dashboard">Dashboard</a></li>
        <li><a href="<?php /*echo base_url(); */?>users/logout">Logout</a></li>-->
        <?php }else{ ?>
        <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
        <li><a href="<?php echo base_url(); ?>users/usertype" class="signup">SignUp</a></li>
        <?php } ?>
    </ul>
</div>
<div id="demo1"></div>