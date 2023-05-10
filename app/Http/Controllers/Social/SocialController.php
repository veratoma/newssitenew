<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Services\Contracts\Social;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social)
    {
        return redirect(
            $social->loginAndGetRedirectUrl(
                Socialite::driver($driver)->user()
            )
        );

    }
}
