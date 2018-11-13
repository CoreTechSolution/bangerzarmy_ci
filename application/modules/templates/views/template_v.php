<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Remove this after development Start -->
    <meta name="robots" content="noindex,nofollow,noodp,noydir,noarchive"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- Remove this after development End -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png'); ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700|Open+Sans:300,400,600,700|Raleway:300,400,500,600|Roboto:100,300,400,500,700|Lato:100,300,400,700|Roboto+Condensed:400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" media="only screen and (max-width: 320px)" href="<?php echo base_url('assets/css/styleMax320.css'); ?>">
    <link rel="stylesheet" media="only screen and (min-width: 321px) and (max-width: 480px)" href="<?php echo base_url('assets/css/styleMax480.css'); ?>">
    <link rel="stylesheet" media="only screen and (min-width: 481px) and (max-width: 768px)" href="<?php echo base_url('assets/css/styleMax768.css'); ?>">
    <link rel="stylesheet" media="only screen and (min-width: 769px) and (max-width: 1024px)" href="<?php echo base_url('assets/css/styleMax1024.css'); ?>">
    <link rel="stylesheet" media="only screen and (min-width: 1025px) and (max-width: 1200px)" href="<?php echo base_url('assets/css/styleMax1200.css'); ?>">
    <link rel="stylesheet" media="only screen and (min-width: 1201px) and (max-width: 1290px)" href="<?php echo base_url('assets/css/styleMax1280.css'); ?>">
    <link rel="stylesheet" media="only screen and (min-width: 1291px) and (max-width: 1450px)" href="<?php echo base_url('assets/css/styleMax1440.css'); ?>">
    <link rel="stylesheet" media="only screen and (min-width: 1451px) and (max-width: 1680px)" href="<?php echo base_url('assets/css/styleMax1680.css'); ?>">
    <title>Bangerz Army</title>
</head>
<body>
<div class="wrapper1">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-3">
                <div class="logo"><a href="javascript:void(0)"><img src="<?php echo base_url('assets/images/logo.png'); ?>"></a></div>
            </div>
            <div class="col-xl-8 col-lg-9">
                <div class="mainnav">
                    <ul>
                        <li><a href="javascript:void(0)">News</a></li>
                        <li><a href="javascript:void(0)">How It Works</a></li>
                        <li><a href="javascript:void(0)">Pricing</a></li>
                        <li><a href="javascript:void(0)">Forum</a></li>

                        <?php if(empty($this->session->userdata('logged_in'))){ ?>
                            <li><a href="<?php echo base_url('users/login'); ?>">Login</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo base_url('users/logout'); ?>">Logout</a></li>
                        <?php } ?>
                        <li><a href="javascript:void(0)" class="get_started">Get Started</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mobilemenu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/images/logo.png'); ?>" width="105" class="d-inline-block align-top" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">Forum</a>
                    </li>
                    <?php if(empty($this->session->userdata('isLogin'))){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('users/login'); ?>">Login</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php $this->load->view($content_v); ?>
<!-- ----------------------- -->
<div class="wrapper9">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-3">
                <h2>SITE NAVIGATION</h2>
                <ul>
                    <li><a href="javascript:void(0);">How It Works</a></li>
                    <li><a href="javascript:void(0);">Testimonials</a></li>
                    <li><a href="javascript:void(0);">Get Started</a></li>
                    <li><a href="javascript:void(0);">Pricing</a></li>
                    <li><a href="javascript:void(0);">Sign In</a></li>
                    <li><a href="javascript:void(0);">Forum</a></li>
                    <li><a href="javascript:void(0);">News</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-3">
                <h2>LEGAL</h2>
                <ul>
                    <li><a href="javascript:void(0);">Terms & Conditions</a></li>
                    <li><a href="javascript:void(0);">Copyright / DMCA</a></li>
                    <li><a href="javascript:void(0);">Privacy Policy</a></li>
                    <li><a href="javascript:void(0);">Refund Policy</a></li>
                    <li><a href="javascript:void(0);">Disclaimer</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-3">
                <h2>SUPPORT</h2>
                <ul>
                    <li><a href="javascript:void(0);">Language</a></li>
                    <li><a href="javascript:void(0);">Frequently Asked Questions</a></li>
                    <li><a href="javascript:void(0);">Submit Your Music</a></li>
                    <li><a href="javascript:void(0);">Contact Us</a></li>
                    <li><a href="javascript:void(0);"></a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-3">
                <h2>Connect</h2>
                <ul class="social-connects">
                    <li><a href="javascript:void(0);"><img src="assets/images/facebook.png"></a></li>
                    <li><a href="javascript:void(0);"><img src="assets/images/instagram.png"></a></li>
                    <li><a href="javascript:void(0);"><img src="assets/images/twitter.png"></a></li>
                    <li><a href="javascript:void(0);"><img src="assets/images/youtube.png"></a></li>
                </ul>
                <p>© 2018 BANGERZARMY, All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript -->
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>