<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagenotfound extends MY_Controller {
	function __construct() {
        parent::__construct();
    }
    public function index(){
    	//ob_start();
    	$data['content_v'] = '404/404';
        $this->templates->call_template($data);
       //$this->load->view('404');
    }
}