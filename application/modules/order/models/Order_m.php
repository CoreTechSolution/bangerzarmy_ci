<?php

class Order_m extends MY_Model {
	protected $_tbl_name = 'orders';
	function __construct() {
		parent::__construct();
	}
	function insert_order($data){
		$id = $this->common_insert($data);
		if ($id > 0) {
			return $id;
		} else {
			return FALSE;
		}
	}
	function edit_order($data, $con){
		$res = $this->common_update($data, $con);
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}
	}
	function get_orders($conditions=array(), $row=true){
		if(!empty($conditions)){
			$res = $this->get_by_order($conditions, $row,'order_date','DESC');
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