<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Services\Contracts\Social;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;


class SocialService implements Social
{
    public function loginAndGetRedirectUrl(SocialUser $socialUser)
    {
        $user = User::query()->where('email', '=', $socialUser->email)->first();

        if ($user === null && $socialUser === null) {
            return route('register');
        }elseif ($user === null && isset($socialUser)) {
            $newUser = new User;

            $newUser->name = $socialUser->name;
            $newUser->avatar = $socialUser->avatar;
            $newUser->email = $socialUser->email;
            $newUser->password = bcrypt((string)$socialUser->email.(string)$socialUser->id);
            $newUser->yandex_id = $socialUser->id;

            if ($newUser->save()) {
                Auth::loginUsingId($newUser->id);
                return route('account');
            }
        }

        if ($user->yandex_id === null) {
            $user->name = $socialUser->name;
            $user->avatar = $socialUser->avatar;
            $user->yandex_id = $socialUser->id;
        }

        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return route('account');
        }


        throw new \Exception('Did not save user');
    }
}
