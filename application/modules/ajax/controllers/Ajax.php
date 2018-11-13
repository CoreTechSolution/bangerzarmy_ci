<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('ajax_m');
    }
    public function get_category_slug_ajax(){
    	$slug_text=$_POST['slug'];
    	if(!empty($slug_text)){
            
    		$i=1;
    		while ($i==1) {
                $slug=array('cat_slug'=>$slug_text);
    			$rtn_slug=$this->ajax_m->get_slug($slug);
	    		if($rtn_slug==true){
	    			$slug_text=$slug_text.'-1';
	    		} else{
	    			echo $slug_text;
	    			break;
	    		}	
    		}
    		
    	} else{
    		echo '';
    	}
    }
	public function get_post_slug_ajax(){
		$slug_text=$_POST['slug'];
		if(!empty($slug_text)){
			$i=1;
			while ($i==1) {
				$slug=array('slug'=>$slug_text);
				$rtn_slug=$this->ajax_m->get_slug($slug,'posts');
				if($rtn_slug==true){
					$slug_text=$slug_text.'-1';
				} else{
					echo $slug_text;
					break;
				}
			}
		} else{
			echo '';
		}
	}
    public function get_tag_slug_ajax(){
        $slug_text=$_POST['slug'];
        if(!empty($slug_text)){
            
            $i=1;
            while ($i==1) {
                $slug=array('tag_slug'=>$slug_text);
                $rtn_slug=$this->ajax_m->get_slug($slug,'beat_tags');
                if($rtn_slug==true){
                    $slug_text=$slug_text.'-1';
                } else{
                    echo $slug_text;
                    break;
                }   
            }
            
        } else{
            echo '';
        }
    }
    public function create_beat_csv(){
        isLogin();
        //isUserType('producer');
        $FileName = 'beat_'.date("d-m-y") . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Type: application/vnd.ms-excel'); 
        header("Content-Disposition: attachment; filename=" . $FileName );
        $header_name=array('beat_name','category_id','beat_tag','beat_description');
        $get_categories=get_categories('cat_slug');
        //print_r($get_categories); exit();
        $category_str='';
        $count=0;
        foreach ($get_categories as $get_category) {
            if($count==0){
                $category_str.=$get_category->cat_slug;
            } else{
                $category_str.='|'.$get_category->cat_slug;
            }
            $count++;
        }
        $get_tags=get_tags('tag_slug');
        $tag_str='';
        $count=0;
        foreach ($get_tags as $get_tag) {
            if($count==0){
                $tag_str.=$get_tag->tag_slug;
            } else{
                $tag_str.='|'.$get_tag->tag_slug;
            }
            $count++;
        }
        $output = fopen('php://output', 'w');
        fputcsv($output,$header_name);
        $finalData = array('Sonny Digital Drumkit',$category_str,$tag_str,'Do not use Comma(,)');
        $fp = fopen($FileName,'w');
        fputcsv($output, $finalData);
        fclose($fp);
        //echo 'success';
    }
    public function create_sub_beat_csv(){
        isLogin();
        //isUserType('producer');
        $FileName = 'subbeat_'.date("d-m-y") . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Type: application/vnd.ms-excel'); 
        header("Content-Disposition: attachment; filename=" . $FileName );
        $header_name=array('beat_name','beat_type','beat_key','beat_bpm','beat_tag','beat_file_name');
        $get_tags=get_tags('tag_slug');
        $tag_str='';
        $count=0;
        foreach ($get_tags as $get_tag) {
            if($count==0){
                $tag_str.=$get_tag->tag_slug;
            } else{
                $tag_str.='|'.$get_tag->tag_slug;
            }
            $count++;
        }
        $output = fopen('php://output', 'w');
        fputcsv($output,$header_name);
        $finalData = array('SONNY_D_808_22_F','T','F','106',$tag_str,'SONNY_D_808_22_F.wav');
        $fp = fopen($FileName,'w');
        fputcsv($output, $finalData);
        fclose($fp);
        //echo 'success';
    }
    public function subbeats_file_upload_ajax($id){
        if(!empty($_FILES['file']['name'])){
            $img_path=image_upload($_FILES,'file','uploads/beats/subbeats','mp3|wave');
            //print_r($img_path);exit();
            if($img_path){
                $value['beat_file']=$img_path;
                //$value['beat_id']=$id;
            } else{
                //$this->templates->call_template($data);
                echo json_encode([
                    'status' => 'error',
                    'message' =>'file not uploaded'
                ]);
            }
        }
         $beat_id = $this->beat->edit_subbeat($value,array('beat_file_name'=>$_FILES['file']['name'],'created_by'=>$this->users->get_current_user_id(),'beat_id'=>$id));
        if($beat_id){
            echo json_encode([
                'status' => 'ok',
                'path' => $img_path
            ]);
        } else{
            echo json_encode([
                'status' => 'error',
                'message' =>'file not mapped'
            ]);
        }
        
    }
    public function loggedin_check(){
        if ($this->session->userdata('logged_in')) {
            return true;
        } else{
            return false;
        }
    }
    public function download_limit_check(){
        $download_limit=$this->subscriptions->get_subscription(array('user_id'=>$this->users->get_current_user_id()),true);
        echo ($download_limit->download_limits - $download_limit->downloaded);
    }
    public function downloadfile_list($beat_id){
        $get_beat_file=$this->beat->get_beats(array('beat_id'=>$beat_id),true);
        $get_subbeat_file=$this->beat->get_subbeats(array('beat_id'=>$beat_id),false);
        //print_r($get_subbeat_file);
        $zipFileName=FCPATH.'uploads/downloads'.'/beatSupply'.date('Ymdhis').'.zip';
        $zip = new ZipArchive;
       // $patharr=array();
        $count=0;
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE)
        {
            // Add files to the zip file
            $zip->addFile(str_replace(base_url(),FCPATH,$get_beat_file->beat_file),'file'.$count.'.mp3');
            //$patharr[$count]=str_replace(base_url(),FCPATH,$get_beat_file->beat_file);
            if (!empty($get_subbeat_file)) {
                foreach ($get_subbeat_file as $get_sub) {
                    $count++;
                    $zip->addFile(str_replace(base_url(), FCPATH, $get_sub->beat_file),'file'.$count.'.mp3');
                    //$patharr[$count]=str_replace(base_url(),FCPATH,$get_beat_file->beat_file);
                }
            }
            // All files are added, so close the zip file.
            $zip->close();
        } else{
            return false;
        }
        //print_r($patharr);
        return  str_replace(FCPATH,base_url(),$zipFileName);
    }
    public function downloadsubfile_list($subbeat_id){
        $get_subbeat_file=$this->beat->get_subbeats(array('beat_details_id'=>$subbeat_id),true);
        //print_r($get_subbeat_file);
        $zipFileName=FCPATH.'uploads/downloads'.'/beatSupply'.date('Ymdhis').'.zip';
        $zip = new ZipArchive;
        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE)
        {
            // Add files to the zip file
            $zip->addFile(str_replace(base_url(),FCPATH,$get_subbeat_file->beat_file),'file0.mp3');
            // All files are added, so close the zip file.
            $zip->close();
        } else{
            echo 'file not created';
        }
        //print_r($patharr);
        echo  str_replace(FCPATH,base_url(),$zipFileName);
    }
    public function sub_add_to_favorite(){
        if(!empty($_POST['beat_id'])){
            $data=array(
                'beat_id'=>$_POST['beat_id'],
                'beat_type'=>$_POST['beat_type'],
                'user_id'=>$this->users->get_current_user_id(),
                'favorite_array'=>json_encode(array($this->users->get_current_user_id()=>$_POST['status'])),
                'status'=>$_POST['status']
            );
            $res=$this->ajax_m->sub_add_to_favorite($data);
            if($res){
                echo true;
            } else{
                echo false;
            }
        }
    }
    public function download_increase(){
        $res=$this->ajax_m->update_downloaded(array('user_id'=>$this->users->get_current_user_id()),1);
        if($res){
            return true;
        } else {
	        return false;
        }
    }
    function file_download_by_ajax_before(){
	    $beat_id=$_POST['beat_id'];
	    $beat_type=$_POST['beat_type'];
        $rtntext=array(
        	'type'=>'result',
	        'status'=>true
        );
        $login_check=$this->loggedin_check();
        if($login_check==false){
            $rtntext=array(
                'type'=>'login',
                'status'=>false
            );
            echo json_encode($rtntext);
            exit;
        }
        // check download limits and subscription
        $download_limit=$this->subscriptions->get_subscription(array('user_id'=>$this->users->get_current_user_id(),'status'=>'active'),true);
        if(!empty($download_limit)){
            $dl=($download_limit->download_limits - $download_limit->downloaded);
            if($dl <= 0){
                $rtntext=array(
                    'type'=>'download',
                    'status'=>false
                );
                echo json_encode($rtntext);
                exit;
            }
        } else{
            $rtntext=array(
                'type'=>'subscription',
                'status'=>false
            );
            echo json_encode($rtntext);
            exit;
        }
        // Download files
        if($beat_type=='mainbeat'){
            $download=$this->downloadfile_list($beat_id);
        } else {
            $download=$this->downloadsubfile_list($beat_id);
        }
        if($download==false){
            $rtntext=array(
                'type'=>'download',
                'status'=>false
            );
            echo json_encode($rtntext);
            exit;
        } else{
            $rtntext=array(
                'type'=>'file',
                'status'=>$download
            );
            echo json_encode($rtntext);
            exit;
        }
		echo json_encode($rtntext);
        //Update download limit
        //$res=$this->ajax_m->update_downloaded(array('user_id'=>$this->users->get_current_user_id()),1);
    }
    function file_download_by_ajax_after(){
	    $beat_id=$_POST['beat_id'];
	    $beat_type=$_POST['beat_type'];
	    $rtntext=array(
		    'type'=>'result',
		    'status'=>true
	    );
		// Update downloaded increasing
	    $download_increase=$this->download_increase();
	    if($download_increase==false){
			$rtntext=array(
				'type'=>'increase',
				'status'=>false
			);
			echo json_encode($rtntext);
			exit();
	    }
	    // Insert to order table
		//order_id= auto_increament
	    //order_unique_id= Self genarated no
	    //order_date= Current Date
	    //user_id= Current user ID
	    //beat_id= Downloaded beat_id
	    //beat_type=mainbeat/subbeat
	    //payment_status
	    $beats_detail=$this->beat->get_beats(array('beat_id'=>$beat_id),true);
	    require_once(APPPATH.'third_party/vendor/stripe/stripe-php/init.php');
	    //set api key
	    $stripe = array(
		    "secret_key"      => STRIPE_SECRETE_KEY,
		    "publishable_key" => STRIPE_PUBLISHABLE_KEY,
		    "client_id" => STRIPE_CLIENT_ID,
	    );
	    \Stripe\Stripe::setApiKey($stripe['secret_key']);
	    $stripe_resp    = json_decode( $this->users->get_user_field( $beats_detail->uploaded_by, 'stripe_resp') );
	    //print_r($stripe_resp);
	    $stripe_user_id = $stripe_resp->stripe_user_id;
	    $commission=get_producer_commission($beats_detail->uploaded_by);
	    if ( ! empty( $stripe_user_id ) ) {
		    $transfer = \Stripe\Transfer::create( array(
			    "amount"         => $commission,
			    "currency"       => "usd",
			    "destination"    => $stripe_user_id
		    ) );
	    }
		$data=array(
			'order_unique_id'=>'BS'.date('YmdHis'),
			'order_date'=>date('Y-m-d H:i:s'),
			'user_id'=>$this->users->get_current_user_id(),
			'producer_id'=>$beats_detail->uploaded_by,
			'beat_id'=>$beat_id,
			'cat_id'=>$beats_detail->category_id,
			'beat_type'=>$beat_type,
			'paid_amount'=>$commission,
			'price'=>$commission,
			'paid_currency'=>'usd',
			'payment_status'=>'success'
		);
		$order_id=$this->order->insert_order($data);
		if($order_id==false){
			$rtntext=array(
				'type'=>'order',
				'status'=>false
			);
			echo json_encode($rtntext);
			exit();
		}
		// send email to admin and producer
	    $message="One Beat Downloaded! Description Below:<br> 
		Downloaded by:".$this->users->get_user_field($this->users->get_current_user_id(),'name')."<br>
		Producer:".$this->users->get_user_field($beats_detail->uploaded_by,'name')."<br>
		Beat:".returnValue('beats','beat_name','beat_id',$beat_id)."<br>";
	    $subject="Download Information";
	    $to= contact_email();
		send_mail($to,$subject,$message);
	    $message="One Beat Downloaded! Description Below:<br> 
		Downloaded by:".$this->users->get_user_field($this->users->get_current_user_id(),'name')."<br>
		Beat:".returnValue('beats','beat_name','beat_id',$beat_id)."<br>";
	    $subject="Download Information";
	    $to= $this->users->get_user_field($beats_detail->uploaded_by,'email');
	    send_mail($to,$subject,$message);
	    echo json_encode($rtntext);
    }
	public function delete_data(){
		$id=$_POST['id'];
		$check_field=$_POST['check_field'];
		$table_name=$_POST['table_name'];
		$result=$this->ajax_m->delete_data($id,$check_field,$table_name);
		if($result){
			$response['status']  = 'success';
			$response['message'] = 'Deleted Successfully ...';
		} else{
			$response['status']  = 'error';
			$response['message'] = 'Unable to delete ...';
		}
		echo json_encode($response);
	}
    public function beat_featured_payment(){
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
            $customer_id=$this->users->get_user_field($this->users->get_current_user_id(),'stripe_customer_id');
            if($customer_id && $customer_id!=0){
            } else{
                //add customer to stripe
                $customer = \Stripe\Customer::create(array(
                    'email' => $email,
                    'source'  => $token
                ));
                $customer_id=$customer->id;
            }
            $beats=$this->beat->get_beats(array('beat_id'=>$_POST['beat_id']),true);
            //print_r($beats); exit();
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
            $orderID = $today . $rand;
            //print_r($beats);
            //item information
            $itemName = $beats->beat_name;
            $beats_id = $beats->beat_id;
            $itemPrice = 5;
            $currency = "usd";
            $orderID = $orderID;
            //charge a credit or a debit card
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer_id,
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
                //$today = strtotime(date('Y-m-d'));
                //$expiry_date = date('Y-m-d',strtotime('+'.$beats->duration.' days',$today));
                //$expiry_date=strtotime('+'.$beats->duration.' days',strtotime($date) );
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
                    'beat_id' => $beats_id,
                    'beat_price' => $itemPrice,
                    'price_currency' => $currency,
                    'paid_amount' => $amount,
                    'paid_currency' => $currency,
                    'txn_id' => $balance_transaction,
                    'payment_status' => $status,
                    'create_date' => $date,
                    //'expiry_date' => $expiry_date,
                    //'download_limits' => $beats->download_no,
                    //'downloaded' => 0
                );
                $subscription = $this->subscriptions->insert_featured_subscription($dataDB);
                if ($subscription) {
                    if($subscription && $status == 'succeeded'){
                        $upd_user=$this->users->update_users(array('stripe_customer_id'=>$customer_id),array('user_id'=>$this->users->get_current_user_id()));
                        $this->session->set_flashdata('msg', 'Subscription successfull!');
                        $this->session->set_flashdata('msg_type', 'Success');
                        echo true;
                    }else{
                        $this->session->set_flashdata('msg', 'Transaction has been failed!');
                        $this->session->set_flashdata('msg_type', 'Error');
                        echo false;
                    }
                }
                else
                {
                    $this->session->set_flashdata('msg', 'not inserted. Transaction has been failed!');
                    $this->session->set_flashdata('msg_type', 'Error');
                    echo false;
                }
            }
            else
            {
                $this->session->set_flashdata('msg', 'Invalid Token!');
                $this->session->set_flashdata('msg_type', 'Error');
                echo false;
            }
        }
    }
	public function add_featured_producer(){
		$id=$_POST['id'];
		$status=$_POST['status'];
		if($status=='true'){
			$data=array('featured'=>'true');
		} else{
			$data=array('featured'=>'false');
		}
		$result=$this->ajax_m->add_featured_producer($data,array('user_id'=>$id));
		if($result){
			$response['status']  = 'success';
			$response['message'] = 'Added Successfully ...';
		} else{
			$response['status']  = 'error';
			$response['message'] = 'Unable to add ...';
		}
		echo json_encode($response);
	}
	public function popup_login(){
		if($this->input->post('popupLogin')){
			$conditions = array(
				'email'=>$this->input->post('email'),
				'status' => 'active'
			);
			$checkLogin = $this->users_m->login($conditions,trim($this->input->post('password')));
			if($checkLogin){
				$this->session->set_userdata('logged_in',TRUE);
				$this->session->set_userdata('user_id',$checkLogin->user_id);
				$this->session->set_userdata('user_type',$checkLogin->user_types);
				echo true;
			} else {
				echo false;
			}
		}
	}
	public function comment_insert(){
		$data['post_id']=$this->input->post('post_id');
		$data['user_id']=$this->input->post('user_id');
		$data['comment']=$this->input->post('comment');
		$data['date_added']=date("Y-m-d H:i:s");
		$comment_id=$this->ajax_m->comment_insert($data);
		if($comment_id){
			echo true;
		} else{
			echo false;
		}
	}

    public function unsubscribe_membership(){
        $id=$_POST['id'];
        $result=$this->ajax_m->edit_subscription(array('status'=>'deactive'),array('subscription_id'=>$id));
        if($result){
            $response['status']  = 'success';
            $response['message'] = 'Unsubscribe Successfully ...';

        } else{
            $response['status']  = 'error';
        $response['message'] = 'Unable to unsubscribe ...';

        }
        echo json_encode($response);
    }
    public function featured_beat(){
        $id=$_POST['id'];
        $status=$_POST['status'];
        $result=$this->beat->edit_beat(array('beat_featured'=>$status),array('beat_id'=>$id));
        if($result){
            $response['status']  = 'success';
            $response['message'] = 'Do Successfully ...';

        } else{
            $response['status']  = 'error';
        $response['message'] = 'Unable to do ...';

        }
        echo json_encode($response);
    }
}