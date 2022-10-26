<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContestController extends Controller
{
   public function index($matche_id)
   {
      $data = DB::table('contests')->where('matches_id', $matche_id)->where('status', 1)->orderByDesc('id')->get();

      //  my contest for particular matches
      $my_contest = DB::table('participated_users')->where('matche_id', $matche_id)->where('user_id', Auth::user()->id)->where('status', 1)->get();
      // count of total joined contest 
      $my_contest_count = DB::table('participated_users')->where('matche_id', $matche_id)->where('user_id', Auth::user()->id)->where('status', 1)->count();

      return view('contest', ['data' => $data, 'matche_id' => $matche_id, 'my_contest' => $my_contest, 'my_contest_count' => $my_contest_count]);
   }
   public function my_contest()
   {
      $my_contest = DB::table('participated_users')->where('user_id', Auth::user()->id)->where('status', 1)->orderByDesc('id')->get();
      // count of total joined contest 
      $my_contest_count = DB::table('participated_users')->where('user_id', Auth::user()->id)->where('status', 1)->count();
      return view('my_contest', ['my_contest' => $my_contest, 'my_contest_count' => $my_contest_count]);
   }

   public function my_contest_details($contest_id){
      $my_contest = DB::table('participated_users')->where('user_id', Auth::user()->id)->where('contest_id',$contest_id)->where('status', 1)->orderByDesc('id')->get();
      // count of total joined contest 
      return view('my-contest-details', ['my_contest' => $my_contest]);
   }
   
}
