<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Traits\PaymentTrait;
class WalletController extends Controller
{
    use PaymentTrait;
    public function transaction()
    {
        // $data =   DB::table('wallets')->where('status', 1)->where('id', Auth::user()->id)->get();
        $data =   DB::table('wallets')->where('user_id', Auth::user()->id)->orderByDesc('id')->paginate(10);
        return view('transaction', ['data' => $data]);
    }

    public function walletList()
    {
        $totalCredit = DB::table('wallets')->where('user_id', Auth::user()->id)->sum('credit');
        $totalDebit = DB::table('wallets')->where('user_id', Auth::user()->id)->sum('debit');
        
        $totalWithdrawStatus = DB::table('withdraw_requests')->where('payment_status', 'pending')->where('user_id', Auth::user()->id)->where('status',1)->sum('amount');
        $totalBalance = ($totalCredit - $totalDebit)-$totalWithdrawStatus;
        $totalRedeemBalance = $totalWithdrawStatus;
        return view('wallet', ['total_balance' => $totalBalance, 'total_redeem_balance' => $totalRedeemBalance, 'created_at'=>date('Y-m-d')]);
 
    }

    public function withdrawRequest(Request $request)
    {
        $totalCredit = DB::table('wallets')->where('user_id', Auth::user()->id)->sum('credit');
        $totalDebit = DB::table('wallets')->where('user_id', Auth::user()->id)->sum('debit');

        $totalWithdrawStatus = DB::table('withdraw_requests')->where('payment_status', 'pending')->where('user_id', Auth::user()->id)->where('status',1)->sum('amount');
        $totalBalance = $totalCredit - $totalDebit;
        $totalRedeemBalance=$totalBalance-$totalWithdrawStatus;
        if ($totalRedeemBalance >= $request->deposit_amount) {

            $data = [
                'user_id' => Auth::user()->id,
                'amount' => $request->deposit_amount,
                'payment_status' => "pending",
                'status' => 1,
                'payment_type' => $request->payment_type,
                'payment_id' => $request->payment_id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ];
            DB::table('withdraw_requests')->insert($data);
            return back()->with('padding', 'Your Withdraw Request is going to panding');
        } else {
            return back()->with('error', 'Your REDEEMABLE BALANCE is not sufficient  ');
        }
    }

