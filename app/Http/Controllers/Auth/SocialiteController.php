<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\OautProviders;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    public function login($provider): RedirectResponse
    {
        $socialUser = Socialite::driver($provider)->user();
        $user = User::firstOrCreate([
            'email' => $socialUser->email,
        ], [
            'name' => $socialUser->nickname ?? $socialUser->name,
            'email' => $socialUser->email,
        ]);

        OautProviders::updateOrCreate([
            'provider_user_id' => $socialUser->id,
            'provider' => $provider,
        ], [
            'user_id' => $user->id,
            'access_token' => $socialUser->token,
        ]);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
