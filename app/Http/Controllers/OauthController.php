<?php

namespace App\Http\Controllers;
use App\Models\User_package;
use App\Models\Users;
use Auth;

use App\Http\Controllers\Controller;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Session;

class OauthController extends Controller
{
   

    public function redirectToProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleProviderCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = Users::where('gauth_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                $cek_user_package = User_package::where('user_id', $finduser->id)->count();
                
                if($cek_user_package  == 1) {
                    $user_package = User_package::where('user_id', $finduser->id)->first();
                    Session::put('user_package', $user_package->product_plan_id);
                    Session::put('user_name', $user->name);
                }

                return redirect()->intended('/manage');

            }else{

                $newUser = Users::create([
                    'role_id' => 3, // buyer
                    'name' => $user->name,
                    'email' => $user->email,
                    'telp'=> $user->telp,
                    'gauth_id'=> $user->id,
                    'gauth_type'=> 'google',
                    'password' => bcrypt('nodebuilder'),
                    'is_active' => 1,
                    'photo' => $user->getAvatar()
                ]);

                Auth::login($newUser);

                return redirect()->intended('/manage');
            }

        } catch (Exception $e) {
            dd($e);
        }
    }


}
