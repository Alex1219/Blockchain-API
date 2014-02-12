<?php

/*
     Required fields
   
    $password - The password for the new wallet. Must be at least 10 characters in length.
   
   $api_code  - An API code with create wallets permission.
   
    $priv A private key to add to the wallet (Wallet import format preferred). (Optional)
   
    $label A label to set for the first address in the wallet. Alphanumeric only. (Optional)
   
    $email An email to associate with the new wallet i.e. the email address of the user you are creating this wallet on behalf of. (Optional)
*/

class BlockChain {

/*
creates a bitcoin wallet
Requires $api_code, and $password arguments
$priv, $label, $email are optional arguments
*/

private $api_code;

 const cwalleturl = 'https://blockchain.info/api/v2/create_wallet'; //API url for creating a wallet 

		//When class is initiated include api_code
	public function __construct($apicode){
		$this->api_code = $apicode;
	}

	
	/*
	Along with the required $password argument
	the $args argument which is optional itself will contain an array of optional arugments 
	valid fields for $args are

	priv, label, and email
	
	*/
	
    public function createWallet($password,$args = false) {
		
	//api url
	$base = $this->cwalleturl . '?api_code=' . $this->api_code . '&password=' . $password;
	  
	  
		if ($args != false){	
			foreach ($args as $key=>$field) {
			$base .= '&' . $key . '=' . $field;
				}
			}	
		
		
	$content =  file_get_contents($base);
		//returns data received or if it failed will return false
		return $content;
}
    
 
 /*
* Getting the balance of an address
*
*
*
* $main_password Your Main My wallet password
*        
* $address The bitcoin address to lookup
*            
* $confirmations Minimum number of confirmations required. 0 for unconfirmed.
*
* Note: Most Bitcon clients require 6 or more confirmations. As such 6 confirmations will be the minimum used

* The value present will be in Satoshi, to get BTC Divide by 100000000

*/   
 
    public function getWalletBalance($guid,$main_password,$address,$confirmations=6) { 

    $base = 'https://blockchain.info/merchant/' . $guid . '/address_balance?password=' . $main_password . '&address=' . $adress . '&confirmations=' . $confirmations;

    $content = file_get_contents($base);

		//returns data received or if it failed will return false
		return $content;
		
    } 
	
	
	
	
	
	
	
	
	
	
}
