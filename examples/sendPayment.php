<?php
	/*
	===sendPayment===
	
	
    $main_password Your Main My wallet password
    $second_password Your second My Wallet password if double encryption is enabled.
    $to Recipient Bitcoin Address.
    $amount Amount to send in satoshi.
    $from Send from a specific Bitcoin Address (Optional)
    shared "true" or "false" indicating whether the transaction should be sent through a shared wallet. Fees apply. (Optional)
    $fee Transaction fee value in satoshi (Must be greater than default fee) (Optional)
    $note A public note to include with the transaction (Optional)
	
	
	sends a single payment to the address specified in the argument $to
	in the amount specified by the $amount argument.
	
	*/
	
require_once("../blockchain.class.php");

	//initiate blockchain api wrapper with our api code
	$blockchain = new BlockChain("api code here");
	

	//optional fields to send
	$args = array(
		"note"=>"mo' money, mo' problems"
	);
	
	//a guid of some sort
	$guid = "guid here";
	
	//wallet password or something
	$password = "password123";
	
	$to = "bitcoin address here";
	
	$amount = "amount to send here"; //amount of bitcoins to send this is in sotashi
	
	//call the function to get result
	$result = $blockchain->multiTransaction($guid, $password, $to, $amount, $args);






?>