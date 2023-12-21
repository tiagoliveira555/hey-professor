<?php

namespace App\Http\Controllers\Auth\Github;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class CallbackController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::query()->updateOrCreate([
            'email' => $githubUser->getEmail(),
        ], [
            'name'              => $githubUser->getName(),
            'password'          => Str::random(),
            'email_verified_at' => now(),
        ]);

        Auth::login($user);

        return to_route('dashboard');
    }
}
