<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('order_m');
	}
	public function insert_order($data){
		$order_id = $this->order_m->insert_order($data);
		if ($order_id > 0) {
			return $order_id;
		} else {
			return FALSE;
		}
	}
	public function delete_order($conditions){

	}
	public function edit_order($data,$conditions){

	}
	public function get_orders($conditions=array(), $row=true){
		$orders = $this->order_m->get_orders($conditions, $row);
		 //echo $this->db->last_query(); exit();
		return $orders;
	}
}