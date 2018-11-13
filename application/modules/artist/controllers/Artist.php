<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Artist extends MY_Controller {
	function __construct() {
        parent::__construct();
        //$this->load->model('administrator_m');
    }
    function index() {
        isLogin();
        $data['title'] = 'Dashboard';
        $data['content_v'] = 'artist/dashboard_v';
        $this->artist->dashboard();
    }
    public function dashboard(){
        isLogin();
        isUserType('artist');
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v'] = 'artist/dashboard_v';
        //print_r($data);
        $this->templates->call_template($data);
    }
    public function memberships(){
        $data['title']= 'Memberships';
        $data['membership_lists']=$this->memberships->get_memberships(array('status'=>'enable'),false);
        $data['subscriptions']=$this->subscriptions->get_subscription(array('status'=>'active','user_id'=>$this->users->get_current_user_id()),true);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        //$data['subscriptions']=$this->subscriptions->get_subscription(array('user_id'=>$this->users->get_current_user_id()),true);
        $data['content_v']='artist/membership_v';
        $this->templates->call_template($data);
    }
    public function profile_edit($id){
        isLogin();
        isUserType('artist');
        $data['title'] = 'Edit Profile';
        $data['name']=$this->users->get_user_field($id,'name');
        $data['users']=$this->users->get_user_by_id($id,true);
        $data['method'] = 'artist/profile_edit';
        $data['content_v'] = 'artist/profile_edit_v';
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
    public function payment(){
        $data['title']= 'Memberships';
        $data['membership_lists']=$this->memberships->get_memberships(array('status'=>'enable'),false);
        $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
        $data['content_v']='artist/membership_v';
        if(!empty($_POST['stripeToken']))
        {
            //get token, card and user info from the form
            $token  = $_POST['stripeToken'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $card_num = $_POST['card_num'];
            $card_cvc = $_POST['cvc'];
            $card_exp_month = $_POST['exp_month'];
            $card_exp_year = $_POST['exp_year'];
            //include Stripe PHP library
            require_once(APPPATH.'third_party/vendor/stripe/stripe-php/init.php');
            //set api key
            $stripe = array(
                "secret_key"      => STRIPE_SECRETE_KEY,
                "publishable_key" => STRIPE_PUBLISHABLE_KEY,
                "client_id" => STRIPE_CLIENT_ID,
            );
            \Stripe\Stripe::setApiKey($stripe['secret_key']);
            //add customer to stripe
            $customer = \Stripe\Customer::create(array(
                'email' => $email,
                'source'  => $token
            ));
            $membership=$this->memberships->get_memberships(array('membership_id'=>$this->input->post('membership_id')),true);
            //print_r($membership); exit();
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
            $orderID = $today . $rand;
            //item information
            $itemName = $membership->title;
            $membership_id = $membership->membership_id;
            $itemPrice = $membership->price;
            $currency = "usd";
            $orderID = $orderID;
            //charge a credit or a debit card
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => ($itemPrice*100),
                'currency' => $currency,
                'description' => $itemName,
            ));
            //retrieve charge details
            $chargeJson = $charge->jsonSerialize();
            //check whether the charge is successful
            if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
            {
                //order details
                $amount = $chargeJson['amount'];
                $balance_transaction = $chargeJson['balance_transaction'];
                $currency = $chargeJson['currency'];
                $status = $chargeJson['status'];
                $date = date("Y-m-d H:i:s");
                // calculate expiry date of subscription
                $today = strtotime(date('Y-m-d'));
                $expiry_date = date('Y-m-d',strtotime('+'.$membership->duration.' days',$today));
                //$expiry_date=strtotime('+'.$membership->duration.' days',strtotime($date) );
                //insert tansaction data into the database
                $dataDB = array(
                    'name' => $name,
                    'email' => $email,
                    'user_id' =>$this->users->get_current_user_id(),
                    'order_id' => $orderID,
                    'card_num' => $card_num,
                    'card_cvc' => $card_cvc,
                    'card_exp_month' => $card_exp_month,
                    'card_exp_year' => $card_exp_year,
                    'membership_id' => $membership_id,
                    'membership_price' => $itemPrice,
                    'price_currency' => $currency,
                    'paid_amount' => $amount,
                    'paid_currency' => $currency,
                    'txn_id' => $balance_transaction,
                    'payment_status' => $status,
                    'create_date' => $date,
                    'expiry_date' => $expiry_date,
                    'download_limits' => $membership->download_no,
                    'downloaded' => 0
                );
                $subscription = $this->subscriptions->insert_subscription($dataDB);
                if ($subscription) {
                    if($subscription && $status == 'succeeded'){
                        $upd_user=$this->users->update_users(array('stripe_customer_id'=>$customer->id),array('user_id'=>$this->users->get_current_user_id()));
                        // send mail to admin and users
	                    $message="Subscriptions successful! Description Below:<br> 
						Name: ".$name."<br>
						Email: ".$email."<br>
						Order ID: ".$orderID."<br>
						Membership: ".get_returnfield('memberships','membership_id',$membership_id,'title')."<br>
						Paid Amount: $ ".$itemPrice."<br>";
	                    $subject="Subscription Information";
	                    $to= array(contact_email(),$email);
	                    send_mail($to,$subject,$message);
                        $this->session->set_flashdata('msg', 'Subscription successfull!');
                        $this->session->set_flashdata('msg_type', 'Success');
                        redirect('artist/memberships');
                    }else{
                        $this->session->set_flashdata('msg', 'Transaction has been failed!');
                        $this->session->set_flashdata('msg_type', 'Error');
                        redirect('artist/memberships');
                    }
                }
                else
                {
                    $this->session->set_flashdata('msg', 'not inserted. Transaction has been failed!');
                    $this->session->set_flashdata('msg_type', 'Error');
                    redirect('artist/memberships');
                }
            }
            else
            {
                $this->session->set_flashdata('msg', 'Invalid Token!');
                $this->session->set_flashdata('msg_type', 'Error');
                redirect('artist/memberships');
            }
        }
    }
    public function orders(){
	    $data['title']= 'Orders';
	    $data['order_lists']=$this->order->get_orders(array('user_id'=>$this->users->get_current_user_id()),false);
	    $data['name']=$this->users->get_user_field($this->users->get_current_user_id(),'name');
	    $data['content_v']='artist/orders_v';
	    $this->templates->call_template($data);
    }
}