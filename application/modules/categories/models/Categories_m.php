<?php
class Categories_m extends MY_Model {
    protected $_tbl_name = 'category_master';
    function __construct() {
        parent::__construct();
    }

    function insert_categories($data){
    	$id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }

    function get_categories($conditions=array(), $row=true){
    	if(!empty($conditions)){
    		$res = $this->get_by($conditions, $row);
    	} else{
    		$res = $this->get_data();
    	}
    	
        if ($res != null) {
            return $res;
        } else {
            return FALSE;
        }
    }
    function edit_category($data, $con){
    	$res = $this->common_update($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
}