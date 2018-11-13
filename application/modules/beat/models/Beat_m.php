<?php
class Beat_m extends MY_Model {
    protected $_tbl_name = 'beats';
    function __construct() {
        parent::__construct();
    }

    function insert_beat($data){
        $this->_tbl_name='beats';
    	$id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }
    function insert_sub_beat($data){
        $this->_tbl_name='beats_details';
        $id = $this->common_insert($data);
        if ($id > 0) {
            return $id;
        } else {
            return FALSE;
        }
    }

    function get_beats($conditions=array(), $row=true){
        $this->_tbl_name='beats';
        if(!empty($conditions)){
            $res = $this->get_by($conditions, $row);
        } else{
            $res = $this->get_data();
        }
        //echo $this->db->last_query(); exit();
        if ($res != null) {
            return $res;
        } else {
            return FALSE;
        }
    }

    function top_downloaded_beats_lists($limits){
    	if($limits!=0){
		    $query_string="select `beat_id`, count(`beat_id`) as cnt from orders group by `beat_id` order by cnt DESC LIMIT ". $limits;
	    } else{
		    $query_string="select `beat_id`, count(`beat_id`) as cnt from orders group by `beat_id` order by cnt DESC";
	    }
	    $query=$this->db->query($query_string);
	    $results=$query->result();
	    $count=0;
	    foreach ($results as $result){
		    $beat_id_string[$count]=$result->beat_id;
		    $count++;
	    }
	    $this->db->select('*');
	    $this->db->where_in('beat_id',$beat_id_string);
	    $this->db->from('beats');
	    $results=$this->db->get();
	    $result=$results->result();
	    return $result;
    }

	function top_downloaded_producer_lists($limits){
		if($limits!=0){
			$query_string="select `producer_id`, count(`producer_id`) as cnt from orders group by `producer_id` order by cnt DESC LIMIT ". $limits;
			$query=$this->db->query($query_string);
			$results=$query->result();
			$count=0;
			foreach ($results as $result){
				$beat_id_string[$count]=$result->producer_id;
				$count++;
			}
			$this->db->select('*');
			$this->db->where_in('user_id',$beat_id_string);
			$this->db->from('users');
			$results=$this->db->get();
			$result=$results->result();
		} else{
			$query_string="select * from users where user_types='producer' ";
			$query=$this->db->query($query_string);
			$result=$query->result();
		}

		return $result;
	}
	function top_downloaded_genre_lists($limits){
		if($limits!=0){
			$query_string="select `cat_id`, count(`cat_id`) as cnt from orders group by `cat_id` order by cnt DESC LIMIT ". $limits;
		} else{
			$query_string="select `cat_id`, count(`cat_id`) as cnt from orders group by `cat_id` order by cnt DESC";
		}
		$query=$this->db->query($query_string);
		$results=$query->result();
		//print_r($results); exit();
		$count=0;
		foreach ($results as $result){
			$cat_idsss=json_decode($result->cat_id);
			foreach ($cat_idsss as $cat_idss){
				$cat_id_string[$count]=$cat_idss;
				$count++;
			}
			//$beat_id_string[$count]=$result->producer_id;

		}
		//print_r($cat_id_string); exit();
		$this->db->select('*');
		$this->db->where_in('cat_slug',$cat_id_string);
		$this->db->from('category_master');
		$results=$this->db->get();
		$result=$results->result();
		return $result;
	}

    function get_beats_order_by($conditions=array(),$limit,$start,$order_by,$order, $row=true){
        $this->_tbl_name='beats';
        if(!empty($conditions)){
            $res = $this->get_by_limit($conditions,$limit,$start,$order_by,$order, $row);
        } else{
            $res = $this->get_data();
        }
        //echo $this->db->last_query(); exit();
        if ($res != null) {
            return $res;
        } else {
            return FALSE;
        }
    }
    function get_subbeats($conditions=array(), $row=true){
        $this->_tbl_name='beats_details';
    	if(!empty($conditions)){
    		$res = $this->get_by($conditions, $row);
    	} else{
    		$res = $this->get_data();
    	}
    	//echo $this->db->last_query(); exit();
        if ($res != null) {
            return $res;
        } else {
            return FALSE;
        }
    }
    function edit_beat($data, $con){
        $this->_tbl_name='beats';
    	$res = $this->common_update($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
    function edit_subbeat($data, $con){
        $this->_tbl_name='beats_details';
        $res = $this->common_update($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
    function delete_beat($con){
        $this->_tbl_name='beats';
        $res = $this->common_delete($con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
}