<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$client = new Client(['base_uri' => 'http://localhost/example/Autorepa_v2/public/']);
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

    /*echo "<pre>";
    print_r($auth);
    echo "</pre>";*/
    //die();
    
    $response = $client->get('api/user', [
        'headers' => [
            'Authorization' => 'Bearer '.$auth->access_token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]
    ]);

    $todos = json_decode( (string) $response->getBody() );
    /*echo $todos;
    die();*/
    echo "<pre>";
    print_r($todos);
    echo "</pre>";
    die();
    $todoList = "";
    /*foreach ($todos as $todo) {
        $todoList .= "<li>{$todo->name} </li>";
    }
*/
    echo "<ul>{$todoList}</ul>";
}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}