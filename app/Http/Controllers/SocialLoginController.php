<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

// use Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
            $socialUser = Socialite::driver($provider)->user();


            if($socialUser->email != ''){
                if(User::where('email',$socialUser->email)->exists())
                {
                    $auser = User::where('email',$socialUser->email)->first();
                    Auth::login($auser);
                    return redirect()->route('user.dashboard');
                }else{
                    $name = $this->split_name($socialUser->name);
                    $user = new User;
                    $user->email = $socialUser->email;
                    $user->first_name = $name[0];
                    $user->last_name = $name[1];
                    $user->photo = $socialUser->avatar ?? null;
                    $user->save();

                }
            }else{
                if(User::where('socail_id',$socialUser->id)->exists())
                {
                    $auser = User::where('socail_id',$socialUser->id)->first();
                    Auth::login($auser);
                    return redirect()->route('user.dashboard');
                }else{
                    $name = $this->split_name($socialUser->name);
                    $user = new User;
                    $user->socail_id = $socialUser->id;
                    if($socialUser->name != ''){
                        $user->first_name = $name[0];
                        $user->last_name = $name[1];
                    }else{
                        $user->first_name = $socialUser->nickname;
                    }
                    $user->photo = $socialUser->avatar ?? null;
                    $user->save();



                }
            }
            //create a new user and provider



            // dd($socialUser);



        Auth::login($user);
        return redirect()->route('user.dashboard');

    }

    function split_name($name) {
        $name = trim($name);
        $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
        $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
        return array($first_name, $last_name);
    }

}
