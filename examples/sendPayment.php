<?php
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