<?php


require_once("/../blockchain.class.php");

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