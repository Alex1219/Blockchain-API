<?php
class BlockChain {
		private $api_code; 
		const cwalleturl = 'https://blockchain.info/api/v2/create_wallet'; //API url for creating a wallet 

			//When class is initiated include api_code
	public function __construct($apicode){
		$this->api_code = $apicode;
	}
/*
creates a bitcoin wallet
*/
    public function createWallet($password,$args = false) {	
	//build our post fields
	$fields = array (
		'password' => $password,
	);
			//if we have optional arguments and it isn't empty merge default array with optional array
		if ($args != false && count($args) > 0) {
			$fields = array_merge($fields, $args);
		}
		
	$content = $this->_postRequest($this->cwalleturl, $fields);
	//returns data received or if it failed will return false
	return $content;
	}
    
 
	/*
	 Getting the balance of an address
	 The value present will be in Satoshi, to get BTC Divide by 100000000
	*/   
    public function getWalletBalance($guid,$main_password,$address,$confirmations=6) { 
    $url = 'https://blockchain.info/merchant/' . $guid . '/address_balance';
	//build our post fields
	$fields = array (
		'password' => $main_password,	//main my wallet password
		'address' => $address, 			//bitcoin address to lookup
		'confirmations' => $confirmations	//Minimum number of confirmations required
	);
	
    $content = $this->_postRequest($url, $fields);
	//returns data received or if it failed will return false
	return $content;
		
    } 
	
/*
sends bitcoins to multiple addresses in one api call
*/
	public function multiTransaction($guid, $main_password, $recipients, $args = false){
	$url = 'https://blockchain.info/merchant/' . $guid . '/sendmany';
	//build our post fields
	$fields = array (
		'password' => $main_password,	//main password
		'recipients' => json_encode($recipients) //json encoded recipients
	);
				//if we have optional arguments and it isn't empty merge default array with optional array
		if ($args != false && count($args) > 0) {
			$fields = array_merge($fields, $args);
		}
	
	$content = $this->_postRequest($url, $fields);
	//returns data received or if it failed will return false
	return $content;
	}
	
/*
send a single payment to the specified address
*/
	public function sendPayment($guid, $main_password, $to, $amount, $args = false){
	$url = 'https://blockchain.info/merchant/' . $guid . '/payment';
	//build our post fields
	$fields = array (
		'password' => $main_password,	//main password
		'to' => $to, //bitcoin address we are sending payment to
		'amount' => $amount
	);
				//if we have optional arguments and it isn't empty merge default array with optional array
		if ($args != false && count($args) > 0) {
			$fields = array_merge($fields, $args);
		}	
	
	$content = $this->_postRequest($url, $fields);
	//returns data received or if it failed will return false
	return $content;
	}
	
	/*
	send a post request to the provided url curl-less...curl is ugly... sorry curl! internal function
	it is important that we do not have any line breaks in content it may cause unexpected errors
	^***make sure to clean any user input if forwarding user input into this function***^
	*/
	private function _postRequest($url, $args){
	
	$args['api_code'] = $this->api_code;	
	
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($args),
			),
		);
		
			$context  = stream_context_create($options);
			$result = file_get_contents($url, false, $context);
				//return data or will return false on error
				return $result;
	}
}
