<?php

namespace App\Http\Controllers;
use App\Models\Users;
use Auth;

use App\Http\Controllers\Controller;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
   

    public function redirectToProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleProviderCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = Users::where('gauth_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/manage');

            }else{
                $newUser = Users::create([
                    'role_id' => 3, // buyer
                    'name' => $user->name,
                    'email' => $user->email,
                    'telp'=> '089823723324798234',
                    'gauth_id'=> $user->id,
                    'gauth_type'=> 'google',
                    'password' => bcrypt('nodebuilder'),
                    'is_active' => 1,
                ]);

                Auth::login($newUser);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd($e);
        }
    }


}
