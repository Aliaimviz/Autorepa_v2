<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$client = new Client(['base_uri' => 'http://localhost/Autorepa_v2/backend/public/']);
try{
    /*$response = $client->post('oauth/token', [
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

    echo "<pre>";
    print_r($auth);
    echo "</pre>";
    die();*/

    $response = $client->get('api/user', [
        'headers' => [
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU2MTYyY2UxNmJlMGQ1Y2IxMDUwNjQ4M2ZjNzYyZjgxOGY2YzQ0MDcwMTRlY2FiYjM4MzMzYjg0MzkyYWU2YzFkMWFhNWI0OTZiNzMwODU5In0.eyJhdWQiOiIyIiwianRpIjoiZTYxNjJjZTE2YmUwZDVjYjEwNTA2NDgzZmM3NjJmODE4ZjZjNDQwNzAxNGVjYWJiMzgzMzNiODQzOTJhZTZjMWQxYWE1YjQ5NmI3MzA4NTkiLCJpYXQiOjE1MDMyOTIwNDEsIm5iZiI6MTUwMzI5MjA0MSwiZXhwIjoxNTM0ODI4MDQwLCJzdWIiOiIzIiwic2NvcGVzIjpbIioiXX0.dg7fnSO6mI3KaRtacTh5mbDxb4bkUMpJ0HCuG6rGmxIi39dRC44nNGYZ33E0wIq7V_7htQXPmX2oVBVigT3KSyBqDEg2Yi-D1fHxHGC_mtIPxd0Ip2Xh9OMnhNdnobDEvtfQc6dUzkoeVQwPcLA0GWxWxMJ5Oc-xU5-6uoRH1RVZET_uBw_hUasELTG_-0ujZ9gt9UWNZUrO4c1J2cDWkr6VVJZ0KtNL10WUBjv0hFIsXiNtOm96jC0VaTBUQZbSrxz7Bb4c6SqZh5vZjvys6eXFP7YAkyWBHpzUtFf1xKYvJaZ_FoixshYTiLpEMH9pl6RoofV1M_MZfuo6B-c7YOvzE6xTwzVCHfg-1himnBYsYLILiURrUoZsZVA4gTegFI6KDTqOjMpNQonvxxsdGw80YdcTFdXcXGCAdxV-5_HaqfUH5r1YHMbHiLoLhr44i1Mx9ZqL3bQlMKZu6j09DiRrScZo9mZDuJ0xPDlifS_u1a41F2f54xe_Hwi3ChbJyAIe4u5rp4Z5JmRt6EQxkd74U1eYUmkHsaveXtcDuS1Vxg3BThu7csAl89v7jumUegK7E_UdQwwmr0JSSLjRUvXvDfgZFGrdM4TdXeu4xkHMrgeJod-lsdKbq05Fab7zm_UkBpwnhLoFUaqoXpVn41vcnB-JDu7H2jNA5Q2ages',
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
