<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ContestController extends Controller
{
   public function index($matche_id){
    $data=DB::table('contests')->where('matches_id',$matche_id)->where('status',1)->get();
    return view('contest',['data'=>$data]);
   }
}
