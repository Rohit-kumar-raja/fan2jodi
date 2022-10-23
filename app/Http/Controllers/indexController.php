<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class indexController extends Controller
{
   public function index(){
    $data=DB::table('matches')->where('status',1)->get();
    $sliders=DB::table('slider_tbl')->where('is_deleted',1)->get();
    return view('battle',['data'=>$data,'sliders'=>$sliders]);
   }

   public function updateProfile(Request $request){
      $request->validate([
         'state' => ['required', 'string', 'max:255'],
         // 'email' => ['required', 'string', 'email', 'max:255', 'unique:all_users'],
         'password' => ['required', Rules\Password::defaults()],
         'phone' => ['required', 'max:10', 'min:10']
     ]);
      $user = User::find(Auth::user()->id);
      $user->state = $request->state;
      $user->phone = $request->phone;
      $user->document = $request->document ?? "";
      $user->document_type = $request->document_type;
      $user->password = Hash::make($request->password);
      $user->save();
      return back();
   }
   public function updateUserProfile(Request $request)
   {
      $user = User::find(Auth::user()->id);
      $user->user_name = $request->user_name;
      if(!empty($request->file('update_image')))
      {
         $user->images = $this->insert_image($request->file('update_image'), 'user');
      }
      $user->save();
      return back();
   }
}
