<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('users_m');
        $this->form_validation->run($this);
        //$this->load->library(array('my_form_validation'));
    }

    public function index(){
       redirect('users/login');
    }
    public function account(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->users_m->getRows(array('user_id'=>$this->session->userdata('user_id')));

            $data['content_v'] = 'users/account';
            $this->templates->call_template($data);
        }else{
            redirect('users/login');
        }
    }
    
    public function login(){
        $data = array();
        
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
               
                $conditions = array(
                    'username'=>$this->input->post('username'),
                    'status' => 'active'
                );
                $checkLogin = $this->users_m->login($conditions,trim($this->input->post('password')));

                if($checkLogin){
                    $this->session->set_userdata('logged_in',TRUE);
                    //$this->session->set_userdata('isLogin',TRUE);
                    $this->session->set_userdata('user_id',$checkLogin->user_id);
                    $this->session->set_userdata('display_name',$checkLogin->display_name);
                    $this->session->set_userdata('user_type',$checkLogin->user_types);
                    //ob_clean();
                    redirect($checkLogin->user_types.'/dashboard/');
                }else{
                    $this->session->set_flashdata('msg', 'Wrong Username or Password, please try again!');
                    $this->session->set_flashdata('msg_type', 'Error');

                }
            }
        }

        $data['content_v'] = 'users/login';
        $this->load->view('users/login');
        //$this->templates->call_template($data);
    }
    public function usertype(){
        //$data['method']='registration'
         $data['content_v'] = 'users/user_type';
        $this->templates->call_template($data);
    }
    
    public function registration($type=''){
        if($type!=''){
            $data = array();
            $userData = array();
                
            if($this->input->post('regisSubmit')){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email_addr', 'Email', 'required|valid_email|xss_clean|is_unique[users.email]');
                $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]|max_length[25]|callback_is_password_strong');
                $this->form_validation->set_rules('conf_password', 'confirm password', 'trim|required|matches[password]');
                $this->form_validation->set_error_delimiters('', '');


                if($this->form_validation->run() == true){
                    $encrypted_pass=$this->encrypt->encode($this->input->post('password'));
                    $userData = array(
                        'user_types' => trim($type),
                        'name' => trim($this->input->post('name')),
                        'display_name' => trim(explode(' ', $this->input->post('name'))[0]),
                        'email' => trim($this->input->post('email_addr')),
                        'phone' => trim($this->input->post('phone')),
                        'password' => $encrypted_pass,
                        //'activation_code' => trim($this->input->post('phone')),
                        'status' => 'Email Not Verified',
                        'create_dt'=>date('Y-m-d H:i:s'),
                        'modify_dt'=>date('Y-m-d H:i:s')
                    );
                    $insert = $this->users_m->insert($userData);
                    if($insert){
                        $active_code = encode($insert);

                        $message = 'Welcome to Beat Supply!
                                <br /><br /> Please click on the link to complete the registration process.
                                <br><br> Activation Link :<a href="'.base_url().'users/activation/'.$active_code.'" target="_blank">'.base_url().'users/activation/'.$active_code.'</a>
                                <br><br>Regards,<br>Beat Supply';
                        if(send_mail(strip_tags($this->input->post('email_addr')),'Activate your account',$message)){
                            $this->session->set_flashdata('msg', $this->input->post('email_addr'));
                            redirect('users/thankyou/');
                        } else {
                            $this->session->set_flashdata('error_msg', 'Verification mail Not send. Please try again later!');
                        }
                       
                    }else{
                        $this->session->set_flashdata('error_msg', 'Some problems occured. Please try again later!');
                    }
                }
            }
            //print_r($this->encrypt->encode('qweQWE123!@#')); exit();
            $data['user_type']=$type;
            $data['user'] = $userData;
            $data['content_v'] = 'users/registration';
            $this->templates->call_template($data);
        }
        else{
            redirect('users/usertype','refresh');
        }
    }

    
    function is_password_strong($password)
    {
       if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
         return TRUE;
       }
       $this->form_validation->set_message( 'is_password_strong' , 'The %s field must be strong.');
       return FALSE;
    }

    public function forgotpassword(){
        $data = array();
        
        if($this->input->post('forgotSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if ($this->form_validation->run() == true) {
                $conditions = array(
                    'email'=>$this->input->post('email'),
                );
                $checkres = $this->users_m->find_pass_with_email($conditions);

                if($checkres){

                   $active_code = encode($checkres->user_id);
                    $message = 'Please click on the following link to reset your password <a href="'.base_url().'users/resetpassword/'.$active_code.'" target="_blank">Reset Password</a>';
	                send_mail(strip_tags($this->input->post('email')),'Reset Password',$message);
                    redirect('users/thankyou/');
                }else{

                    $msg = array('msg' => "Wrong email please try again.", 'flag' => 2);
                    $message = message($msg);
                    $this->session->set_flashdata( 'message', $message );

                }
            }
        }

        $data['content_v'] = 'users/forgot-password';
        $this->templates->call_template($data);
    }

    public function resetpassword(){
        $data = array();
        
        if($this->input->post('resetSubmit')){
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $user = decode($this->uri->segment(3));
            $conditions=array('user_id'=>$user);
            if ($this->form_validation->run() == true) {
                $data = array(
                    'password' => md5($this->input->post('password')),
                );
                $checkLogin = $this->users_m->update_users($data, $conditions);

                if($checkLogin){

                    $msg = array('msg' => "Your password updated successfully.", 'flag' => 1);
                    $message = message($msg);
                    $this->session->set_flashdata( 'message', $message );

                    redirect('users/thankyou/');
                }else{

                    $msg = array('msg' => "Please try again.", 'flag' => 2);
                    $message = message($msg);
                    $this->session->set_flashdata( 'message', $message );
                }
            }
        }

        $data['content_v'] = 'users/reset-password';
        $this->templates->call_template($data);
    }
    public function change_password($id){
        isLogin();
        //isUserType('producer');
        $user_type=$this->get_current_user_type();
        $data['user_type']=$user_type;
        $data['title'] = 'Change Password';
        $data['name']=$this->users->get_user_field($id,'name');
        $data['method'] = 'users/change_password/'.$id;
        $data['content_v'] = 'users/change_password_v';
        if (!empty($this->input->post('submit'))) {
            $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_check_old_password');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'Confirm password', 'required|matches[password]');
            $conditions=array('user_id'=>$id);
            if ($this->form_validation->run() == true) {
                $encrypted_pass=$this->encrypt->encode($this->input->post('password'));
                $value['password'] = $encrypted_pass;
                $checkLogin = $this->users_m->update_users($value, $conditions);
                if($checkLogin){
                    $this->session->set_flashdata('msg', 'Your password updated successfully.');
                    $this->session->set_flashdata('msg_type', 'Success');
                    redirect($user_type.'/profile_edit/'.$id);
                }else{
                    $this->session->set_flashdata('msg', 'Something wrong! Please try again later.');
                    $this->session->set_flashdata('msg_type', 'Error');
                    redirect($user_type.'/profile_edit/'.$id);
                }
            } else{
                $this->templates->call_template($data);
            }
        }
        else{
            $this->templates->call_template($data);
        }
    }

    public function check_old_password($old_password){
        $chkpassword=$this->get_user_by_id($this->get_current_user_id());
        if(!empty($chkpassword)){
            $pass=$this->encrypt->decode($chkpassword->password);
            if($pass==$old_password){
                return TRUE;
            } else{
                $this->form_validation->set_message( 'check_old_password' , '%s not matched');
                return FALSE;
            }
        }
        $this->form_validation->set_message( 'check_old_password' , '%s not matched');
        return FALSE;
    }

    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
	    $this->session->unset_userdata('user_type');
	    $this->session->sess_destroy();
        redirect('users/login/');
    }

    public function activation(){
        $user = $this->uri->segment(3);
        $user_id = decode($user);
        $conditions=array('user_id'=>$user_id);
        $data = array('status' => 'active');
        $check = $this->users_m->update_users($data, $conditions);
        
        $data['content_v'] = 'users/activation';
        $this->templates->call_template($data);
    }

    public function thankyou(){

        $data['content_v'] = 'users/thank-you';
        $this->templates->call_template($data);
    }

    public function is_login(){
        //if()
    }

    public function get_user_by_id($id,$row=true){

        $conditions="user_id='".$id."'";
        $users=$this->users_m->get_user($conditions,$row);
        if($users){
            return $users;
        } else{
            return false;
        }
    }
    public function get_user($conditions,$row=true){
        $users=$this->users_m->get_user($conditions,$row);
        if($users){
            return $users;
        } else{
            return false;
        }
    }
	public function get_member_user($conditions=array(),$row=true){
		$users=$this->users_m->get_member_user($conditions,$row);
		if($users){
			return $users;
		} else{
			return false;
		}
	}
    public function get_current_user_id() {
        //print_r($this->session->userdata()); exit();
        if ($this->session->userdata('logged_in')) {
            return $this->session->userdata('user_id');
        } else {
            return FALSE;
        }
    }
    public function get_current_user_type() {
        //print_r($this->session->userdata()); exit();
        if ($this->session->userdata('logged_in')) {
            return $this->session->userdata('user_type');
        } else {
            return FALSE;
        }
    }
    public function get_user_field($id,$field){
        $conditions="user_id='".$id."'";
        $users=$this->users_m->get_user($conditions,true);
        if($users){
            return $users->$field;
        } else{
            return false;
        }

    }
    public function update_users($data,$conditions){
        $user_update = $this->users_m->update_users($data, $conditions);
        if($user_update){
            return true;
        } else{
            return false;
        }
    }


}