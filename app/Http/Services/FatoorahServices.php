<?php

namespace App\Http\Services;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FatoorahServices
{

    private $base_url;
    private $headers;
    private $request_client;


    public function __construct(Client $request_client)
    {
        $this->request_client = $request_client;
        $this->base_url = env('fatoorah_base_url');
        $this->headers = [
          'Content-type' => 'application/json',
          'authorization' => 'Bearer'.env('fatoorah_token')
        ];
    }


    public function buildRequest($url, $method, $body = []){
        $request = new Request($method,$this->base_url . $url , $this->headers);
        if (!$body){
            return false;
        }
        $response= $this->request_client->send($request,[
           'json'=> $body
        ]);
        if ($response->getStatusCode() != 200){
            return false;
        }
    }


    public function sendPayment($patient_id , $fee , $plan_id , $subscriptionPlan){
        $requestData= $this->parsePaymentData();
        $response= $this->buildRequest('v2/SendPayment','POST',$requestData);
        if ($response){
            $this->saveTransactionPayment($patient_id, $response['Data']['InvoiceId']);
        }
        return $response;
    }
}
