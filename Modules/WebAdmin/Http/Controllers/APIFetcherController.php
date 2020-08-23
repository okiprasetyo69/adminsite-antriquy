<?php

namespace Modules\WebAdmin\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

use GuzzleHttp\Client;

class APIFetcherController extends Controller
{
    private $url        = '';
    private $method     = '';
    private $header     = [];
    private $form_data  = [];

    public function __construct() {
        $this->url      = url('/');
        $this->method   = 'POST';
        $this->header   = ["X-Requested-With: XMLHttpRequest", "Content-Type: multipart/form-data; charset=utf-8"];
    }

    public function url($url) {
        $this->url          = $url;
        
        return $this;
    }

    public function method($method) {
        $this->method       = $method;
        
        return $this;
    }

    public function header($header) {
        $this->header       = $header;
        
        return $this;
    }

    public function form_data($form_data) {
        $this->form_data    = $form_data;
        
        return $this;
    }

    public function hit() {
        $client = new Client();

        $response   = response()->json([
            'status'    => 500,
            'message'   => 'Internal server error',
            'data'      => []
        ], 500);
        
        $response = $client->request(strtoupper($this->method), $this->url, [
            'form_params'   => $this->form_data
        ]);
        
        $response = $response->getBody()->getContents();

        return $response;
    }
}
