<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('pages_m');
    }

    public function create_page($data){
    	$page_id = $this->pages_m->insert_pages($data);
        if ($page_id > 0) {
            return $page_id;
        } else {
            return FALSE;
        }
    }
    public function get_page($conditions=array(), $row=true){
    	$pages = $this->pages_m->get_pages($conditions, $row);
        return $pages;
    }

    public function edit_page($data, $con){
    	$res = $this->pages_m->edit_pages($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
    public function delete_page($data, $con){
    	$res = $this->pages_m->edit_pages($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
}