    public function paymentGatewayRespone(Request $request)
    {
        # code...
        //  return 
        //  return $request->all();
       
        $payment = Payment::where('client_txn_id', $request->client_txn_id)->first();
        $data=["client_txn_id"=>$payment->client_txn_id,'txn_date'=>date('d-m-Y',strtotime($payment->created_at))];
        $responseData = $this->checkPaymentStatus($data); 
        $paymentStatus = $responseData->data->status;
        // $paymentStatus = "failed";
        if ($paymentStatus == 'success') {
            $paymentStatus = "paid";
        } else if ($paymentStatus == 'failure') {
            $paymentStatus = "failed";
        }      
        $payment->txn_id = $request->txn_id;
        $payment->status = $paymentStatus;
        $payment->payment_date = date('Y-m-d H:i:s');
        $payment->save();
        // $allCreditBalance = 0;
        // $allCreditBalance = DB::table('wallets')->where('user_id',$payment->user_id)->sum('credit');
        $lastBalance = DB::table('wallets')->where('user_id', $payment->user_id)->orderBy('id', 'Desc')->value('balance');
        $apiInfo = [
            'payment_id' => $payment->id,
            'user_id' => $payment->user_id,
            'order_id' => $request->order_id ?? null,
            'order_amount' => $payment->payment_amount,
            'txn_id' => $request->order_id,
            'status' => $request->status
        ];
        if ($payment->status == 'paid') {
            $dataArray = [
                'user_id' => $payment->user_id,
                'debit' => 0,
                'withdraw_status' => "pending",
                'credit' => $payment->payment_amount,
                'balance' => $lastBalance + $payment->payment_amount,
                'api_info' => json_encode($apiInfo),
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
            DB::table('wallets')->insert($dataArray);
            return redirect('/wallet');
        } else {
            return redirect('/add_cash');
        }
    }
    public function depositAmount(Request $request)
    {

        $successUrl = url('/payment-response');
        //   $txnid = hexdec( uniqid() );
        $txnid = $this->generateRandomString(12);
        //   return $txnid;
        $amount = $request->deposit_amount;
        $payment = new Payment();
        $payment->user_id = Auth::user()->id;
        $payment->client_txn_id = $txnid;
        $payment->payment_amount = $amount;
        $payment->payment_type = "deposit";
        $payment->payment_date = date('Y-m-d H:i:s');
        $payment->status = "pending";
        // return Auth::user()->phone;
        // $payment->order_id = $txnid;
        $data =[
            "client_txn_id"=>$payment->client_txn_id,
            "amount"=>$payment->payment_amount,
            "name"=>Auth::user()->name,
            "email"=>Auth::user()->email,
            "phone"=>Auth::user()->phone,
        ];
        $responseData = $this->startPayment($data);        
        $payment->order_id = $responseData->data->order_id;
        $payment->save();
        $paymentUrl = $responseData->data->payment_url;
        header("Location: ".$paymentUrl);
        die();

        return  $responseData->data->payment_url;
    }
    public function withdrawalSubmit(Request $request)
    {
        $withdrawalData = ['user_id' => Auth::user()->id, 'amount' => $request->request_amount, 'status' => 'pending'];
        $withdraw = DB::table('withdrawals')->create($withdrawalData);
        if ($withdraw) {
            //////////////////////////////////
            // set post fields
            $amount = $withdraw->amount;
            $tran_id = 'trx' . rand(0001, 99999999);

            $post = [
                'guid'   => 'ypwcCJEVXSPMu8LGbNgnefljY',
                'amount'   => number_format($amount, 2),
                'mid'   => 'QsOtFAK3PEcv0u8INUXbM7BKD',
                'mkey'   => 'mGoQ7UhlP36dYCnyDr5MJZ9ft',
                'info'   => 'Withdraw lodu moneyearning',
                'mobile'   => $withdraw->vpa ?? $withdraw->user->mobile_no,
            ];
            //  return $post;
            $ch = curl_init('https://full2sms.in/api/v1/disburse/paytm');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            $response = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($response);
            print_r($response);
            if ($response->status == true) {
                $withdraw->status = 1;
                $withdraw->transfer_amount = $amount;
                $withdraw->transfer_date = date('Y-m-d H:i:s');
                $withdraw->utr_id = $response->txn_id;
                $withdraw->tran_id = $tran_id;
                $withdraw->status = "paid";
                $withdraw->save();
                $totalWidthDrawalAmount = $amount + 10;
                $user = User::where('id', Auth::user()->id)->first();
                $user->wallet_amount = $user->wallet_amount - $totalWidthDrawalAmount;
                $user->save();
                //  $general = GeneralSetting::first();
                //  notify($withdraw->user, 'WITHDRAW_APPROVE', [
                //      'method_name' => $withdraw->method->name,
                //      'method_currency' => $withdraw->currency,
                //      'method_amount' => getAmount($withdraw->final_amount),
                //      'amount' => getAmount($withdraw->amount),
                //      'charge' => getAmount($withdraw->charge),
                //      'currency' => $general->cur_text,
                //      'rate' => getAmount($withdraw->rate),
                //      'trx' => $withdraw->trx,
                //      'admin_details' => $request->details
                //  ]);
                Session::put('success', 'Your Payment Transfer Successfully');
            } else {
                Session::put('danger', 'Please Try again your  payment');
            }
        }
        //  return $withdraw;
        //////////////////////////////////////

        //  $notify[] = ['success', 'Withdrawal marked as approved.'];
        return redirect('user/my-earning');
        //  return back();
        # code...
    }

    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function withdraw()
    {
        $data = DB::table('withdraw_requests')->where('user_id', Auth::user()->id)->where('status',1)->paginate(10);
        return view('withdraw', ['data' => $data]);
    }
}
