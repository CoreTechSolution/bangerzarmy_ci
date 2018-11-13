<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beat extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('beat_m');
    }
    function index() {
        //isLogin();

    }
    public function create_beat($data){
    	$beat_id = $this->beat_m->insert_beat($data);
        if ($beat_id > 0) {
            return $beat_id;
        } else {
            return FALSE;
        }
    }
    public function create_sub_beat($data){
        $beat_id = $this->beat_m->insert_sub_beat($data);
        if ($beat_id > 0) {
            return $beat_id;
        } else {
            return FALSE;
        }
    }
    public function get_beats($conditions=array(), $row=true){
        $beat = $this->beat_m->get_beats($conditions, $row);
        return $beat;
    }
    public function get_beats_order_by($conditions=array(),$limit=0,$sart=0,$order_by='create_dt',$order='DESC',$row=true){
        $beat = $this->beat_m->get_beats_order_by($conditions,$limit,$sart, $order_by,$order,$row);
        return $beat;
    }
    public function get_subbeats($conditions=array(), $row=true){
    	$beat = $this->beat_m->get_subbeats($conditions, $row);
        return $beat;
    }
    public function edit_beat($data, $con){
    	$res = $this->beat_m->edit_beat($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
	public function top_downloaded_beats_lists($limits=0){
		$res = $this->beat_m->top_downloaded_beats_lists($limits);
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}
	}
	public function top_downloaded_producer_lists($limits=0){
		$res = $this->beat_m->top_downloaded_producer_lists($limits);
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}
	}
	public function top_downloaded_genre_lists($limits=0){
		$res = $this->beat_m->top_downloaded_genre_lists($limits);
		if ($res) {
			return $res;
		} else {
			return FALSE;
		}
	}
    public function edit_subbeat($data, $con){
        $res = $this->beat_m->edit_subbeat($data, $con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
    public function delete_beat($con){
    	$res = $this->beat_m->delete_beat($con);
        if ($res) {
            return $res;
        } else {
            return FALSE;
        }
    }
}