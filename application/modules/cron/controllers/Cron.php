<?php
class Cron extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('cron_m');
	}
	public function index(){
		$subscriptions = $this->subscriptions->get_subscription(array('status'=>'active'),false);
		//print_r($subscriptions);
		foreach ($subscriptions as $subscription){
			if(strtotime('now')>$subscription->expiry_date){
				$customer_id=get_returnfield('users','user_id',$subscription->user_id,'stripe_customer_id');
				$autopayment=$this->autopayment($subscription,$customer_id);
				$deactive_present=$this->subscriptions->update_subscription(array('subscription_id'=>$subscription->subscription_id),array('status'=>'deactive'));
			}
		}
	}
	function get_subscriptions(){
		$subscriptions = $this->subscriptions->get_subscription(array('status'=>'active'),false);
		print_r($subscriptions);
	}
	public function autopayment($subscription,$customer_id){
		require_once(APPPATH.'third_party/vendor/stripe/stripe-php/init.php');
		//echo STRIPE_CLIENT_ID.'<br>';
		//echo STRIPE_SECRETE_KEY.'<br>';
		//echo STRIPE_PUBLISHABLE_KEY.'<br>';
		//exit();

		//set api key
		$stripe = array(
			"secret_key"      => STRIPE_SECRETE_KEY,
			"publishable_key" => STRIPE_PUBLISHABLE_KEY,
			"client_id" => STRIPE_CLIENT_ID,
		);
		\Stripe\Stripe::setApiKey($stripe['secret_key']);
		$membership=$this->memberships->get_memberships(array('membership_id'=>$subscription->membership_id),true);
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
			'customer' => $customer_id,
			'amount'   => ($itemPrice*100),
			'currency' => $currency,
			'description' => $itemName,

		));

		//retrieve charge details
		$chargeJson = $charge->jsonSerialize();
		if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1)
		{
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
				'name' => $subscription->name,
				'email' => $subscription->email,
				'user_id' =>$this->users->get_current_user_id(),
				'order_id' => $orderID,
				'card_num' => $subscription->card_num,
				'card_cvc' => $subscription->card_cvc,
				'card_exp_month' => $subscription->card_exp_month,
				'card_exp_year' => $subscription->card_exp_year,
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
				return true;
			}
		} else{
			return false;
		}
	}
}