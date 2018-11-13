<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//date_default_timezone_set('Asia/Kolkata');
class MY_Controller extends MX_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'upload', 'pagination', 'email','my_form_validation','csvreader'));
        $this->load->module(array('templates','users', 'memberships', 'pages', 'template_part','categories','beat','subscriptions','order','blog'));
        $this->load->helper(array('my_helper','number','text'));
        $this->load->helper('dropdown_helper');
        //$this->stripe_connect();

    }

    //put your code here
}
