<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Password Class
 *
 * @package		ci-root
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Prabhat Singh
 * @link		https://github.com/prabhateinstein/ci-root
 */

/*
 * This library does not use salt because according to php.net
 * "The salt option has been deprecated as of PHP 7.0.0.
 * It is now preferred to simply use the salt that is generated by default."
 * */

class Password {



	const ALLOWED_ALGOS = ['default' => PASSWORD_DEFAULT, 'bcrypt' => PASSWORD_BCRYPT];

	protected $_cost = 10;

	protected $_algo = PASSWORD_DEFAULT;

	public function __construct(){
		if(function_exists('mcrypt_encrypt') === false){
			throw new Exception('The Password library requires the Mcrypt extension.');
		}
	}

	public function hash($password){
		return password_hash($password, $this->_algo, ['cost' => $this->_cost]);
	}

	public function set_cost($cost = 10){
		$this->_cost = $cost;
		return $this;
	}

	public function set_algo($algo = 'default'){
		if(!in_array($algo, array_keys(self::ALLOWED_ALGOS))){
			throw new Exception($algo ." is not allowed algo.");
		}
		$this->_algo = self::ALLOWED_ALGOS[$algo];
		return $this;
	}

	public function verify_hash($password, $hash){
		return password_verify($password, $hash);
	}
}