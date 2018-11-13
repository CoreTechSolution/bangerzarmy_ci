<?php

class Blog_m extends MY_Model {
	protected $_tbl_name = 'posts';
	function __construct() {
		parent::__construct();
	}
	function get_blogs($conditions=array(), $row=true){
		$this->_tbl_name='posts';
		if(!empty($conditions)){
			$res = $this->get_by_order($conditions, $row,'date_added','DESC');
		} else{
			$res = $this->get_data();
		}
		if ($res != null) {
			return $res;
		} else {
			return FALSE;
		}
	}
	function edit_blog( $data,$conditions){
		$this->_tbl_name='posts';
		$res= $this->common_update($data,$conditions);
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}
	}
	function delete_blog($conditions){
		$this->_tbl_name='posts';
		$res=$this->common_delete($conditions);
		if ($res != null) {
			return $res;
		} else {
			return FALSE;
		}
	}
	function get_comments($conditions=array(), $row=true){
		$this->_tbl_name='comments';
		if(!empty($conditions)){
			$res = $this->get_by_order($conditions, $row,'date_added','DESC');
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