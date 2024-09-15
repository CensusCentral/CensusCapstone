<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;



class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
                throw ValidationException::withMessages([
                    'email' => __('auth.failed'),
                ]);
            }

            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->role) {
                case 0:
                    return redirect()->intended(route('dashboard'));
                case 1:
                    return redirect()->intended(route('STDashboard'));
                case 2:
                    return redirect()->intended(route('4psDashboard'));
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Invalid role');
            }
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput($request->except('password'));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
