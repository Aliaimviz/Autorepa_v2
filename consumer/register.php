<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$client = new Client(['base_uri' => 'http://localhost/Autorepa_v4/backend/public/']);

try{
    $response = $client->post('oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => 2,
            'client_secret' => 'ZvLbTJY3Z6aPZC948mwVIZIMh0gAtt9cfh8fRpZ9',
            'username' => 'irfan.aimviz@gmail.com',
            'password' => 'abc123',
            'scope' => '*',
        ]
    ]);

    // You'd typically save this payload in the session
    $auth = json_decode( (string) $response->getBody() );

    $response  = $client->post('api/register', [
        'headers' => [
            'Authorization' => 'Bearer '.$auth->access_token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'email' => 'tesasdasdt@gmail.com',
            'name' => 'Test user',
            'password' => 'abc123',
            'address' => 'abc address',
            'postal' => '755210',
            'phone' => '020',
            'city_id' => '1',
            'userRole' => '1',
        ]
    ]);
    //var_dump($response);
    echo $response->getBody();

}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
