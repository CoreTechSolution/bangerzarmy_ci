<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

    function call_template($data = null,$user_type='user') {
        if($user_type=='admin'){
            $this->load->view('templates/template_admin_v', $data);
        } else{
            $this->load->view('templates/template_v', $data);
        }

    }
}
