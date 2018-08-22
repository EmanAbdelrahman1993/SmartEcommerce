<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Stmt\Use_;
use App\User;

class AuthSocController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

//       dd($user->getId());
//        dd($user->getEmail());

        $getProvider = Provider::where('provider_id', $user->getId())->first();
        //dd($getProvider);

        if(!$getProvider)
        {
            //New User
            $getRealUser = User::where('email' , $user->getEmail())->first();
            if(!$getRealUser)
            {
                $getRealUser = new User;
                $getRealUser->name = $user->getName();
                $getRealUser->email= $user->getEmail();
                //dd($getRealUser);
                $getRealUser->save();
            }

            $newProvider = new Provider();
            $newProvider->provider_id = $user->getId();
            $newProvider->provider = $provider;
            $newProvider->user_id = $getRealUser->id;
            //dd($newProvider);
            $newProvider->save();
        }

        else
        {
            // User Loggined before
            $getRealUser = User::find($getProvider->user_id);
        }
        auth()->login($getRealUser);
        return redirect('/');
        // $user->token;

    }
}
