<?php
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