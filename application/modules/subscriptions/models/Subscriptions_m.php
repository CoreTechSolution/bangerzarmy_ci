<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Rana
 * Date: 6/11/2018
 * Time: 5:06 PM
 */

class Subscriptions_m extends MY_Model
{
    protected $_tbl_name = 'subscriptions';

    function __construct()
    {
        parent::__construct();
    }

    function insert_subscription($data){
        $this->_tbl_name = 'subscriptions';
        $id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }
    function insert_featured_subscription($data){
        $this->_tbl_name = 'featured_subscription';
        $id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }

    function get_subscription($conditions=array(), $row=true){
        $this->_tbl_name = 'subscriptions';
        if(!empty($conditions) && $row==true){
            $res = $this->get_by_limit($conditions, 1,0,'subscription_id','DESC',true);
        } elseif(!empty($conditions)&& $row==false){
            $res = $this->get_by($conditions,$row);
        }
        else{
            $res = $this->get_data();
        }
        //echo $this->db->last_query();exit();
        if ($res != null) {
            return $res;
        } else {
            return FALSE;
        }
    }
    function update_subscription($conditions,$data){
        $this->_tbl_name = 'subscriptions';
        $res=$this->common_update($data,$conditions);
        if($res){
            return $res;
        } else{
            return false;
        }
    }

}