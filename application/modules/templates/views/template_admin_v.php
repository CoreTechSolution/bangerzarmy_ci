<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Dashboard | Porto Admin - Responsive HTML5 Template 1.4.1</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/bootstrap/css/bootstrap.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/font-awesome/css/font-awesome.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/magnific-popup/magnific-popup.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/bootstrap-datepicker/css/datepicker3.css'); ?>" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/bootstrap-multiselect/bootstrap-multiselect.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/vendor/morris/morris.css'); ?>" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/stylesheets/theme.css'); ?>" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/stylesheets/skins/default.css'); ?>" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/stylesheets/theme-custom.css'); ?>">

    <!-- Head Libs -->
    <script src="<?php echo base_url('assets/admin/vendor/modernizr/modernizr.js'); ?>"></script>
</head>
<body>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="../" class="logo">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" height="35" alt="Porto Admin" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="<?php echo base_url('assets/admin/images/!logged-user.jpg'); ?>" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/admin/images/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name"><?php echo ucfirst($this->session->userdata('display_name')); ?></span>
                        <span class="role"><?php echo ucfirst($this->session->userdata('user_type')); ?></span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="<?php echo base_url('users/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
<?php $this->load->view($content_v); ?>
<!-- ----------------------- -->


    </div>
</section>

<!-- Vendor -->
<script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/nanoscroller/nanoscroller.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/magnific-popup/magnific-popup.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jquery-placeholder/jquery.placeholder.js'); ?>"></script>

<!-- Specific Page Vendor -->
<script src="<?php echo base_url('assets/admin/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jquery-appear/jquery.appear.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/bootstrap-multiselect/bootstrap-multiselect.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jquery-easypiechart/jquery.easypiechart.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/flot/jquery.flot.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/flot-tooltip/jquery.flot.tooltip.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/flot/jquery.flot.pie.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/flot/jquery.flot.categories.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/flot/jquery.flot.resize.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jquery-sparkline/jquery.sparkline.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/raphael/raphael.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/morris/morris.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/gauge/gauge.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/snap-svg/snap.svg.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/liquid-meter/liquid.meter.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/jquery.vmap.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/data/jquery.vmap.sampledata.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/maps/jquery.vmap.world.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/maps/continents/jquery.vmap.africa.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/maps/continents/jquery.vmap.asia.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/maps/continents/jquery.vmap.australia.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/maps/continents/jquery.vmap.europe.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js'); ?>"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url('assets/admin/javascripts/theme.js'); ?>"></script>

<!-- Theme Custom -->
<script src="<?php echo base_url('assets/admin/javascripts/theme.custom.js'); ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url('assets/admin/javascripts/theme.init.js'); ?>"></script>


<!-- Examples -->
<script src="<?php echo base_url('assets/admin/javascripts/dashboard/examples.dashboard.js'); ?>"></script>
</body>
</html>