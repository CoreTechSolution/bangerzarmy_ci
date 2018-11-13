<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagenotfound extends MY_Controller {

    public function index(){
        $this->load->view('404');
    }

}