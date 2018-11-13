<?php
class Ajax_m extends MY_Model {
	protected $_tbl_name = 'category_master';
    function __construct() {
        parent::__construct();
    }
    function get_slug($data,$db="category_master"){
        $this->_tbl_name=$db;
    	$res = $this->get_by($data);
        if(!empty($res) && $res != ''){
            return true;
        }else{
            return false;
        }
        return false;
    }
	function comment_insert($data){
		$this->_tbl_name='comments';
		$id = $this->common_insert($data);
		if ($id > 0) {
			return $id;
		} else {
			return FALSE;
		}
	}
	function delete_data($id,$check_field,$table_name){
		$this->db->where($check_field, $id);
		if($this->db->delete($table_name)){
			return true;
		} else{
			return false;
		}
	}
	function add_featured_producer($data,$conditions){
		$this->_tbl_name='users';
		$res=$this->common_update($data,$conditions);
		if($res){
			return true;
		}else{
			return false;
		}
	}
    function sub_add_to_favorite($data){
        $this->_tbl_name='favorites';
        $get_list=$this->get_by(array('beat_id'=>$data['beat_id'],'beat_type'=>$data['beat_type']));
        if($get_list){
            $res=$this->common_update($data,array('beat_id'=>$data['beat_id']));
        } else{
            $res=$this->common_insert($data);
        }
        if($res){
            return true;
        }else{
            return false;
        }
    }
    function update_downloaded($conditions,$downloaded){
        $subscriptions=$this->subscriptions->get_subscription($conditions,true);
        //print_r($subscriptions);
        $downloaded_old=0;
        if($subscriptions){
            $downloaded_old=$subscriptions->downloaded;
        } else{
            $downloaded_old=0;
        }
        $value['downloaded']=$downloaded+$downloaded_old;
        $subscriptions=$this->subscriptions->update_subscription(array('subscription_id'=>$subscriptions->subscription_id),$value);
        if($subscriptions){
            return $subscriptions;
        } else {
            return false;
        }
    }
    function edit_subscription($data,$con){
        $this->_tbl_name='subscriptions';
        $res = $this->common_update($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
}