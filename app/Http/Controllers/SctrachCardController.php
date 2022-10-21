<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SctrachCardController extends Controller
{
    public function index($contest_id,$matche_id)
    {
        $contest = DB::table('contests')->find($contest_id);
        $matche = DB::table('matches')->find($matche_id);

        return view('player-scract-card',['contest'=>$contest,'matche'=>$matche]);
    }
}
