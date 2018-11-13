<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model {
    protected $_tbl_name = '';
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    /* Call common Function Get Data */
    function get_data() {
        $this->db->select('*');
        $q = $this->db->get($this->_tbl_name);
        return $q->result();
    }
    function group_data($field) {
        $this->db->select('*');
        $this->db->group_by($field);
        $q = $this->db->get($this->_tbl_name);
        return $q->result();
    }
    function get_by($where = array(), $single = false) {
        $this->db->select('*');
        $this->db->from($this->_tbl_name);
        $q = $this->db->where($where);
        $query = $q->get();
        if ($single == true) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        $result = $query->$method();
        return $result;
    }
    function get_field($field_name, $field, $value, $single = false) {
        $this->db->select($field_name);
        $this->db->from($this->_tbl_name);
        $q = $this->db->where($field, $value);
        $query = $q->get();
        $query->num_rows();
        if ($query->num_rows() > 0) {
            if ($single == true) {
                $result = $query->row();
                return $result->$field_name;
            } else {
                $result = $query->result();
                return $result;
            }
        } else {
            return FALSE;
        }
    }
    function common_insert($data) {
        $this->db->insert($this->_tbl_name, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function common_update($data, $conditions) {
        $this->db->where($conditions);
        $this->db->update($this->_tbl_name, $data);
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function common_delete($conditions) {
        $this->db->where($conditions);
        $this->db->delete($this->_tbl_name);
        if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function count_row($where) {
        //print_r($where);exit;
        return $this->db->where($where)->count_all_results($this->_tbl_name);
        // echo $this->db->last_query();exit;
    }
    function get_by_limit($condition, $limit=0, $start=0, $order_by = null, $order='ASC',$row=true) {
        $this->db->select('*');
        if (!empty($order_by)) {
            $this->db->order_by($order_by,$order);
        }
        if($limit!=0){
            $this->db->limit($limit, $start);
        }

        $this->db->from($this->_tbl_name);
        if ($condition != '' && !empty($condition)) {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        if($row==true){
            return $query->row();
        } else{
            return $query->result();
        }

    }
	function get_by_order($where = array(), $single = false,$order_by = null, $order='ASC') {
		$this->db->select('*');
		$this->db->from($this->_tbl_name);
		$q = $this->db->where($where);
		$this->db->order_by($order_by,$order);
		$query = $q->get();
		if ($single == true) {
			$method = 'row';
		} else {
			$method = 'result';
		}
		$result = $query->$method();
		return $result;
	}
}
