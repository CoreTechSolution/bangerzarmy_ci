<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

    function call_template($data = null) {
        $this->load->view('templates/template_v', $data);
    }
}
