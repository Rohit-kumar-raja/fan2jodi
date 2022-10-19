<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class indexController extends Controller
{
   public function index(){
    $data=DB::table('matches')->where('status',1)->get();
    $sliders=DB::table('slider_tbl')->where('is_deleted',1)->get();
    return view('battle',['data'=>$data,'sliders'=>$sliders]);
   }
}
