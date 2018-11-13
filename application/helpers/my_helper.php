<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI = & get_instance();
$db =$CI->db;
$query = $db->get( 'site_settings' );
foreach( $query->result() as $row ){ 
    define('STRIPE_SECRETE_KEY',$row->secrete_key);
    define('STRIPE_PUBLISHABLE_KEY',$row->publishable_key);
    define('STRIPE_CLIENT_ID',$row->client_id);
}
function get_settings(){
	$CI = & get_instance();
	$db =$CI->db;
	$query = $db->get( 'site_settings' );
	//print_r($query->result()); exit();
	return $query->row();

}
//define('STRIPE_SECRETE_KEY','sk_test_f2utWAk8ieyHmZ8enW8WDWrB');
//define('STRIPE_PUBLISHABLE_KEY','pk_test_hYJla09a6jrwrIRNUJkUuVFi');
//define('STRIPE_CLIENT_ID','ca_CrmZHRvZHZVbziaqIRFbEQjRvFxJzSnR');

function message($params)
{
	$mode = $params['flag'];
	$var = $params['msg'];
	switch($mode)
	{
		case 1:$var='<div class="alert alert-success"><a data-dismiss="alert" class="close"><i class="icon-remove"></i></a> '.$var.'</div>';	//Success
				break;
		case 2:$var='<div class="alert alert-danger"><a data-dismiss="alert" class="close"><i class="icon-remove"></i></a> '.$var.'</div>';	//Error
				break;
		case 3:$var='<div class="alert alert-info"><a data-dismiss="alert" class="close"><i class="icon-remove"></i></a> '.$var.'</div>';	//Message
				break;
		case 4:$var='<div class="alert"><a data-dismiss="alert" class="close"><i class="icon-remove"></i></a> '.$var.'</div>';	//Critical
				break;
		default:$var='<div class="alert alert-info"><a data-dismiss="alert" class="close"><i class="icon-remove"></i></a> '.$var.'</div>';	//Message
				break;
	}
	
	return $var;
	
}

function encode($params)
{
	$encode = urlencode( base64_encode( $params ) );
	return $encode;
}

function decode($params)
{
	$decoded = base64_decode( urldecode( $params ) );
	return $decoded;
}
function image_check($img){
    $rtn_text='';
    if(!empty($img) && $img!=''){
        $rtn_text=$img;
    } else {
        $rtn_text=base_url('assets/images/Add_Image_Small.png');
    }
    return $rtn_text;
}

function get_beats_count($condition=''){
    $rtntext='';
    $CI = & get_instance();
    $CI->db->select('count(*) as list_count');
    $CI->db->from('beats');
    if($condition!='')
        $CI->db->where($condition);
    $results = $CI->db->get();
    //$rtntext=$results->result();
    foreach ($results->result() as $key) {
        $rtntext = $key->list_count;
    }
    //print_r($rtntext); exit();
    return $rtntext;
}
function get_download_count($condition=''){
    $rtntext='';
    $CI = & get_instance();
    $CI->db->select('count(*) as list_count');
    $CI->db->from('orders');
    if($condition!='')
        $CI->db->where($condition);
    $results = $CI->db->get();
    //$rtntext=$results->result();
    foreach ($results->result() as $key) {
        $rtntext = $key->list_count;
    }
    //print_r($rtntext); exit();
    return $rtntext;
}

function isUserType($user_type='artist'){
	$CI = & get_instance();
    if ($CI->session->userdata('logged_in')) {
    	if($user_type==$CI->session->userdata('user_type')){
        	return TRUE;
    	} else{
    		redirect(base_url($CI->session->userdata('user_type').'/dashboard'));
        return false;
    	}
    } else {
        redirect(base_url('users/login'));
        return false;
    }
}

function isLogin() {
    $CI = & get_instance();
    if (!$CI->session->userdata('logged_in')) {
        redirect(base_url('users/login'));
    }
}

function get_producer_commission($id){
	$CI = & get_instance();
	$download_price=0;
	$settings=get_settings();
	if(!empty($settings->commision_type)) {
		if ( $settings->commision_type == 'flat' ) {
			$download_price=$settings->commision_rate;
		} else {
			$download_price=$settings->commision_rate;
		}
	} else{
		$download_price=1;
	}
	return $download_price;
}

