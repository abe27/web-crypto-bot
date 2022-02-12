<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use App\Helpers\LogActivity;
use App\Mail\VerifyRegisterMail;
use App\Mail\WaitVerifyAccountMail;
use Exception;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        try {
            // Send Mail To Admin
            Mail::to(env('MAIL_TO_ADMIN'))->send(new VerifyRegisterMail($user));

            // Send Mail To user
            Mail::to($user->email)->send(new WaitVerifyAccountMail($user));
        } catch (Exception $e) {
            LogActivity::addToLog($e->getMessage());
        }

        event(new Registered($user));

        Auth::login($user);
        // Create Log
        LogActivity::addToLog('ลงทะเบียนผู้ใช้งานใหม่');
        // return redirect(RouteServiceProvider::HOME);
        return redirect(RouteServiceProvider::VERIFY);
    }

    /**Add Verify Account By Dev. */
    /**
     * Display the registration view.
     *
     * @return \Inertia\Response
     */
    public function verify()
    {
        return Inertia::render('Auth/VerifyAccount');
    }
}
