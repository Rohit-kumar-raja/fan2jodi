<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class WalletController extends Controller
{
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

        $totalWithdrawStatus = DB::table('withdraw_requests')->where('payment_status', 'pending')->where('user_id', Auth::user()->id)->sum('amount');
        $totalBalance = $totalCredit - $totalDebit;
        $totalRedeemBalance = $totalWithdrawStatus;

        return view('wallet', ['total_balance' => $totalBalance, 'total_redeem_balance' => $totalRedeemBalance]);
    }

    public function withdrawRequest(Request $request)
    {
        $totalCredit = DB::table('wallets')->where('user_id', Auth::user()->id)->sum('credit');
        $totalDebit = DB::table('wallets')->where('user_id', Auth::user()->id)->sum('debit');

        $totalWithdrawStatus = DB::table('withdraw_requests')->where('payment_status', 'pending')->where('user_id', Auth::user()->id)->sum('amount');
        $totalBalance = $totalCredit - $totalDebit;
        $totalRedeemBalance = $totalBalance - $totalWithdrawStatus;
        if ($totalRedeemBalance > $request->deposit_amount) {

            $data = [
                'user_id' => Auth::user()->id,
                'amount' => $request->deposit_amount,
                'payment_status' => "pending",
                'status' => 0,
                'payment_type' => $request->payment_type,
                'payment_id' => $request->payment_id,

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
        $paymentStatus = "failed";
        if ($request->status == 'success') {
            $paymentStatus = "paid";
        } else if ($request->status == 'failed') {
            $paymentStatus = "failed";
        }
        $payment = Payment::where('order_id', $request->order_id)->first();
        $payment->txn_id = $request->order_id;
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
            'order_amount' => $request->amount,
            'txn_id' => $request->order_id,
            'status' => $request->status
        ];
        if ($payment->status == 'paid') {
            $dataArray = [
                'user_id' => $payment->user_id,
                'debit' => 0,
                'withdraw_status' => "pending",
                'credit' => $request->amount,
                'balance' => $lastBalance + $request->amount,
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
        $action = 'https://full2sms.in/gateway/processPpayment';
        $successUrl = url('/payment-response.php');
        $failureUrl = $successUrl;
        //   $txnid = hexdec( uniqid() );
        $txnid = $this->generateRandomString(12);
        //   return $txnid;
        $amount = $request->deposit_amount;
        $payment = new Payment();
        $payment->user_id = Auth::user()->id;
        $payment->order_id = $txnid;
        $payment->payment_amount = $amount;
        $payment->payment_type = "deposit";
        $payment->payment_date = date('Y-m-d H:i:s');
        $payment->status = "pending";
        // return Auth::user()->phone;
        $payment->save();
        $html = '
        <form id="prikpay_redr" method="get" action="' . $action . '" style="display:none;">
                <input type="" value="' . $txnid . '" name="order_id">
                <input type="" value="53494857575397985510" name="cpin">
                <input type="" value="JaRuYjKMepovCbQHAZ5V7Uk" name="token">
                <input type="" value="' . $amount . '" name="amount"> 
                <input type=""  value="' . Auth::user()->phone . '" name="Mobile_Number"> 
                <input type="" value="' . $successUrl . '" name="Success_Url"> 
                <input type="" value="' . $failureUrl . '" name="Failure_Url"> 
                <input type="" value="' . $payment->id . '" name="Param1"> 
                <button type="submit" id="payBtn">pay</button>
            </form>
            <script>
                document.getElementById("prikpay_redr").submit();
            </script>
        ';

        echo $html;
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
        $data = DB::table('withdraw_requests')->where('user_id', Auth::user()->id)->paginate(10);
        return view('withdraw', ['data' => $data]);
    }
}
