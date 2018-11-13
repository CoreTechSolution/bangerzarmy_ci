
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Stripe extends MY_Controller {
	function __construct() {
        parent::__construct();
        //$this->load->model('administrator_m');
    }
    public function stripe_connect(){

    	require_once(APPPATH.'third_party/vendor/stripe/stripe-php/init.php');

		$stripe = array(
		   "secret_key"      => STRIPE_SECRETE_KEY,
		   "publishable_key" => STRIPE_PUBLISHABLE_KEY,
		   "client_id" => STRIPE_CLIENT_ID,
		);

		\Stripe\Stripe::setApiKey($stripe['secret_key']);
        return $stripe;

    }
    public  function create_customer($email, $token){
        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source'  => $token
        ));
        return $customer;
    }
    public function payment(){

        //item information
        $itemName = "Stripe Donation";
        $itemNumber = "PS123456";
        $itemPrice = 50;
        $currency = "usd";
        $orderID = "SKA92712382139";

        //charge a credit or a debit card
        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $itemPrice,
            'currency' => $currency,
            'description' => $itemNumber,
            'metadata' => array(
                'item_id' => $itemNumber
            )
        ));

        //retrieve charge details
        $chargeJson = $charge->jsonSerialize();
        return $chargeJson;
    }
}


