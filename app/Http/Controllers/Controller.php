<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
date_default_timezone_set('Asia/Kolkata');

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function insert_image($image, $folder)
    {
        $destinationPath = 'upload/' . $folder . '/';
        $image_name = time() . "_" . $image->getClientOriginalName();
        $image->move($destinationPath, $image_name);
        return $image_name;
    }
}
