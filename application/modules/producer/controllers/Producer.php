<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producer extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('producer_m');
    }
    function index() {
        isLogin();
        $data['title'] = 'Dashboard';
        $data['content_v'] = 'producer/dashboard_v';
        $this->dashboard();
    }
    public function dashboard(){
        isLogin();
        isUserType('producer');
        $data['title'] = 'Dashboard';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v'] = 'producer/dashboard_v';
        //print_r($data);
        $this->templates->call_template($data);

    }
    public function memberships(){
        $data['title']= 'Memberships';
        $data['membership_lists']=$this->memberships->get_memberships(array('status'=>'enable'),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='producer/membership_v';
        $this->templates->call_template($data);
    }
    public function profile_edit($id){
        isLogin();
        isUserType('producer');
        $data['title'] = 'Edit Profile';
        $data['name']=$this->users->get_user_field($id,'name');
        $data['users']=$this->users->get_user_by_id($id,true);
        $data['method'] = 'producer/profile_edit';
        $data['content_v'] = 'producer/profile_edit_v';
        if (!empty($this->input->post('submit'))) {
           //print_r($this->input->post()); exit();
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['name'] = $this->input->post('name');
                $value['phone'] = $this->input->post('phone');
                $value['email'] = $this->input->post('email');
                $value['bio'] = $this->input->post('bio');
                $value['modify_dt'] = date("Y-m-d H:i:s");
                if(!empty($_FILES['profile_img']['name'])){
                    $img_path=image_upload($_FILES,'profile_img','uploads/profile');
                    if($img_path){
                        $value['profile_img']=$img_path;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                }
                // check same email address, if not email verification needed
                $email_check=false;
                $email=$this->users->get_user_field($id,'email');
                if($email!=$this->input->post('email')){
                    $data['content_v'] = 'users/login';
                    $value['status'] = 'email not verified';
                    $email_check=true;
                }

                $user_id = $this->users->update_users($value, array('user_id'=>$id));
                if ($user_id > 0) {
                    $data['users']=$this->users->get_user_by_id($id,true);
                    if($email_check==true){
                        $this->session->set_flashdata('msg', 'User Updated! But you need to verify your email address.');
                        $this->session->set_flashdata('msg_type', 'Success');
                    } else{
                        $this->session->set_flashdata('msg', 'User Updated!');
                        $this->session->set_flashdata('msg_type', 'Success');
                    }
                    $this->templates->call_template($data);
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $this->templates->call_template($data);
                }
            }
        } else {
            $this->templates->call_template($data);
        }


    }
    public function personal_information(){
        isLogin();
        isUserType('producer');
        $this->load->module('stripe');
        $stripe=$this->stripe->stripe_connect();
        $data['title'] = 'Edit Profile';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'producer/personal_information';
        $data['content_v'] = 'producer/personal_information_v';


        $stripe_resp = $this->users->get_user_field($this->users->get_current_user_id(), 'stripe_resp');
        $data['not_connected']=(empty($stripe_resp))? 1 : 0;
        $data['redirect_uri'] = base_url('producer/personal_information');
        $data['client_id'] =  $stripe['client_id'];
        $data['state'] = rand(1, 1000);
        $data['state_enc'] = $this->encrypt->encode($data['state']);
        

        if (isset($_GET['code']) && $this->session->userdata('state') == $this->encrypt->decode($_GET['state'])) { // Redirect w/ code
            $code = $_GET['code'];
            
            //echo $this->encrypt->decode($_GET['state']); exit();

            $token_request_body = array(
                'grant_type' => 'authorization_code',
                'client_id' => $stripe['client_id'],
                'code' => $code,
                'client_secret' => $stripe['secret_key']
            );

            $req = curl_init('https://connect.stripe.com/oauth/token');
            curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($req, CURLOPT_POST, true );
            curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));

            // TODO: Additional error handling
            $respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);
            $resp = json_decode(curl_exec($req), true);
            curl_close($req);

            //echo $resp['access_token'];
            //print_r(json_encode($resp));exit();
            $value['stripe_resp']= json_encode($resp) ;
            $user_id = $this->users->update_users($value, array('user_id'=>$this->users->get_current_user_id()));
            if ($user_id > 0) {
                $this->session->set_flashdata('msg', 'Your bank details connected to stripe!');
                $this->session->set_flashdata('msg_type', 'Success');
                $this->templates->call_template($data);
            } else {
                $this->session->set_flashdata('msg', 'Your bank details not saved! Please try again later.');
                $this->session->set_flashdata('msg_type', 'Error');
                $this->templates->call_template($data);
            }
            
        } else if (isset($_GET['error'])) { // Error
            $this->session->set_flashdata('msg', $_GET['error_description'].'! Please try again later.');
            $this->session->set_flashdata('msg_type', 'Error');
            $this->templates->call_template($data);
        } else { 
            $this->session->set_userdata('state',$data['state']);
            $this->templates->call_template($data);
        }
        
    }

    public function beats(){
        isLogin();
        isUserType('producer');
        $data['title']='Beats';
        $data['beat_lists']=$this->beat->get_beats(array('status'=>'active','uploaded_by'=>$this->users->get_current_user_id()),false);
        //$beat_file=str_replace(base_url(), FCPATH, $data['beat_lists'][0]->beat_graph_art);
        //print_r($beat_file); exit();
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='producer/beats_v';
        $this->templates->call_template($data);
    }
    public function create_beat(){
        isLogin();
        isUserType('producer');
        //print_r($this->input->post()); exit();
        $data['title'] = 'Create Beat';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'producer/create_beat';
        $data['csv_method'] = 'producer/beat_csv_upload';
        $data['content_v'] = 'producer/create_beat_v';
        $data['graphic_img_lists'] = $this->producer_m->get_graphic_imgs();
        if (!empty($this->input->post('submit'))) {
           //print_r($this->input->post()); exit();
            $this->form_validation->set_rules('beat_name', 'Title', 'required');
            $this->form_validation->set_rules('category_id[]', 'Category', 'required');
            //$this->form_validation->set_rules('beat_file', 'Beat File', 'required');
            
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['beat_name'] = $this->input->post('beat_name');
                $value['category_id'] = json_encode($this->input->post('category_id'));
                $value['beat_tag'] = json_encode($this->input->post('beat_tag'));
                $value['beat_description'] = $this->input->post('beat_description');
                if(!empty($this->input->post('beat_featured')))
                    $value['beat_featured'] = $this->input->post('beat_featured');
                $value['create_dt'] = date("Y-m-d H:i:s");
                $value['created_by'] = $this->users->get_current_user_id();
                $value['modify_dt'] = date("Y-m-d H:i:s");
                $value['status'] = 'active';
                $value['uploaded_by'] = $this->users->get_current_user_id();
                $value['beat_bpm'] = $this->input->post('beat_bpm');
                $value['beat_key'] = $this->input->post('beat_key');
                $producername=$this->users->get_user_field($this->users->get_current_user_id(),'name');
                $value['search_field'] = json_encode(array('beat_name'=>$value['beat_name'],
                    'category'=>$value['category_id'],
                    'tag'=>$value['beat_tag'],
                    'beat_bpm'=>$value['beat_bpm'],
                    'beat_key'=>$value['beat_key'],
                    'producer'=>$producername));
                // Graphic art upload
                if($this->input->post('graphic_art_hidden')!=''){
                    $value['beat_graph_art']=$this->input->post('graphic_art_hidden');
                }
                if(!empty($_FILES['beat_graph_art']['name'])){
                    $img_path=image_upload($_FILES,'beat_graph_art','uploads/beats');
                    if($img_path){
                        $value['beat_graph_art']=$img_path;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                }
                // beats file upload
                if(!empty($_FILES['beat_file']['name'])){
                    $img_paths=image_upload($_FILES,'beat_file','uploads/beats','mp3|wav');
                    if($img_paths){
                        $value['beat_file']=$img_paths;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                }

                $beat_id = $this->beat->create_beat($value);
                if ($beat_id > 0) {
                    $this->session->set_flashdata('msg', 'One Beat Created!');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $this->templates->call_template($data);
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $this->templates->call_template($data);
                }
            }
        } else {
            $this->templates->call_template($data);
        }
    }

    public function beat_csv_upload(){
        isLogin();
        isUserType('producer');
        $data['title']='Beats';
        $data['beat_lists']=$this->beat->get_beats(array('status'=>'active','uploaded_by'=>$this->users->get_current_user_id()),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='producer/beats_v';

        if (!empty($this->input->post('submit'))) {
            //print_r($_FILES); exit();
            if(!empty($_FILES['csv_file_beat']['name'])){
                $img_path=image_upload($_FILES,'csv_file_beat','uploads/csv','csv');
                if($img_path){
                    $result = $this->csvreader->parse_file($upload_path . "/" . $csv['file_name']);
                    foreach ($result as $key => $value) {
                        $udata = array();
                        if (!empty($value['beat_name']) && $value['beat_name'] != "")
                            $udata['beat_name'] = $value['beat_name'];
                        if (!empty($value['beat_description']) && $value['beat_description'] != "")
                            $udata['beat_description'] = $value['beat_description'];

                        $udata['uploaded_by'] = $this->users->get_current_user_id();
                        $udata['create_dt'] = date('Y-m-d H:i:s');
                        $udata['created_by'] = $this->users->get_current_user_id();
                        $udata['modify_dt'] = date('Y-m-d H:i:s');
                        $udata['status'] = 'active';

                        if (!empty($value['category_id']) && $value['category_id'] != ""){
                            $categories=explode('|', $value['category_id']);
                            $udata['category_id'] = json_encode($categories);
                        }

                        if (!empty($value['beat_tag']) && $value['beat_tag'] != ""){
                            $tags=explode('|', $value['beat_tag']);
                            $udata['beat_tag'] = json_encode($tags);
                        }

                        //print_r($udata);exit();
                        $udata = $this->beat->create_beat($udata);
                    }
                    //print_r($udata);exit();
                    //unlink($upload_path . "/" . $csv['file_name']);

                    $this->session->set_flashdata('msg', 'Beat upload successfull!');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $this->templates->call_template($data);
                } else{
                   /* $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');*/
                    $this->templates->call_template($data);
                }
            }
            
        }
        else {
            //echo "00";exit();
            $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
            $this->session->set_flashdata('msg_type', 'Error');
            $this->templates->call_template($data);
        }

    }

    public function sub_beat_csv_upload($id){
        isLogin();
        isUserType('producer');
       $data['title'] = 'Edit Beat';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'producer/edit_beat';
        $data['content_v'] = 'producer/edit_beat_v';
        $data['csv_method'] = 'producer/sub_beat_csv_upload/'.$id;
        $data['file_uplod_method'] = 'ajax/subbeats_file_upload_ajax';
        $data['graphic_img_lists'] = $this->producer_m->get_graphic_imgs();
        $data['beat_lists'] = $this->beat->get_beats(array('beat_id'=>$id,'uploaded_by'=>$this->users->get_current_user_id()),true);
        //print_r($_POST); exit();
        if (!empty($this->input->post('submit'))) {
            //print_r($_FILES); exit();
            if(!empty($_FILES['csv_file_subbeat']['name'])){
                $img_path=image_upload($_FILES,'csv_file_subbeat','uploads/csv','csv');
                if($img_path){
                    $result = $this->csvreader->parse_file($img_path);
                    foreach ($result as $key => $value) {
                        $udata = array();
                        $udata['beat_id'] = $id;
                        //print_r($value); exit();
                        if (!empty($value['beat_name']) && $value['beat_name'] != "")
                            $udata['beat_name'] = $value['beat_name'];
                        if (!empty($value['beat_type']) && $value['beat_type'] != "")
                            $udata['beat_type'] = $value['beat_type'];
                        if (!empty($value['beat_key']) && $value['beat_key'] != "")
                            $udata['beat_key'] = $value['beat_key'];
                        if (!empty($value['beat_bpm']) && $value['beat_bpm'] != "")
                            $udata['beat_bpm'] = $value['beat_bpm'];
                        if (!empty($value['beat_file_name']) && $value['beat_file_name'] != "")
                            $udata['beat_file_name'] = $value['beat_file_name'];

                        $udata['beat_status'] = 'active';
                        $udata['created_by'] = $this->users->get_current_user_id();
                        $udata['create_dt'] = date('Y-m-d H:i:s');

                        if (!empty($value['beat_tag']) && $value['beat_tag'] != ""){
                            $tags=explode('|', $value['beat_tag']);
                            $udata['beat_tag'] = json_encode($tags);
                        }

                        //print_r($udata);exit();
                        $udata = $this->beat->create_sub_beat($udata);
                    }
                    //print_r($udata);exit();
                    unlink($this->session->userdata('delete_file_path'));

                    $this->session->set_flashdata('msg', 'Beat upload successfull!');
                    $this->session->set_flashdata('msg_type', 'Success');
                    redirect('producer/edit_beat/'.$id);
                } else{
                    /*$this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');*/
                    $this->templates->call_template($data);
                }
            }
            
        }
        else {
            //echo "00";exit();
            $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
            $this->session->set_flashdata('msg_type', 'Error');
            $this->templates->call_template($data);
        }

    }

    public function edit_beat($id){
        isLogin();
        isUserType('producer');
        //print_r($this->input->post()); exit();
        $data['title'] = 'Edit Beat';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'producer/edit_beat';
        $data['content_v'] = 'producer/edit_beat_v';
        $data['csv_method'] = 'producer/sub_beat_csv_upload/'.$id;
        $data['file_uplod_method'] = 'ajax/subbeats_file_upload_ajax';
        $data['graphic_img_lists'] = $this->producer_m->get_graphic_imgs();
        $data['beat_lists'] = $this->beat->get_beats(array('beat_id'=>$id,'uploaded_by'=>$this->users->get_current_user_id()),true);
        $data['subbeat_lists'] = $this->beat->get_subbeats(array('beat_id'=>$id,'created_by'=>$this->users->get_current_user_id()),false);
        if (!empty($this->input->post('submit'))) {
           //print_r($this->input->post()); exit();
            $this->form_validation->set_rules('beat_name', 'Title', 'required');
            $this->form_validation->set_rules('category_id[]', 'Category', 'required');
            //$this->form_validation->set_rules('beat_file', 'Beat File', 'required');
            
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['beat_name'] = $this->input->post('beat_name');
                if(!empty($this->input->post('beat_featured'))){
                    $value['beat_featured'] = 'yes';
                } else{
                    $value['beat_featured'] = 'no';
                }


                $value['modify_dt'] = date("Y-m-d H:i:s");
                $value['category_id'] = json_encode($this->input->post('category_id'));
                $value['beat_tag'] = json_encode($this->input->post('beat_tag'));
                $value['beat_description'] = $this->input->post('beat_description');
                $value['beat_bpm'] = $this->input->post('beat_bpm');
                $value['beat_key'] = $this->input->post('beat_key');
                $producername=$this->users->get_user_field($this->users->get_current_user_id(),'name');
                $value['search_field'] = json_encode(array('beat_name'=>$value['beat_name'],
                    'category'=>$value['category_id'],
                    'tag'=>$value['beat_tag'],
                    'beat_bpm'=>$value['beat_bpm'],
                    'beat_key'=>$value['beat_key'],
                    'producer'=>$producername));
                // Graphic art upload
                if($this->input->post('graphic_art_hidden')!=''){
                    $value['beat_graph_art']=$this->input->post('graphic_art_hidden');
                }
                if(!empty($_FILES['beat_graph_art']['name'])){
                    $img_path=image_upload($_FILES,'beat_graph_art','uploads/beats');
                    //print_r($img_path);exit();
                    if($img_path){
                        $value['beat_graph_art']=$img_path;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                }
                // beats file upload
                if(!empty($_FILES['beat_file']['name'])){
                    $img_paths=image_upload($_FILES,'beat_file','uploads/beats','mp3|wav');
                    if($img_paths){
                        $value['beat_file']=$img_paths;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                }

                $beat_id = $this->beat->edit_beat($value,array('beat_id'=>$id));
                if ($beat_id > 0) {
                    $data['beat_lists'] = $this->beat->get_beats(array('beat_id'=>$id,'uploaded_by'=>$this->users->get_current_user_id()),true);
                    $this->session->set_flashdata('msg', 'Beats Updated!');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $this->templates->call_template($data);
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $this->templates->call_template($data);
                }
            }
        } else {
            $this->templates->call_template($data);
        }
    }

    public function delete_beat($id){
        isLogin();
        isUserType('producer');
        $data['beat_lists'] = $this->beat->get_beats(array('beat_id'=>$id,'uploaded_by'=>$this->users->get_current_user_id()),true);
        $data['title'] = 'Delete beats';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'producer/delete_membership';
        $data['content_v'] = 'producer/membership_v';
        $condition=array('beat_id'=>$id);
        $del_subs=$this->beat->delete_beat($condition);
        if($del_subs){
            if(!empty($data['beat_lists']->beat_file)){
                $beat_file=str_replace(base_url(), FCPATH, $data['beat_lists']->beat_file);
                unlink($beat_file);
            }
            /*if(!empty($data['beat_lists']->beat_graph_art)){
                $beat_graph_art=str_replace(base_url(), FCPATH, $data['beat_lists']->beat_graph_art);
                unlink($beat_graph_art);
            }*/
            
            
            $this->session->set_flashdata('msg', 'beats Deleted!');
            $this->session->set_flashdata('msg_type', 'Success');
            redirect('producer/beats');
            //$this->templates->call_template($data);
            return true;
        } else {
            $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
            $this->session->set_flashdata('msg_type', 'Error');
            redirect('producer/beats');
            return false;
        }

    }
	public function orders(){
		isLogin();
		isUserType('producer');
		$data['title']='Orders';
		$data['order_lists']=$this->order->get_orders(array('producer_id'=>$this->users->get_current_user_id()),false);
		$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
		$data['content_v']='producer/orders_v';
		$this->templates->call_template($data);
	}
    
}