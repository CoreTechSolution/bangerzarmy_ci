<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Frontend_m extends MY_Model{
	protected $_tbl_name = 'users';

    function __construct() {
        parent::__construct();
    }
    function get_tags(){
    	$this->_tbl_name='beat_tags';
    	$result = $this->get_data();
        //echo $this->db->last_query(); exit();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
	function get_testimonials($conditions=array(), $row=true){
		$this->_tbl_name='testimonials';
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
    function get_favorites($conditions,$row){
        $this->_tbl_name='favorites';
        $result = $this->get_by($conditions,$row);
        if($result){
            return $result;
        } else {
            return false;
        }
    }

    function contact_insert($data){
        $this->_tbl_name='contact_form';
        $id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }
}