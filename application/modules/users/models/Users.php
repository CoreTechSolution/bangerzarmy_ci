<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends MY_Model{
    protected $_tbl_name = 'users';

    function __construct() {
        parent::__construct();
    }

    /*
     * login user information
     */
    public function login($data) {
        $query = $this->get_by($data, TRUE);

        if ($query) {
        return $query->user_id;
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
        //add created and modified data if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        
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
    function update_users($data,$id){
        $conditions = array('user_id'=>$id);
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

}