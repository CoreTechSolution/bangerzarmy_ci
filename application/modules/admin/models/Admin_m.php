<?php
class Admin_m extends MY_Model {
	protected $_tbl_name = 'category_master';
    function __construct() {
        parent::__construct();
    }

    function create_category($data){
        $this->_tbl_name='category_master';
    	$id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }

	function create_testimonials($data){
		$this->_tbl_name='testimonials';
		$id = $this->common_insert($data);
		if ($id > 0) {
			return $id;
		} else {
			return FALSE;
		}
	}
	function get_featured_producer($conditions=array(), $row=true){
		$this->_tbl_name='users';
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

	function edit_testimonial($data,$conditions){
		$this->_tbl_name='testimonials';
		$id = $this->common_update($data,$conditions);
		if ($id > 0) {
			return $id;
		} else {
			return FALSE;
		}
	}

    function get_categories($conditions=array(), $row=true){
        $this->_tbl_name='category_master';
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
    function get_settings(){
        $this->_tbl_name='site_settings';
        $res = $this->get_data();
        if ($res != null) {
            return $res;
        } else {
            return FALSE;
        }
    }
    function get_tags($conditions=array(), $row=true){
        $this->_tbl_name = 'beat_tags';
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
    function create_graphic_art($data){
        $this->_tbl_name = 'graphic_art';
        $id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }
    function create_tag($data){
        $this->_tbl_name = 'beat_tags';
        $id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }
    function edit_graphic_art($data,$conditions){
        $this->_tbl_name = 'graphic_art';
        $id = $this->common_update($data,$conditions);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }
    function update_settings($data,$conditions){
        $this->_tbl_name='site_settings';
        $id = $this->common_update($data,$conditions);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }
    function delete_graphic_art($conditions){
        $this->_tbl_name = 'graphic_art';
        $id = $this->common_delete($conditions);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }

    }
    function get_graph_arts($conditions=array(), $row=true){
        $this->_tbl_name = 'graphic_art';
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
}