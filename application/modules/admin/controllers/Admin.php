<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('admin_m');
    }
    function index() {
        isLogin();
        $data['title'] = 'Dashboard';
        $data['content_v'] = 'admin/dashboard_v';
        $this->dashboard();
    }
    public function dashboard(){
    	isLogin();
        isUserType('admin');
        $data['title'] = 'Dashboard';
    	$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
    	$data['content_v'] = 'admin/dashboard_v';
    	//print_r($data);
        $this->templates->call_template($data,'admin');

    }
    public function library(){
        isLogin();
        isUserType('admin');
        $data['title'] = 'Library';
        //$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v'] = 'admin/library_v';
        //print_r($data);
        $this->templates->call_template($data,'admin');
    }
    public function users(){
        isLogin();
        isUserType('admin');
        $data['title'] = 'Users';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['users']=$this->users->get_user("user_types!='admin'", false);
        //echo $this->db->last_query(); exit;
    	$data['content_v'] = 'admin/users_v';
    	//print_r($data);
        $this->templates->call_template($data);
    }
    public function settings(){
        isLogin();
        isUserType('admin');
        $data['title'] = 'Settings';
        $data['method'] = 'admin/settings';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['settings']=$this->admin_m->get_settings();
        //print_r($data['settings']); exit();
        //echo $this->db->last_query(); exit;
    	$data['content_v'] = 'admin/settings_v';

        //stripe settings update
        if(!empty($this->input->post('stripe_submit'))){
            $this->form_validation->set_rules('secrete_key', 'Secrete Key', 'required');
            $this->form_validation->set_rules('publishable_key', 'Publishable Key', 'required');
            $this->form_validation->set_rules('client_id', 'Client ID', 'required');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else{
                $value['secrete_key'] = $this->input->post('secrete_key');
                $value['publishable_key'] = $this->input->post('publishable_key');
                $value['client_id'] = $this->input->post('client_id');
                $settings_id = $this->admin_m->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                     $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_m->get_settings();
                    $this->templates->call_template($data);
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_m->get_settings();
                    $this->templates->call_template($data);
                }
            }
        }
        // General Settings updated
        if(!empty($this->input->post('general_submit'))){
            $this->form_validation->set_rules('admin_mail', 'Admin Email', 'required');
            $this->form_validation->set_rules('contact_mail', 'Contact Email', 'required');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else{
                $value['admin_mail'] = $this->input->post('admin_mail');
                $value['contact_mail'] = $this->input->post('contact_mail');
                $settings_id = $this->admin_m->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                     $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_m->get_settings();
                    $this->templates->call_template($data);
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_m->get_settings();
                    $this->templates->call_template($data);
                }
            }
        }
	    if(!empty($this->input->post('smtp_setting'))){
		    $this->form_validation->set_rules('protocol', 'Protocol', 'required');
		    $this->form_validation->set_rules('smtp_host', 'SMTP Host', 'required');
		    $this->form_validation->set_rules('smtp_port', 'SMTP Port', 'required');
		    $this->form_validation->set_rules('smtp_crypto', 'SMTP Crypto', 'required');
		    $this->form_validation->set_rules('smtp_user', 'SMTP User', 'required');
		    $this->form_validation->set_rules('smtp_pass', 'SMTP Password', 'required');
		    if ($this->form_validation->run() == false) {
			    $this->templates->call_template($data);
		    } else{
			    $value['protocol'] = $this->input->post('protocol');
			    $value['smtp_host'] = $this->input->post('smtp_host');
			    $value['smtp_port'] = $this->input->post('smtp_port');
			    $value['smtp_crypto'] = $this->input->post('smtp_crypto');
			    $value['smtp_user'] = $this->input->post('smtp_user');
			    $value['smtp_pass'] = $this->input->post('smtp_pass');
			    $settings_id = $this->admin_m->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
			    if ($settings_id > 0) {
				    $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
				    $this->session->set_flashdata('msg_type', 'Success');
				    $data['settings']=$this->admin_m->get_settings();
				    $this->templates->call_template($data);
			    } else {
				    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
				    $this->session->set_flashdata('msg_type', 'Error');
				    $data['settings']=$this->admin_m->get_settings();
				    $this->templates->call_template($data);
			    }
		    }
	    }
        if(!empty($this->input->post('download_submit'))){
            $this->form_validation->set_rules('commision_type', 'Commision Type', 'required');
            $this->form_validation->set_rules('commision_rate', 'Commision Rate', 'required');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else{
                $value['commision_type'] = $this->input->post('commision_type');
                $value['commision_rate'] = $this->input->post('commision_rate');
                $settings_id = $this->admin_m->update_settings($value, array('settings_id'=>$this->input->post('settings_id')));
                if ($settings_id > 0) {
                     $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    $data['settings']=$this->admin_m->get_settings();
                    $this->templates->call_template($data);
                } else {
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $data['settings']=$this->admin_m->get_settings();
                    $this->templates->call_template($data);
                }
            }
        }
        if(!empty($this->input->post('social_submit'))){

            $value['facebook'] = $this->input->post('facebook');
            $value['twitter'] = $this->input->post('twitter');
            $value['google_plus'] = $this->input->post('google_plus');
            $value['instragram'] = $this->input->post('instragram');
            $value['youtube'] = $this->input->post('youtube');
            $social_media['social_media']=json_encode($value);
            $settings_id = $this->admin_m->update_settings($social_media, array('settings_id'=>$this->input->post('settings_id')));
            if ($settings_id > 0) {
                 $this->session->set_flashdata('msg', 'Settings successfully upadated!.');
                $this->session->set_flashdata('msg_type', 'Success');
                $data['settings']=$this->admin_m->get_settings();
                $this->templates->call_template($data);
            } else {
                $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                $this->session->set_flashdata('msg_type', 'Error');
                $data['settings']=$this->admin_m->get_settings();
                $this->templates->call_template($data);
            }
            
        }


    	//print_r($data);
        $this->templates->call_template($data);
    }
    public function orders(){
        isLogin();
        isUserType('admin');
        $data['title']='Orders';
        $data['order_lists']=$this->order->get_orders(array(),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='admin/orders_v';
        $this->templates->call_template($data);
    }
    public function subscriptions(){
        isLogin();
        isUserType('admin');
        $data['title']='Subscriptions';
        $data['order_lists']=$this->subscriptions->get_subscription(array(),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='admin/subscriptions_v';
        $this->templates->call_template($data);
    }
    public function edit_user($id){
        isLogin();
        isUserType('admin');
        $data['title'] = 'Edit User';
        $data['name']=$this->users->get_user_field($id,'name');
        $data['users']=$this->users->get_user_by_id($id,true);
        $data['method'] = 'admin/edit_user';
        $data['content_v'] = 'admin/edit_user_v';
        if (!empty($this->input->post('submit'))) {
           //print_r($this->input->post()); exit();
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('status', 'status', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['name'] = $this->input->post('name');
                $value['phone'] = $this->input->post('phone');
                $value['status'] = $this->input->post('status');
                $value['email'] = $this->input->post('email');
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
                        $this->session->set_flashdata('msg', 'User Updated! But you need to verify email address.');
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
    public function profile_edit($id){
        isLogin();
        isUserType('admin');
        $data['title'] = 'Edit Profile';
        $data['name']=$this->users->get_user_field($id,'name');
        $data['users']=$this->users->get_user_by_id($id,true);
        $data['method'] = 'admin/profile_edit';
        $data['content_v'] = 'admin/profile_edit_v';
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
    public function memberships(){
        $data['title']='memberships';
        $data['membership_lists']=$this->memberships->get_memberships(array('status'=>'enable'),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='admin/membership_v';
        $this->templates->call_template($data);
    }
    public function pages(){
        $data['title']='Pages';
        $data['page_lists']=$this->pages->get_page(array('status'=>'enable'),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='admin/pages_v';
        $this->templates->call_template($data);
    }
	public function members(){
		$data['title']='Members';
		$data['membership_lists']=$this->users->get_member_user(array('subscriptions.status'=>'active'),false);
		//print_r($data['membership_lists']); exit();
		$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
		$data['content_v']='admin/members_v';
		$this->templates->call_template($data);
	}
    public function create_membership(){
        isLogin();
        isUserType('admin');
        //print_r($this->input->post()); exit();
        $data['title'] = 'Create membership';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/create_membership';
        $data['content_v'] = 'admin/create_membership_v';
        if (!empty($this->input->post('submit'))) {
           //print_r($this->input->post()); exit();
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('duration', 'membership Validity', 'required');
            $this->form_validation->set_rules('download_no', 'No of Downloads', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['title'] = $this->input->post('title');
                $value['duration'] = $this->input->post('duration');
                $value['download_no'] = $this->input->post('download_no');
                $value['price'] = $this->input->post('price');
                $value['create_dt'] = date("Y-m-d H:i:s");
                $value['modify_dt'] = date("Y-m-d H:i:s");
                $value['status'] = 'enable';
                $value['created_by'] = $this->users->get_current_user_id();
                $value['modified_by'] = $this->users->get_current_user_id();
                $membership_id = $this->memberships->create_membership($value);
                if ($membership_id > 0) {
                    $this->session->set_flashdata('msg', 'One membership Created!');
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
    public function edit_membership($id){
        isLogin();
        isUserType('admin');
        $data['membership_lists']=$this->memberships->get_memberships(array('membership_id'=>$id),true);
        //print_r($data['membership_lists']); exit();
        $data['title'] = 'Edit membership';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/edit_membership';
        $data['content_v'] = 'admin/edit_membership_v';
        if (!empty($this->input->post('submit'))) {
           //print_r($this->input->post()); exit();
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('duration', 'membership Validity', 'required');
            $this->form_validation->set_rules('download_no', 'No of Downloads', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['title'] = $this->input->post('title');
                $value['duration'] = $this->input->post('duration');
                $value['download_no'] = $this->input->post('download_no');
                $value['price'] = $this->input->post('price');
                $value['modify_dt'] = date("Y-m-d H:i:s");
                $value['modified_by'] = $this->users->get_current_user_id();

                $membership_id = $this->memberships->edit_membership($value, array('membership_id'=>$id));
                if ($membership_id > 0) {
                    $data['membership_lists']=$this->memberships->get_memberships(array('membership_id'=>$id));
                    $this->session->set_flashdata('msg', 'membership Updated!');
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
    public function delete_membership($id){
        isLogin();
        isUserType('admin');
        $data['membership_lists']=$this->memberships->get_memberships(array('membership_id'=>$id));
        $data['title'] = 'Edit membership';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/delete_membership';
        $data['content_v'] = 'admin/membership_v';
        $value['status']='disable';
        $condition=array('membership_id'=>$id);
        $del_subs=$this->memberships->edit_membership($value,$condition);
        if($del_subs){
            $this->session->set_flashdata('msg', 'membership Updated!');
            $this->session->set_flashdata('msg_type', 'Success');
            redirect('admin/memberships','refresh');
            //$this->templates->call_template($data);
            return true;
        } else {
            $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
            $this->session->set_flashdata('msg_type', 'Error');
            redirect('admin/memberships','refresh');
            return false;
        }

    }
    public function edit_page($id){
        isLogin();
        isUserType('admin');
        $data['page_lists']=$this->pages->get_page(array('page_id'=>$id),true);
        //print_r($data['page_lists']); exit();
        $data['title'] = 'Edit Page';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/edit_page';
        $data['content_v'] = 'admin/edit_pages_v';
        if (!empty($this->input->post('submit'))) {
            $this->form_validation->set_rules('title', 'Title', 'required');

            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['page_title'] = $this->input->post('title');
                $value['page_content'] = $this->input->post('page_content');
                $value['meta_keyword'] = $this->input->post('meta_keyword');
                $value['meta_description'] = $this->input->post('meta_description');
                $value['modify_dt'] = date("Y-m-d H:i:s");

                $page_id = $this->pages->edit_page($value, array('page_id'=>$id));
                if ($page_id > 0) {
                    $data['page_lists']=$this->pages->get_page(array('page_id'=>$id));
                    $this->session->set_flashdata('msg', 'page Updated!');
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
	public function testimonials(){
		$data['title']='Testimonials';
		$data['testimonials']=$this->admin_m->get_testimonials(array(),false);
		$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
		$data['content_v']='admin/testimonials_v';
		$this->templates->call_template($data);
	}
    public function create_category(){
        isLogin();
        isUserType('admin');
        //print_r($this->input->post()); exit();
        $data['title'] = 'Create Category';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/create_category';
        $data['content_v'] = 'admin/create_category_v';
        if (!empty($this->input->post('submit'))) {
            $this->form_validation->set_rules('cat_slug', 'Category Slug', 'required');
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['cat_name'] = $this->input->post('cat_name');
                $value['cat_slug'] = $this->input->post('cat_slug');
                $value['cat_desc'] = $this->input->post('cat_desc');
                $value['create_dt'] = date("Y-m-d H:i:s");
                $value['status'] = 'enable';
                $value['created_by'] = $this->users->get_current_user_id();

                // Category image upload
                if(!empty($_FILES['cat_img']['name'])){
                    $img_path=image_upload($_FILES,'cat_img','uploads/category');
                    if($img_path){
                        $value['cat_img']=$img_path;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                }

                $cat_id = $this->admin_m->create_category($value);
                if ($cat_id > 0) {
                    $this->session->set_flashdata('msg', 'One Category Created!');
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

	public function create_testimonials(){
		isLogin();
		isUserType('admin');
		//print_r($this->input->post()); exit();
		$data['title'] = 'Create Testimonial';
		$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
		$data['method'] = 'admin/create_testimonials';
		$data['content_v'] = 'admin/create_testimonial_v';
		if (!empty($this->input->post('submit'))) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			$this->form_validation->set_error_delimiters('', '');
			if ($this->form_validation->run() == false) {
				$this->templates->call_template($data);
			} else {

				$value['name'] = $this->input->post('name');
				$value['designation'] = $this->input->post('designation');
				$value['content'] = $this->input->post('content');


				// Category image upload
				if(!empty($_FILES['image']['name'])){
					$img_path=image_upload($_FILES,'image','uploads/testimonials');
					if($img_path){
						$value['image']=$img_path;
					} else{
						$this->templates->call_template($data);
						return false;
					}
				}

				$cat_id = $this->admin_m->create_testimonials($value);
				if ($cat_id > 0) {
					$this->session->set_flashdata('msg', 'One Testimonial Created!');
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
	public function edit_testimonial($id){
		isLogin();
		isUserType('admin');
		$data['testimonials']=$this->admin_m->get_testimonials(array('id'=>$id), true);
		//print_r($data['membership_lists']); exit();
		$data['title'] = 'Edit Testimonial';
		$data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
		$data['method'] = 'admin/edit_testimonial';
		$data['content_v'] = 'admin/edit_testimonial_v';
		if (!empty($this->input->post('submit'))) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			if ($this->form_validation->run() == false) {
				$this->templates->call_template($data);
			} else {

				$value['name'] = $this->input->post('name');
				$value['designation'] = $this->input->post('designation');
				$value['content'] = $this->input->post('content');

				// Testimonial image upload
				if(!empty($_FILES['image']['name'])){
					$img_path=image_upload($_FILES,'image','uploads/testimonials');
					if($img_path){
						$value['image']=$img_path;
					} else{
						$this->templates->call_template($data);
						return false;
					}
				}

				$category_id = $this->admin_m->edit_testimonial($value, array('id'=>$id));
				if ($category_id > 0) {
					$data['testimonials']=$this->admin_m->get_testimonials(array('id'=>$id), true);
					$this->session->set_flashdata('msg', 'Testimonial Updated!');
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

    public function edit_category($id){
        isLogin();
        isUserType('admin');
         $data['category_lists']=$this->admin_m->get_categories(array('status'=>'enable'),true);
        //print_r($data['membership_lists']); exit();
        $data['title'] = 'Edit Category';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/edit_category';
        $data['content_v'] = 'admin/edit_category_v';
        if (!empty($this->input->post('submit'))) {
            $this->form_validation->set_rules('cat_slug', 'Category Slug', 'required');
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['cat_name'] = $this->input->post('cat_name');
                $value['cat_slug'] = $this->input->post('cat_slug');
                $value['cat_desc'] = $this->input->post('cat_desc');

                // Category image upload
                if(!empty($_FILES['cat_img']['name'])){
                    $img_path=image_upload($_FILES,'cat_img','uploads/category');
                    if($img_path){
                        $value['cat_img']=$img_path;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                }

                $category_id = $this->admin_m->edit_category($value, array('cat_id'=>$id));
                if ($category_id > 0) {
                    $data['category_lists']=$this->admin_m->get_categories(array('cat_id'=>$id));
                    $this->session->set_flashdata('msg', 'Category Updated!');
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

    public function beat_tags(){
        isLogin();
        isUserType('admin');
        $data['title']='Tags';
        $data['tag_lists']=$this->admin_m->get_tags();
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='admin/beat_tags';
        $this->templates->call_template($data);
    }

    public function create_tag(){
        isLogin();
        isUserType('admin');
        //print_r($this->input->post()); exit();
        $data['title'] = 'Create tag';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/create_tag';
        $data['content_v'] = 'admin/create_tag_v';
        if (!empty($this->input->post('submit'))) {
            $this->form_validation->set_rules('tag_name', 'Tag Name', 'required');
            $this->form_validation->set_rules('tag_slug', 'Tag Slug', 'required');
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['tag_name'] = $this->input->post('tag_name');
                $value['tag_slug'] = $this->input->post('tag_slug');
                $value['create_dt'] = date("Y-m-d H:i:s");
                $value['created_by'] = $this->users->get_current_user_id();

                $cat_id = $this->admin_m->create_tag($value);
                if ($cat_id > 0) {
                    $this->session->set_flashdata('msg', 'One Tag Created!');
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

    public function featured_producer(){
	    isLogin();
	    isUserType('admin');
	    $data['title']='Featured Producers';
	    $data['users']=$this->admin_m->get_featured_producer(array('user_types'=>'producer'),false);
	    $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
	    $data['content_v']='admin/featured_producer_v';
	    $this->templates->call_template($data);
    }

    public function categories(){
        isLogin();
        isUserType('admin');
        $data['title']='Categories';
        $data['category_lists']=$this->admin_m->get_categories(array('status'=>'enable'),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='admin/category_v';
        $this->templates->call_template($data);
    }

    public function delete_category($id){
        isLogin();
        isUserType('admin');
        $value['status']='disable';
        $condition=array('cat_id'=>$id);
        $del_subs=$this->categories->edit_category($value,$condition);
        if($del_subs){
            $this->session->set_flashdata('msg', 'Category Updated!');
            $this->session->set_flashdata('msg_type', 'Success');
            redirect('admin/memberships','refresh');
            //$this->templates->call_template($data);
            return true;
        } else {
            $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
            $this->session->set_flashdata('msg_type', 'Error');
            redirect('admin/memberships','refresh');
            return false;
        }

    }
    public function beats(){
        isLogin();
        isUserType('admin');
        $data['title']='Beats';
        $data['beat_lists']=$this->beat->get_beats(array('status'=>'active'),false);

        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='admin/beats_v';
        $this->templates->call_template($data);
    }
    public function create_beat_graph_art(){
        isLogin();
        isUserType('admin');
        $data['title'] = 'Create Graphic Art';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/create_beat_graph_art';
        $data['content_v'] = 'admin/create_beat_graph_art_v';
        $data['graphic_arts_lists']=$this->admin_m->get_graph_arts();
        if (!empty($this->input->post('submit'))) {
            $this->form_validation->set_rules('graphic_art_title', 'Title', 'required');
            $this->form_validation->set_rules('cat_id', 'Category', 'required');
            //$this->form_validation->set_rules('graphic_art_img', 'Graphic Art Image', 'required');
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['graphic_art_title'] = $this->input->post('graphic_art_title');
                $value['cat_id'] = $this->input->post('cat_id');
                $value['create_dt'] = date("Y-m-d H:i:s");
                $value['status'] = 'enable';
                $value['created_by'] = $this->users->get_current_user_id();

                // Category image upload
                if(!empty($_FILES['graphic_art_img']['name'])){
                    $img_path=image_upload($_FILES,'graphic_art_img','uploads/beats');
                    if($img_path){
                        $value['graphic_art_img']=$img_path;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                } else{
                    $this->session->set_flashdata('msg', 'The Graphic Art Image field is required');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $this->templates->call_template($data);
                }
                $graphic_art_id = $this->admin_m->create_graphic_art($value);
                if ($graphic_art_id > 0) {
                    $this->session->set_flashdata('msg', 'Graphic art added!');
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
    public function beat_graph_arts(){
        isLogin();
        isUserType('admin');
        $data['title']='Graphic Arts';
        $data['graph_arts_lists']=$this->admin_m->get_graph_arts(array('status'=>'enable'),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='admin/graph_arts_v';
        $this->templates->call_template($data);
    }
    public function edit_beat_graph_art($id){
        isLogin();
        isUserType('admin');
        $data['title'] = 'Edit Graphic Art';
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['method'] = 'admin/edit_beat_graph_art';
        $data['content_v'] = 'admin/edit_beat_graph_art_v';
        $data['graphic_arts_lists']=$this->admin_m->get_graph_arts(array('graphic_art_id'=>$id),true);
        if (!empty($this->input->post('submit'))) {
            $conditions=array('graphic_art_id'=>$id);
            $this->form_validation->set_rules('graphic_art_title', 'Title', 'required');
            $this->form_validation->set_rules('cat_id', 'Category', 'required');
            $this->form_validation->set_error_delimiters('', '');
            if ($this->form_validation->run() == false) {
                $this->templates->call_template($data);
            } else {

                $value['graphic_art_title'] = $this->input->post('graphic_art_title');
                $value['cat_id'] = $this->input->post('cat_id');

                // graphic image upload
                if(!empty($_FILES['graphic_art_img']['name'])){
                    $img_path=image_upload($_FILES,'graphic_art_img','uploads/beats');
                    if($img_path){
                        $value['graphic_art_img']=$img_path;
                    } else{
                        $this->templates->call_template($data);
                        return false;
                    }
                } else{
                    $this->session->set_flashdata('msg', 'The Graphic Art Image field is required');
                    $this->session->set_flashdata('msg_type', 'Error');
                    $this->templates->call_template($data);
                }
                $graphic_art_id = $this->admin_m->edit_graphic_art($value,$conditions);
                if ($graphic_art_id > 0) {
                    $this->session->set_flashdata('msg', 'Graphic art added!');
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
    public function delete_graphic_art($id){
        isLogin();
        isUserType('admin');
        //$value['status']='disable';
        $condition=array('graphic_art_id'=>$id);
         $data['graphic_arts_lists']=$this->admin_m->get_graph_arts(array('graphic_art_id'=>$id),true);
        $del_subs=$this->admin_m->delete_graphic_art($condition);
        if($del_subs){
            if(!empty($data['graphic_arts_lists']->graphic_art_img)){
                $graphic_art_img=str_replace(base_url(), FCPATH, $data['graphic_arts_lists']->graphic_art_img);
                unlink($graphic_art_img);
            }
            $this->session->set_flashdata('msg', 'Category Updated!');
            $this->session->set_flashdata('msg_type', 'Success');
            redirect('admin/beat_graph_arts');
            //$this->templates->call_template($data);
            return true;
        } else {
            $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
            $this->session->set_flashdata('msg_type', 'Error');
            redirect('admin/beat_graph_arts');
            return false;
        }

    }
    public function blogs(){
	    isLogin();
	    isUserType('admin');
	    $data['title']='Blogs';
	    $data['blogs']=$this->blog->get_blogs(array(),false);
	    $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
	    $data['content_v']='admin/blogs_v';
	    $this->templates->call_template($data);
    }
    public function create_blog(){
	    isLogin();
	    isUserType('admin');
	    //print_r($this->input->post()); exit();
	    $data['title'] = 'Create Blog';
	    $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
	    $data['method'] = 'admin/create_blog';
	    $data['content_v'] = 'admin/create_blog_v';
	    if (!empty($this->input->post('submit'))) {
		    $this->form_validation->set_rules('slug', 'Slug', 'required');
		    $this->form_validation->set_error_delimiters('', '');
		    if ($this->form_validation->run() == false) {
			    $this->templates->call_template($data);
		    } else {

			    $value['post_title'] = $this->input->post('post_title');
			    $value['slug'] = $this->input->post('slug');
			    $value['post'] = $this->input->post('post');
			    $value['date_added'] = date("Y-m-d H:i:s");
			    $value['active'] = 1;
			    $value['user_id'] = $this->users->get_current_user_id();

			    // Category image upload
			    if(!empty($_FILES['post_img']['name'])){
				    $img_path=image_upload($_FILES,'post_img','uploads/post');
				    if($img_path){
					    $value['post_img']=$img_path;
				    } else{
					    $this->templates->call_template($data);
					    return false;
				    }
			    }

			    $post_id = $this->blog->insert_blog($value);
			    if ($post_id > 0) {
				    $this->session->set_flashdata('msg', 'One Blog Created!');
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
    public function edit_blog($id){
	    isLogin();
	    isUserType('admin');
	    $data['blogs']=$this->blog->get_blogs(array('post_id'=>$id),true);
	    //print_r($data['membership_lists']); exit();
	    $data['title'] = 'Edit Blog';
	    $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
	    $data['method'] = 'admin/edit_blog';
	    $data['content_v'] = 'admin/edit_blog_v';
	    if (!empty($this->input->post('submit'))) {
		    $this->form_validation->set_rules('slug', 'Slug', 'required');
		    $this->form_validation->set_error_delimiters('', '');
		    if ($this->form_validation->run() == false) {
			    $this->templates->call_template($data);
		    } else {

			    $value['post_title'] = $this->input->post('post_title');
			    $value['slug'] = $this->input->post('slug');
			    $value['post'] = $this->input->post('post');

			    // Category image upload
			    if(!empty($_FILES['post_img']['name'])){
				    $img_path=image_upload($_FILES,'post_img','uploads/post');
				    if($img_path){
					    $value['post_img']=$img_path;
				    } else{
					    $this->session->set_flashdata('msg', 'Featured Image not Saved.');
					    $this->session->set_flashdata('msg_type', 'Error');
					    $this->templates->call_template($data);
					    return false;
				    }
			    }

			    $post_id = $this->blog->edit_blog($value, array('post_id'=>$id));
			    //echo $this->db->last_query(); exit();
			    if ($post_id > 0) {
				    $data['blogs']=$this->blog->get_blogs(array('post_id'=>$id),true);
				    $this->session->set_flashdata('msg', 'Blog Updated!');
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
    public function single_blog($slug){

    }

}