<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subscriptions extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('subscriptions_m');
    }
    function index(){
    }
    public function insert_subscription($data){
        $subscription_id = $this->subscriptions_m->insert_subscription($data);
        if ($subscription_id > 0) {
            return $subscription_id;
        } else {
            return FALSE;
        }
    }
    public function insert_featured_subscription($data){
        $subscription_id = $this->subscriptions_m->insert_featured_subscription($data);
        if ($subscription_id > 0) {
            return $subscription_id;
        } else {
            return FALSE;
        }
    }
    public function update_subscription($conditions,$data){
        $subscription_id = $this->subscriptions_m->update_subscription($conditions,$data);
        if ($subscription_id) {
            return $subscription_id;
        } else {
            return FALSE;
        }
    }
    public function get_subscription($conditions=array(), $row=true){
        $subscriptions = $this->subscriptions_m->get_subscription($conditions, $row);
        return $subscriptions;
    }
    public function get_download_limits($conditions,$row){
        $download = $this->subscriptions_m->get_download_limit($conditions, $row);
        return $download;
    }
    
}