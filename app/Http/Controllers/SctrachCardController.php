<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\matches;

class SctrachCardController extends Controller
{
    public function index($contest_id, $matche_id)
    {
        $contest = DB::table('contests')->find($contest_id);
        $matche = DB::table('matches')->find($matche_id);

        return view('player-scract-card', ['contest' => $contest, 'matche' => $matche]);
    }

    public function sratch_card(Request $request)
    {
        $matche_id = $request->matche_id;
        $contest_id = $request->contest_id;
        $wallet_id = '';
        $exits =  DB::table('participated_users')->where('user_id', Auth::user()->id)->where('matche_id', $matche_id)->where('contest_id', $contest_id)->first();
        // if user already participated in this matches
        if ($exits == '') {
            $contest =  DB::table('contests')->find($contest_id);
            $wallets_credit = DB::table('wallets')->where('user_id', Auth::user()->id)->sum('credit');
            $wallets_debit = DB::table('wallets')->where('user_id', Auth::user()->id)->sum('debit');
            $wallet_balance_amount = $wallets_credit - $wallets_debit;


            // if user walllet not sufficiant for the join to the contest
            if ($wallet_balance_amount >= $contest->participate_amount) {

                // debit the amount from the user account 
                $wallet_id =  DB::table('wallets')->insertGetId([
                    'user_id' => Auth::user()->id,
                    'debit' => $contest->participate_amount,
                    'credit' => 0,
                    'balance' => $wallet_balance_amount - $contest->participate_amount,
                    'withdraw_status' => "success",
                    'api_info' => 'contest:' . $contest->id,
                    'status' => 1,
                    'created_at' => date('Y-m-d h:m:s'),
                    'updated_at' => date('Y-m-d h:m:s')

                ]);
                // $team1 =[0=>''];
                // creating the player 
                $matches =  DB::table('matches')->find($matche_id);
                $contestnoOfParticipate = DB::table('contests')->where('matches_id',$matche_id)->value('no_of_participate');
                $randMembers =$this->generateRandomString($contestnoOfParticipate);
                $randPlayer1Team = explode(":",$randMembers[0])[0];
                $randPlayer2Team = explode(":",$randMembers[1])[0];
                $randPlayer1 = explode(":",$randMembers[0])[1];
                $randPlayer2 = explode(":",$randMembers[1])[1];
                
                // return [$randPlayer2,$randPlayer1,$randPlayer1Team,$randPlayer2Team];
                if($randPlayer1Team=="a")
                {
                    $team1 = $matches->teamone . '-' . $randPlayer1;
                }else
                {
                    $team1 =$matches->teamtwo . '-' . $randPlayer1;
                }

                if($randPlayer2Team=="a")
                {
                    $team2 = $matches->teamone . '-' . $randPlayer2;
                }else
                {
                    $team2 =$matches->teamtwo . '-' . $randPlayer2;
                }
               
                $team = $team1 . ":" . $team2;

                // adding the data on participated user list
                $participate_id =  DB::table('participated_users')->insertGetId([
                    'user_id' => Auth::user()->id,
                    'matche_id' => $matche_id,
                    'contest_id' => $contest_id,
                    'wallet_id' => $wallet_id,
                    'player' => $team,
                    'scratch' => $contest->no_scratch_card_in_one,
                    'participate_amount' => $contest->participate_amount,
                    'status' => 1,
                    'created_at' => date('Y-m-d h:m:s')
                ]);
                // if user already participate then amount will be not deducted
                if ($participate_id > 0) {
                    return response()->json(['team1' => $team1, 'team2' => $team2]);
                } else {
                    DB::table('wallets')->delete($wallet_id);
                    return response()->json(['error' => 'You are Already Joined in this contest']);
                }
                
                // if user walllet not sufficiant for the join to the contest
            } else {
                // DB::table('wallets')->delete($wallet_id);
                return response()->json(['error' => "You don't have enogth balance for join this contest"]);
            }
            // if user already participated in this matches
        } else {
            return response()->json(['error' => 'You are Already Joined in this contest']);
        }
    }

    public function dataSet15()
    {
       $return=[
         array(0=>"a:1",1=>"b:2"),
         array(0=>"a:2",1=>"b:2"),
         array(0=>"a:3",1=>"b:2"),
         array(0=>"a:4",1=>"b:2"),
 
         array(0=>"a:2",1=>"b:1"),
         array(0=>"a:3",1=>"b:1"),
         array(0=>"a:1",1=>"b:1"),
         array(0=>"a:4",1=>"b:1"),
 
         array(0=>"a:1",1=>"b:3"),
         array(0=>"a:2",1=>"b:3"),
         array(0=>"a:3",1=>"b:3"),
         array(0=>"a:4",1=>"b:3"),
         array(0=>"b:2",1=>"b:4"),
         array(0=>"a:2",1=>"b:4"),
         array(0=>"a:3",1=>"b:4"),
       ];
       return $return;
    }
    public function dataSet28()
    {
       $return=[
         array(0=>"a:1",1=>"b:2"),
         array(0=>"a:2",1=>"b:2"),
         array(0=>"a:3",1=>"b:2"),
         array(0=>"a:4",1=>"b:2"),
 
         array(0=>"a:2",1=>"b:1"),
         array(0=>"a:3",1=>"b:1"),
         array(0=>"a:1",1=>"b:1"),
         array(0=>"a:4",1=>"b:1"),
 
         array(0=>"a:1",1=>"b:3"),
         array(0=>"a:2",1=>"b:3"),
         array(0=>"a:3",1=>"b:3"),
         array(0=>"a:4",1=>"b:3"),
 
         array(0=>"b:2",1=>"b:4"),
         array(0=>"a:2",1=>"b:4"),
         array(0=>"a:3",1=>"b:4"),
         array(0=>"b:2",1=>"b:4"),
 
         array(0=>"a:2",1=>"b:4"),
         array(0=>"a:3",1=>"b:4"),
         array(0=>"b:2",1=>"b:4"),
         array(0=>"a:2",1=>"b:4"),
 
         array(0=>"a:3",1=>"b:4"),
         array(0=>"b:2",1=>"b:4"),
         array(0=>"a:2",1=>"b:4"),
         array(0=>"a:3",1=>"b:4"),
 
         array(0=>"b:2",1=>"b:4"),
         array(0=>"a:2",1=>"b:4"),
         array(0=>"a:3",1=>"b:4"),
         array(0=>"a:3",1=>"b:4"),
       ];
       return $return;
    }
 
    function generateRandomString($contestnoOfParticipate = 15) {
        if($contestnoOfParticipate==15)
        {
            return $this->dataSet15()[rand(1, 14)];
        }else
        {
            return $this->dataSet28()[rand(1, 14)];
        }
      
   }
}
