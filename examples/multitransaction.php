<?php

	/*
	===multiTransaction===
	
	
	fields:
    $main_password Your Main My wallet password
    $second_password Your second My Wallet password if double encryption is enabled.
    $recipients Is a JSON Object using Bitcoin Addresses as keys and the amounts to send as values (See below).
    $from Send from a specific Bitcoin Address (Optional)
    $shared "true" or "false" indicating whether the transaction should be sent through a shared wallet. Fees apply. (Optional)
    $fee Transaction fee value in satoshi (Must be greater than default fee) (Optional)
    $note A public note to include with the transaction (Optional)

	
	The optional arguments are supplied through the $args argument
	example:
	$args = array(
	'from'=>'a bitcoin address'
	);
	
	
	recipients are supplied through an array this function is for more than one transaction at a time.
	an example of $recipients array
	$recipients = array(
	'bitcoin address 1' => "amount to send",
	'bitcoin address 2' => "amount to send",
	'bitcoin address 3' => "amount to send",
	...
	);
	
	it is required that this be sent in json format array is converted to json string before it is sent
	*/

require_once("../blockchain.class.php");

	//initiate blockchain api wrapper with our api code
	$blockchain = new BlockChain("api code here");
	
	//bitcoin address => amount in satoshi
	$recipients = array(
		"bitcoin address 1"=>"amount to send",
		"bitcoin address 2"=>"amount to send",
		"bitcoin address 3"=>"amount to send"
	);
	//optional fields to send
	$args = array(
		"note"=>"mo' money, mo' problems"
	);
	
	//a guid of some sort
	$guid = "guid here";
	
	//wallet password or something
	$password = "password123";
	
	//call the function to get result
	$result = $blockchain->multiTransaction($guid, $password, $recipients, $args);






?>