<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Memberships extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('memberships_m');
    }
    public function create_membership($data){
    	$membership_id = $this->memberships_m->insert_memberships($data);
        if ($membership_id > 0) {
            return $membership_id;
        } else {
            return FALSE;
        }
    }
    public function get_memberships($conditions=array(), $row=true){
    	$memberships = $this->memberships_m->get_memberships($conditions, $row);
        return $memberships;
    }
    public function edit_membership($data, $con){
    	$res = $this->memberships_m->edit_membership($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
    public function delete_membership($data, $con){
    	$res = $this->memberships_m->edit_membership($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
}