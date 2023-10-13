<?php


namespace App\Services;


use Omnipay\Omnipay;

class OmnipayService
{
    protected $gateway = '';
    public function __construct($payment_method = 'PayPal_Express'){
        if(is_null($payment_method)|| $payment_method == 'PayPal_Express'){
            $this->gateway = Omnipay::create('PayPal_Express');
            $this->gateway->setUsername(env('PAYPAL_USERNAME'));
            $this->gateway->setPassword(env('PAYPAL_PASSWORD'));
            $this->gateway->setSignature(env('PAYPAL_SIGNATURE'));
            $this->gateway->setTestMode(env('PAYPAL_SANDBOX'));
        }
        return $this->gateway;
    }
    public function purchase(array $data){
        $response = $this->gateway->purchase($data)->send();
        return $response;
    }
    public function refund(array $data){
        $response = $this->gateway->refund($data)->send();
        return $response;
    }
    public function complete(array $data){
        $response = $this->gateway->completePurchase($data)->send();
        return $response;
    }
    public function getCancelUrl($order_id){
       return route('checkout.cancel',$order_id);
    }
    public function getReturnUrl($order_id){
       return route('checkout.complete',$order_id);
    }
    public function getNotifyUrl($order_id){
        $env=env('PAYPAL_SANDBOX')?'sandbox':'live';
       return route('checkout.webhook.ipn',[$order_id,$env]);
    }
}
