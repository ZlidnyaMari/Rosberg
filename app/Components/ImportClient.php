<?php

namespace App\Components;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ImportClient 
{
    public $client;

    public function __construct()
    {
        // $this->client = new Client([
        //     // Base URI is used with relative requests
        //     'base_uri' => 'https://jsonplaceholder.typicode.com/users',
        //     // You can set any number of default request options.
        //     'timeout'  => 2.0,
        // ]);

        $this->client = Http::get('https://jsonplaceholder.typicode.com/users');

    }

    public function getCollection()
    {
       return $this->client->collect();
    }
    
}