<?php

namespace App\Http\Controllers\Auth;

use Stripe\Stripe;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'store_name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer', 'min:1'],
        ]);

        $user = User::create([
            'name' => $request->store_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'location' => $request->location,
            'store_name' => $request->store_name,
        ]);

        Auth::login($user);

        event(new Registered($user));

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $stripe_acc = \Stripe\Account::create([
                'type' => 'express',
                'country' => 'PH',
                'email' => $user->email,
                'business_type' => 'individual',
                'business_profile' => [
                    'name' => $user->name,
                    // 'support_address' => $user->location,
                    // 'support_email' => $user->email,  
                ],
                'metadata' => [
                    'address' => $user->location,
                    'email' => $user->email,
                    'stripe_account_id' => $user->stripe_account_id,
                    'store_name' => $user->store_name,
                    'location' => $user->location
                ],
                'capabilities' => [
                    'transfers' => ['requested' => true],
                ],
                'tos_acceptance' => ['service_agreement' => 'recipient'],
            ]);
            

            if ($stripe_acc) {
                $domain = env('APP_URL');

                $user->stripe_account_id = $stripe_acc->id;
                $user->save();

                $acc_link = \Stripe\AccountLink::create([
                    'account' => $stripe_acc->id,
                    'refresh_url' => $domain,
                    'return_url' => $domain . '/subscription_plan',
                    'type' => 'account_onboarding',
                ]);

                if ($acc_link) {
                    return redirect($acc_link->url);
                }
            }
        } catch (\Exception $e) {
            Log::error('Stripe account creation failed: ' . $e->getMessage());
            echo $e->getMessage();
        }
    }
}
