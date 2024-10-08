<?php

namespace App\Http\Controllers;

use App\Models\User_package;
use App\Models\Users;
use Auth;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Http\Controllers\Controller;

class CredentialController extends Controller
{

    public function index(Request $request)
     {
        if(auth()->user()->id) {
            return redirect('/manage');
        } else {
            return redirect('/login');
        }
     }

    public function login(Request $request)
    {
        return view('pages/manage/login');
    }

    public function auth_login(Request $request)
    {
        $credentials = $request->validate([
             'email' => 'required',
             'password' => 'required'
         ]);
 
         if(Auth::attempt($credentials)) {

             $is_active = Users::where('email', $request->email)->first()->is_active;
             
             if($is_active == 1) {

                $request->session()->regenerate();

                $role_id = Users::where('email', $request->email)->first()->role_id;
                $user_id = Users::where('email', $request->email)->first()->id;
                $package_id = User_package::where('user_id', $user_id)->first()->product_plan_id;
                
                $request->session()->put('role_id', $role_id);
                $request->session()->put('package_id', $package_id);

                return redirect()->intended('/manage/ssite');

             } else {

                Auth::logout();
                request()->session()->invalidate();
                request()->session()->regenerateToken();

                return redirect('/login')->with('failed', 'Account is deactive');
             }

             
         }
 
         return redirect('/login')->with('failed', 'Email / Password Tidak Sesuai');
    }

    public function auth_logout(Request $request)
    {
         Auth::logout();
         request()->session()->invalidate();
         request()->session()->regenerateToken();
         return redirect()->intended('/login');
    }

}


