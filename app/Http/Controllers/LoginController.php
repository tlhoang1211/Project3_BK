<?php

namespace App\Http\Controllers;

use App\Account;
use App\City;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(): Factory|View|Application
    {
        $cities = City::all();
        session(['previous_link' => url()->previous()]);
        return view('auth.login_register', compact('cities'));
    }

    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remembered === 'checked'))
        {
            $request->session()->regenerate();
            if (auth()->user()->role->name === 'admin')
            {
                return redirect('/admin');
            }
            return redirect(session('previous_link'));
        }

        return redirect(route('login'))
            ->withErrors([['emailLogin' => 'account not found'], ['passwordLogin' => 'Account not found']]);
    }

    // Google login
    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback(): RedirectResponse|Application|Redirector
    {
        try
        {
            $user = Socialite::driver('google')->user();
            return $this->_registerOrLogin($user);
        }
        catch (Exception)
        {
            return redirect(route('login'));
        }
    }


    private function _registerOrLogin($data): RedirectResponse|Application|Redirector
    {
        $account = Account::where('email', $data->email)->first();

        // Create new account if not found email
        if (!$account)
        {
            $account = Account::create([
                'fullName'       => $data->name,
                'email'          => $data->email,
                'provided_id'    => $data->id,
                'avatar'         => $data->avatar,
                'email_verified' => "verified",
            ]);
        }

        auth()->login($account);
        return redirect(route('home'));
    }

    // Facebook  login
    public function redirectToFacebook(): \Symfony\Component\HttpFoundation\RedirectResponse|RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook  callback
    public function handleFacebookCallback(): RedirectResponse|Application|Redirector
    {
        try
        {
            $user = Socialite::driver('facebook')->user();
            return $this->_registerOrLogin($user);
        }
        catch (Exception)
        {
            return redirect(route('login'));
        }
    }
}
