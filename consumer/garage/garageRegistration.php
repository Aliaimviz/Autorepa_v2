<?php

require "../vendor/autoload.php";
require "../Auth_token.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$token = new Auth_token;
$client = new Client(['base_uri' => $token->base_uri]);

try{
    

    $response  = $client->post('api/garageRegistration', [
        'headers' => [
            'Authorization' => 'Bearer '.$token->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'user_id' => $_POST['user_id'],
            'city_id' => $_POST['city_id'],
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'description' => $_POST['description'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'postal' => $_POST['postal'],
        ]
    ]);
    //var_dump($response);
    echo $response->getBody();

}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


