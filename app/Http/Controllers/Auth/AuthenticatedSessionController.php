<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Stripe\Stripe;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->is_subscriber) {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $account = \Stripe\Account::retrieve($user->stripe_account_id);

            $isActive = strtolower($account->metadata->is_active ?? 'true');

            if (in_array($isActive, ['0', 'false'], true)) {
                Auth::logout();
                abort(403, 'Your account has been terminated');
            }

            return redirect()->intended(route('dashboard', absolute: false));
        } else {
            return redirect(route('subscription_plan'));
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
