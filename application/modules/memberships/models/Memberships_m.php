<?php
class Memberships_m extends MY_Model {
    protected $_tbl_name = 'memberships';
    function __construct() {
        parent::__construct();
    }
    function insert_memberships($data){
    	$id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }
    function get_memberships($conditions=array(), $row=true){
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
    function edit_membership($data, $con){
    	$res = $this->common_update($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
}