function send_mail($to,$subject,$message){
    $CI = & get_instance();
    $CI->load->library('email');
    $smtp_details=get_settings();
    //print_r($smtp_details);
    $config = Array(
      'protocol' => $smtp_details->protocol,
      'smtp_host' => $smtp_details->smtp_host,
      'smtp_port' => $smtp_details->smtp_port,
      'smtp_crypto' => $smtp_details->smtp_crypto,
      'smtp_user' => $smtp_details->smtp_user, // change it to yours
      'smtp_pass' => $smtp_details->smtp_pass, // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );
    $CI->email->initialize($config);
    $CI->email->set_mailtype("html");
    $CI->email->set_newline("\r\n");
    $htmlContent = $message;
    $CI->email->to($to);
    $CI->email->from(admin_email(),'Beat Supply');
    $CI->email->subject($subject);
    $CI->email->message($htmlContent);
    if($CI->email->send())
        return true;
    else
        return false;
}
function get_current_user_id() {
    $CI = & get_instance();
    if ($CI->session->userdata('logged_in')) {
        return $CI->session->userdata('logged_in')['user_id'];
    } else {
        return FALSE;
    }
}
function image_upload($file,$input_name, $path='uploads',$allowed_types='jpg|png',$max_size='5242880'){
    $rtntext='';
    //print_r(FCPATH); exit();
    $CI = & get_instance();
    if(!empty($file[$input_name]['name'])){
        $upload_path=$path;
        $CI->load->library('upload');
        if (!file_exists(FCPATH .$upload_path)) {
            mkdir(FCPATH .$upload_path, 0777, true);
        }
        $config['upload_path'] = FCPATH . $upload_path . '/';
        $config['allowed_types'] = $allowed_types;
        $config['max_size'] = $max_size; //default: 5MB max     = '*';
        $CI->upload->initialize($config);
        //echo "string"; exit();
        if (!$CI->upload->do_upload($input_name)) {
            //print_r($CI->upload->display_errors()); exit();
            $CI->session->set_flashdata('msg', $CI->upload->display_errors());
            $CI->session->set_flashdata('msg_type', 'Error');
            $rtntext = false;
        } else {
            $ufile = $CI->upload->data();
            $rtntext=base_url().$upload_path.'/'.$ufile['file_name'];
            $CI->session->set_userdata('delete_file_path',FCPATH.$upload_path.'/'.$ufile['file_name'] );
        }

    }
    return $rtntext;
}
function get_returnfield($db,$p_field,$p_value,$r_field){
    $rtntext='';
    $CI = & get_instance();
    $CI->db->select($r_field);
    $CI->db->from($db);
    $CI->db->where(array($p_field=>$p_value));
    $results = $CI->db->get();

    foreach ($results->result() as $key) {
        $rtntext = $key->$r_field;
    }
    //print_r($rtntext); exit();
    return $rtntext;
}
function dateFormat($format='d-m-Y', $givenDate=null){
    return date($format, strtotime($givenDate));
}
function get_categories($field){
    $CI = & get_instance();
    $CI->db->select($field);
    $CI->db->from('category_master');
    $categories = $CI->db->get();
    return $categories->result();
}
function get_tags($field){
    $CI = & get_instance();
    $CI->db->select($field);
    $CI->db->from('beat_tags');
    $tags = $CI->db->get();
    return $tags->result();
}
function returnValue($db,$return_field,$reference_field,$reference_value){
	$CI = & get_instance();
	$CI->db->select("$return_field");
	$CI->db->from("$db");
	$CI->db->where(array("$reference_field"=>$reference_value));

	$fields = $CI->db->get();

	$field=$fields->row();
	//print_r($field); exit();
	return $field->$return_field;
	///return $tags->result();
}
function admin_email(){
	$CI = & get_instance();
	$CI->db->select('admin_mail');
	$CI->db->from("site_settings");
	$fields = $CI->db->get();
	$field=$fields->row();
	//print_r($field); exit();
	return $field->admin_mail;
}
function contact_email(){
	$CI = & get_instance();
	$CI->db->select('contact_mail');
	$CI->db->from("site_settings");
	$fields = $CI->db->get();
	$field=$fields->row();
	//print_r($field); exit();
	return $field->contact_mail;
}
function social_media_link($name){
    $CI = & get_instance();
    $CI->db->select('social_media');
    $CI->db->from("site_settings");
    $fields = $CI->db->get();
    $field=$fields->row();
    $social_medias=json_decode($field->social_media);
    return $social_medias->$name;
}