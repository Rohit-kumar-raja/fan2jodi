<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
trait PaymentTrait
{
    public function startPayment($data)
    {
        $successUrl = url('/payment-response');
        $payemtDataSet = json_encode([
            "key"=>"dd37b50e-90f9-445f-af22-0ebf9102fb08",
            "client_txn_id"=>$data['client_txn_id'],
            "amount"=>$data['amount'],
            "p_info"=>"Player Purchase",
            "customer_name"=>$data['name'],
            "customer_email"=>$data['email'],
            "customer_mobile"=>$data['phone'],
            "redirect_url"=>$successUrl,
            "udf1"=>"",
            "udf2"=>"",
            "udf3"=>"",
            ]);
            // return $payemtDataSet;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://merchant.upigateway.com/api/create_order',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$payemtDataSet,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response);
    }
    public function checkPaymentStatus($data)
    {
            $dataSet =json_encode([
                "key"=>"dd37b50e-90f9-445f-af22-0ebf9102fb08",
                "client_txn_id"=>$data['client_txn_id'],
                "txn_date"=>$data['txn_date'],
            ]);
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://merchant.upigateway.com/api/check_order_status',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$dataSet,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            return json_decode($response);

    }
}