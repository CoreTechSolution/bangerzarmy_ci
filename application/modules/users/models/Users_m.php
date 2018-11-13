<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_m extends MY_Model{
    protected $_tbl_name = 'users';

    function __construct() {
        parent::__construct();
    }

    /*
     * login user information
     */
    public function login($data,$pass) {
        $query = $this->get_by($data, TRUE);
        if ($query) {
            if($pass==$this->encrypt->decode($query->password)){
                return $query;
            } else{
                return false;
            }
            
        } else {
        return false;
        }
    }

    /*
     * get rows from the user
     */
    function getRows($params = array()){
        $result = $this->get_by($params, TRUE);

        if ($result) {
        return $result;
        } else {
        return false;
        }
    }
    
    /*
     * Insert user information
     */
    public function insert($data = array()) {
        $q = $this->common_insert($data);

        if($q){
            return $q;
        } else{
            return FALSE;
        }
    }


    /*
     * user status change
     */
    function update_users($data,$conditions){
        $qry = $this->common_update($data, $conditions);
        if($qry){
            return TRUE;
        } else{
            return FALSE;
        }

    }

    /*
     * user status change
     */
    function find_pass_with_email($params = array()){
        $result = $this->get_by($params, TRUE);

        if ($result) {
        return $result;
        } else {
        return false;
        }
    }

    function get_user($conditions,$row=true){
        $result = $this->get_by($conditions, $row);
        //echo $this->db->last_query(); exit();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
	function get_member_user($conditions,$row=true){
		$this->db->select('*');
		$this->db->from('subscriptions');
		$this->db->join('users','users.user_id=subscriptions.user_id');
		if(!empty($conditions))
			$this->db->where($conditions);
		$query=$this->db->get();
		if($row==true){
			$result=$query->row();
		} else{
			$result=$query->result();
		}
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}

}