<?php

namespace App\Http\Controllers;

use App\Models\Webhook;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaystackController extends Controller
{
    public function events(Request $request){
        // return json_encode($request->all());
        $webhook = new Webhook;

        $webhook->dump = json_encode($request->all());
        
        if($request->data && $request->data->reference){
            $webhook->reference = $request->data->reference;
        }

        $webhook->save();
        
        $decodedData = json_decode($webhook);
        if($decodedData->event && $decodedData->event == 'charge.success' && $decodedData->data && $decodedData->datta->reference && $decodedData->data->amount){
            $this->createPaymentFromWebHook($decodedData->data);   
        }
        
        return 'done';
    }

    public function createPaymentFromWebHook(object $data){

        $payment = new Payment;
        $payment->reference = $data->reference;
        $payment->amount = $data->amount/100;
        $payment->
    }
}
