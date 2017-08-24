<?php

require "vendor/autoload.php";
require "Auth_token.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$token = new Auth_token;
$client = new Client(['base_uri' => $token->base_uri]);
try{

    $response  = $client->post('api/select-offer', [
        'headers' => [
            'Authorization' => 'Bearer '.$token->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
        'json' => [
            //'user_id' => 'BUICK', //$_POST[''],
            'offer_id' => $_POST['offer_id'],
            'job_id' => $_POST['job_id']
        ]
    ]);
    //var_dump($response);
    echo $response->getBody();

}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    //print_r($e);
}
