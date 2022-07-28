<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserStoreRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Safe;
use App\Models\Chest;


class UsersController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function signup()
    {
        return view('auth.welcome')->with("mode", "signup");
    }
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function signin()
    {
        return view('auth.welcome')->with("mode", "signin");
    }


    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\UserLoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeLogin(UserLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeRegister(UserStoreRequest $request)
    {

        $user = User::create(
            [
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'fullname' => $request->fullname,
                'ph_name' => $request->ph_name,
                'licence' => $request->licence,
            ]
        );

        $user->safe()->create(["total" => "0"]);
        $user->chest()->create(["total" => "0"]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function isEmailExist(Request $req)
    {
        $user = User::where("email", $req->email)->get()->first();
        if ($user)
            return response()->json(["result" => "notunique"]);
        else
            return response()->json(["result" => "unique"]);
    }
}
