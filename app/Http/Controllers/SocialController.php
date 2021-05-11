<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    // vk
    public function loginVk()
    {
        if (\Auth::id()) {
            return redirect()->back();
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVk()
    {
        $user = Socialite::driver('vkontakte')->user();
        $ownUser = User::query()
            ->where('id_in_soc', $user->getId())
            ->where('type_auth', 'vk')
            ->first();

        if (is_null($ownUser)) {
            $ownUser = new User();
            $ownUser->fill([
                'name' => $user->getName(),
                'email' => $user->getEmail(), //может вылезать ошибка, если у юзера не указан емаил в вк
                'password' => \Hash::make('qwerty'),
                'id_in_soc' => $user->getId(),
                'type_auth' => 'vk',
                'avatar' => $user->getAvatar(),
            ])->save();
        }

        \Auth::login($ownUser);
        return redirect()->route("news::categories");
    }

    //github

    public function loginGitHub()
    {
        if (\Auth::id()) {
            return redirect()->back();
        }
        return Socialite::driver('github')->redirect();
    }

    public function responseGitHub()
    {
        $user = Socialite::driver('github')->user();
        $ownUser = User::query()
            ->where('id_in_soc', $user->getId())
            ->where('type_auth', 'site')
            ->first();

        if (is_null($ownUser)) {
            $ownUser = new User();
            $ownUser->fill([
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'password' => \Hash::make('qwerty'),
                'id_in_soc' => $user->getId(),
                'type_auth' => 'site',
                'avatar' => $user->getAvatar(),
            ])->save();
        }

        \Auth::login($ownUser);
        return redirect()->route("news::categories");
    }
}