<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\AntiSpamMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        // Create log
        LogActivity::addToLog('เข้าสู่ระบบ');

        // Send mail notification Anti-span
        $user = User::where('email', $request->email)->first();
        if ($user) {
            try {
                Mail::to($user->email)->send(new AntiSpamMail($user));
            } catch (Exception $e) {
                LogActivity::addToLog($e->getMessage());
            }
            if (!$user->is_verified) {
                redirect()->intended(RouteServiceProvider::VERIFY);
            }
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Create log
        LogActivity::addToLog('ออกจากระบบ');
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
