<?php
class Producer_m extends MY_Model {
	protected $_tbl_name = 'category_master';
    function __construct() {
        parent::__construct();
    }

    function get_graphic_imgs(){
    	$this->_tbl_name="graphic_art";
    	$res = $this->group_data('cat_id');
    	if ($res != null) {
            return $res;
        } else {
            return FALSE;
        }
    }
}