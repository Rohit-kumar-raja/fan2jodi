<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiUpdaterController extends Controller
{
    public function index()
    {
        $today = date('l, M d, Y ');
        $previous_date = date('l, M d, Y', (strtotime('-1 day', strtotime($today))));
        // check the previou date of the matches and today matches according the that we calling getting data
        $matches =   DB::table('matches')->where('date', $today)->orWhere('date', $previous_date)->get();
        if ($matches != '') {
            foreach ($matches as $data) {
                $url = $data->url;
                $string = file_get_contents("https://cric-api.vercel.app/i?url=" . $url);
                DB::table('matches')->where('id', $data->id)->update(['api' => $string]);
            }
        }
    }
}
