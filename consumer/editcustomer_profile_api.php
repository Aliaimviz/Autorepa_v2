<?php

require "vendor/autoload.php";
require "Auth_token.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$token = new Auth_token;
$client = new Client(['base_uri' => $token->base_uri]);
try{
    // print_r($_POST);
    // die();
    $response  = $client->post('api/editCustomerProfile', [
        'headers' => [
            'Authorization' => 'Bearer '.$token->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
        'json' => [
            //'user_id' => 'BUICK', //$_POST[''],
            //'name' => 'Rehan', //$_POST['checkBoxJobType'],
            'city_id' => 2,//$_POST['city_id'],
            'name' => 'irfan2', //$_POST['name'],
            'email' => 'irfan.aimviz@gmail.com', //$_POST['email'],
            'address' => 'This is a address', //$_POST['address'],
            'postal' => '75300', //$_POST['postal'],
            'phone' => '18456695', //$_POST['phone'],
            'pic' => 'pic', //$_POST['pic'],
            'edit_profile_flag' => 3, //$_POST['edit_profile_flag'],
        ]
    ]);
 
    echo $response->getBody();

}

catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    //print_r($e);
}