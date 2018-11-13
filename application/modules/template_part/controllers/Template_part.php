<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_part extends MY_Controller {
	function __construct() {
        parent::__construct();
    }

    public function index($template) {
        switch ($template) {
        	case 'sidebar_admin_menu':
        		$this->sidebar_admin_menu();
        		break;
        	case 'sidebar_producer_menu':
        		$this->sidebar_producer_menu();
        		break;
        	case 'sidebar_artist_menu':
        		$this->sidebar_artist_menu();
        		break;
        	case 'frontend_main_menu':
        		$this->frontend_main_menu();
        		break;
        	case 'frontend_footer_menu':
        		$this->frontend_footer_menu();
        		break;
        	case 'admin_users_profile_sec':
                $this->admin_users_profile_sec();
                break;
	        case 'sidebar_beat_listing':
		        $this->sidebar_beat_listing();
		        break;
        	default:
        		# code...
        		break;
        }
    }
    public function sidebar_admin_menu(){
    	$this->load->view('sidebar_admin_menu_v');
    }
    public function sidebar_producer_menu(){
    	$this->load->view('sidebar_producer_menu_v');
    }
    public function sidebar_artist_menu(){
    	$this->load->view('sidebar_artist_menu_v');
    }
    public function frontend_main_menu(){
    	$this->load->view('frontend_main_menu_v');
    }
    public function frontend_footer_menu(){
    	$this->load->view('frontend_footer_menu_v');
    }
    public function admin_users_profile_sec(){
        $this->load->view('admin_users_profile_sec');
    }
	public function sidebar_left_listing(){
		$this->load->view('sidebar_left_listing');
	}
	public function sidebar_beat_listing(){
    	$beat_lists=$this->beat->get_beats();
    	$data['beat_lists']=$beat_lists;
		$this->load->view('sidebar_beat_listing',$data);
	}
}