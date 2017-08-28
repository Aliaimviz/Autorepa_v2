<?php

require "vendor/autoload.php";
require "Auth_token.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$token = new Auth_token;
$client = new Client(['base_uri' => $token->base_uri]);
try{
    //var_dump($_GET['id']);
    $response = $client->get('api/best-offers/'.$_GET['id'], [
        'headers' => [
            'Authorization' => 'Bearer '. $token->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]
    ]);

    $todos = json_decode( (string) $response->getBody() );
    /*echo $todos;
    die();*/
    echo "<pre>";
    //echo 'lol';
    var_dump($todos);
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
