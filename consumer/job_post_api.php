<?php

require "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

$client = new Client(['base_uri' => 'http://localhost/Autorepa_v2/backend/public/']);
try{
    $response = $client->post('oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => 2,
            'client_secret' => 'ZvLbTJY3Z6aPZC948mwVIZIMh0gAtt9cfh8fRpZ9',
            'username' => 'irfan23.aimviz@gmail.com',
            'password' => 'abcasd23sad123',
            'scope' => '*',
        ]
    ]);

    // You'd typically save this payload in the session
    $auth = json_decode( (string) $response->getBody() );

    $response  = $client->post('api/job-post', [
        'headers' => [
            'Authorization' => 'Bearer '.$auth->access_token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
        'json' => [
            //'user_id' => 'BUICK', //$_POST[''],
            'job_type_id' => 2, //$_POST['checkBoxJobType'],
            'job_title' => 'JOB TITLE', //$_POST['job_title'],
            'job_desc' => 'job description', //$_POST['job_desc'],
            'address' => 'customer address', //$_POST['address'],
            'carBrand' => 'BUICK', //$_POST['carBrand'],
            'carModel' => 'INTEG', //$_POST['carModel'],
            //'pics' => '020', //$_POST['carPic'],
            'checkBoxJobType' => 2,
            'budget' => '255', //$_POST['budget'],
            //'pics' => '020', //$_POST['budget'],
        ]
    ]);
    //var_dump($response);
    echo $response->getBody();

}
catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    //print_r($e);
}
