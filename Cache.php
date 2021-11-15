<?php
error_reporting(E_ALL);
require 'vendor/autoload.php';
use GuzzleHttp\Client;

// Use Guzzle library for API requests.
$recipient = [
    'address1' => '11025 Westlake Dr',
    'city' => 'Charlotte',
    'country_code' => 'US',
    'state_code'  => 'CA',
    'zip' => '28273'
];

$items = [
    [
    'quantity' => '2',
    'variant_id' => '7679',
    ]
];

$request = ['recipient' => $recipient, 'items' => $items];

$payload = json_encode($request);


   try{
    
      $client = new Client(['base_uri' => 'https://api.printful.com/']);
      
      $guzzleResponse = $client->request('POST', 'shipping/rates', [
                'curl' => [
                  CURLOPT_USERPWD  => '77qn9aax-qrrm-idki:lnh0-fm2nhmp0yca7',
                ],
                'body' => $payload,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept'       => 'application/json',
                ]
            ]);
    
        $result = $guzzleResponse->getBody()->getContents();
        
    } catch (GuzzleHttp\Exception\RequestException $e) {
        print_r([
            "status" => false,
            "message" => $e->getMessage(),
        ]);
    } catch(Exception $e){
        print_r([
            "status" => false,
            "message" => $e->getMessage(),
        ]);
    }

// Use Guzzle library for API requests.

?>