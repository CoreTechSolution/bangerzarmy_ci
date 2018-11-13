<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('categories_m');
    }

    public function create_category($data){
    	$category_id = $this->categories_m->insert_categories($data);
        if ($category_id > 0) {
            return $category_id;
        } else {
            return FALSE;
        }
    }
    public function get_categories($conditions=array(), $row=true){
    	$categories = $this->categories_m->get_categories($conditions, $row);
        return $categories;
    }
    public function edit_category($data, $con){
    	$res = $this->categories_m->edit_category($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
    public function delete_category($data, $con){
    	$res = $this->categories_m->edit_category($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }

}