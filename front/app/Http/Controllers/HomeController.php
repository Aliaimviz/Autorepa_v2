<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function api($id)
    {
        $client = new Client();
        try{
            $response = $client->get('http://localhost/example/backend/public/api/jobLists/'.$id, [
                'headers' => [
                    'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjI0NGEzNDIzMDc0Njg1YjU3Yjg2YmQ0MGU1MzAxYjk0NWNkYmYwNTE1YjA0ZDhiMGQ5NGJkMzAyYzMwZDAxMmQ1OWNhYmIwMTY2MmVhYjFlIn0.eyJhdWQiOiIxMSIsImp0aSI6IjI0NGEzNDIzMDc0Njg1YjU3Yjg2YmQ0MGU1MzAxYjk0NWNkYmYwNTE1YjA0ZDhiMGQ5NGJkMzAyYzMwZDAxMmQ1OWNhYmIwMTY2MmVhYjFlIiwiaWF0IjoxNTAzOTAxNzM0LCJuYmYiOjE1MDM5MDE3MzQsImV4cCI6MTUzNTQzNzczMywic3ViIjoiMyIsInNjb3BlcyI6WyIqIl19.dbnx1utvqbWuPRgT_-crCgNL_cIrljI7rArAhMnxH6LjLxvfsYNHI3I7tmN-5Vdcvk7Nq_H-1_p55UQ2R_4o8y4ZjjKs1Skm5xm0ziL30zlqYDzO0g6FZqEMvVsWIg2CWksY3wYXZTHmDDRrPHQZwa2KrPiVVOajU4C0Os-kGY6d57fqlLjyft5_CQh2QuSrNGcpgr2RlwkxdQLbFpJ1axmj1o7mgVBGeMUqfPO2BRYydFyfMM2PVCHjoKcDUqQrtQfM6fP5rTBnKcMTKa4a3riDFOs5QbnavOyKGFrl4S1Dj_yrLVAyy7Omv6vHCbkzxNncRp7Fh6If2kt7rSqEGbqh3iHW1DTB1VIMp7aBEGNDrF6XB05vHtyS-woKgzsRvU3fS6RZntECAWZSnnNMwOOWFvSUT40dImeodDkKHMI3WjtuUJSHc_95X575cVWAE0AqDGEJcsxQzFsqe3gTkOefpVunc0R8-lcVtbYUUo3ycit9WPulTjMfGWyAI2ROi8HMpVCwKPN_grvuwvl0yb45BNmV0hK0BqT9lDzqX0hCGyCDMCu_EKkCrrOCy_1sH_EGHBO46UOMAlMe7OTDHZqAAeq7Drrx1qPnTRHm3klA9vD0aXvMo3FR-3ImYhpESIWQCYeEEsM3wy6ZTFZfyZlNv8mEQ71RpOOgKvhOUp8',
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]
            ]);

            $todos = json_decode( (string) $response->getBody() );
            //dd($todos); 
            return view('api',['todos' => $todos]);
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    public function generate(){
        $client = new Client();
        try{
            $response = $client->post('http://localhost/example/backend/public/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 11,
                    'client_secret' => 'G84bIO4vDbJkSIgxc4a4GAk9tGAIg9h8UjvC4bbD',
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
            die();

        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

    }
}
