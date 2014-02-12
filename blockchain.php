<?php

/*
     Required fields
   
    $password - The password for the new wallet. Must be at least 10 characters in length.
   
   $api_code  - An API code with create wallets permission.
   
    $priv A private key to add to the wallet (Wallet import format preferred). (Optional)
   
    $label A label to set for the first address in the wallet. Alphanumeric only. (Optional)
   
    $email An email to associate with the new wallet i.e. the email address of the user you are creating this wallet on behalf of. (Optional)
*/

class BlockChain
{
    public function createWallet($api_code,$password,$priv='',$label='',$email='') {
    
    $base = "https://blockchain.info/api/v2/create_wallet?api_code={$api_code}&password={$password}";
    if ($priv || $label || $email != '') {
    
    $args = [
    "priv"=> $priv,
    "label" => $label,
    "email" => $email ];
    
    foreach (array("priv", "label", "email") as $field) {
    if ($args[$field] != '')  {$base .= "&{$field}={$args[$field]}";}
    }
    }
    
    $content =  file_get_contents($base);
    
    if ($content != False)
    return $content;
    
    else {
    die("Error");
    }
    }
    
    function getWalletBalance($guid,$main_password,$address,$confirmations=6) { 
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
*
*
*
*/              

$base = "https://blockchain.info/merchant/{$guid}/address_balance?password={$main_password}&address={$address}&confirmations={$confirmations}";
$content = file_get_contents($base);
if ($content != False) {
return $content;
}
else {
die("Error");
}
} 
}
