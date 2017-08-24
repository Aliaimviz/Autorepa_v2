<?php

require "vendor/autoload.php";
require "Auth_token.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$token = new Auth_token;
$client = new Client(['base_uri' => $token->base_uri]);
try{

    $response  = $client->post('api/complete-job', [
        'headers' => [
            'Authorization' => 'Bearer '.$token->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'job_id' => 2, //$_POST['job_id'],
            'garage_rating' => 5, //$_POST['garage_rating'],
            'garage_review' => 'Good Job!', //$_POST['garage_review'],

        ]
    ]);
    //var_dump($response);
    echo $response->getBody();

}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    //print_r($e);
}
