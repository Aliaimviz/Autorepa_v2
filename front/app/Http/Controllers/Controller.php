<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $base_uri = 'http://localhost/autorepa/Autorepa_v2/backend/public/';

  	public $token;
    public $client;

    public function __construct(){
      $this->client = new Client(['base_uri' => $this->base_uri]);
      $this->token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjU1M2I3MDg5YzM2NDA0MjMzYzNmMTYwZDIyY2M0NzVhMTc2YzQ4ODc2YjY3ZTkyZDRhMDc4NmI4N2E4ZWRkYzYyMmY5OTBjYjA2ZTdiZmQyIn0.eyJhdWQiOiIyIiwianRpIjoiNTUzYjcwODljMzY0MDQyMzNjM2YxNjBkMjJjYzQ3NWExNzZjNDg4NzZiNjdlOTJkNGEwNzg2Yjg3YThlZGRjNjIyZjk5MGNiMDZlN2JmZDIiLCJpYXQiOjE1MDM4OTgyNzksIm5iZiI6MTUwMzg5ODI3OSwiZXhwIjoxNTM1NDM0Mjc4LCJzdWIiOiIzIiwic2NvcGVzIjpbIioiXX0.n6Pu0fKhsmMBOOwUhJ57e8P7wTGBCajUTq2hEbRR477brFYOiqKd5QA6k9TIBIlvA8J0Bmsz3HthbxUr9sMFLKWi4jqDFL7q4T9qZrCkRHWErvr6-irL_NFmda_U2HXZtUsxhkE6ObWDoTLfK2-X_vtYhqCiCiytFkXVU9bs-_kcmf4XdrgivmeTgV-6G2PYkeyIy1-Ef7T-RK1UEhKJOtmElDBU6k5O6fC3zHfuWoCjnrrkjCTN57rppMzLig10NB2vLbUXhYcENzVFx_0ndg527nyqkpXrVEYLkPjQ1UHWYtVtUgPXF68qSea76Q570gKBrycdofuUvXvV9bz1MDrrKZ8L8OL334Jjnn_8BOOc5TO4QrhDL-bwC6fwCjMOSSgGoZAzmDHwH7fXgGGer27UO-M6mBremt0UzifiS2l65G_nLI8ghveQr0BCHtoKtHMnZW8l0V2E4N2zHxBojOWrexyrQ1k0VuE-HgpHRLkSHuDzyBlYGhzQj3cW-f6mm3-V3yIH2tFXLfHt37aczAzzVWMcUDbFXn5nKoWjZlMoLfceHMsT5PHgpU9sdUqTuGvTaf9GJsnTav2df5mVeLomOmtX3mCpU0vm0_xMiCTxyauy39lEsKdu_T-5A1LWKtmPgLprlHBD7OqummnncNW9I_BknVBYp3IZ4DaPhVo';
    }




}
