<?php 

namespace App\Http\Traits; 

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions as Opts;

trait Requester {

    protected function initClient($baseURI) {
        return new Client([
            "base_uri" => $baseURI
        ]);
    } 

    protected function postJSON($client, $url, $options) { 
        return $client->post($url, [
            Opts::JSON => $options
        ]);
    }
} 