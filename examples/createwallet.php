<?php
	/*	
	===createWallet===
	
	
    Required fields for creating a wallet
    $password - The password for the new wallet. Must be at least 10 characters in length.
	$api_code  - An API code with create wallets permission.
    $priv A private key to add to the wallet (Wallet import format preferred). (Optional)
    $label A label to set for the first address in the wallet. Alphanumeric only. (Optional)
    $email An email to associate with the new wallet i.e. the email address of the user you are creating this wallet on behalf of. (Optional)

	Along with the required $password argument
	the $args argument which is optional itself will contain an array of optional arugments 
	valid fields for $args are
	Example:
	$args = array(
	'priv'=>"123",
	'label'=>"my wallet"
	);
	priv, label, and email
	*/

require_once("../blockchain.class.php");

	//initiate blockchain api wrapper with our api code
	$blockchain = new BlockChain("api code here");
	
	//optional array, all fields are optional
		$array = array(
		'priv'=>"private key",
		'label'=>"my wallet",
		'email'=>"hello@world.com"
		);
		//create the wallet
		$wallet = $blockchain->createWallet("123456", $array);






?>
