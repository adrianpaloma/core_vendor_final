<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscription_plan(){
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $plans = \Stripe\Product::all(
            [
                'type' => 'service'
            ]
        );

        $prices = \Stripe\Price::all();

        return view('subscription.vendor_plan', compact('plans', 'prices'));
    }

    public function subscribe(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $domain = env('APP_URL');
        $user = Auth::user();

        try {  
            if(empty($user->stripe_customer_id)){
                $customer = \Stripe\Customer::create(
                    [
                        'email' => $user->email,
                        'name' => $user->name,
                        // 'phone' => $user->phone,
                        // 'address' => $user->location,
                        'metadata' => [
                            'stripe_account' => $user->stripe_account_id
                        ]
                    ]
                );

                User::where('id', $user->id)->update(
                    [ 
                        'stripe_customer_id' => $customer->id
                    ]
                );
            }

            $checkoutSession = \Stripe\Checkout\Session::create(
                [
                    'customer' => $user->stripe_customer_id,
                    'line_items' => [
                        [
                            'price' => $request->price_id,
                            'quantity' => 1,
                        ],
                    ],
                    'metadata' => [
                        'stripe_account' => $user->stripe_account_id
                    ],
                    'mode' => 'subscription',
                    'success_url' => $domain . '/dashboard',
                    'cancel_url' => $domain,
                ]
            );

            if($checkoutSession){
                User::where('id', $user->id)->update(['is_subscriber' => true]);
            }
            
            return redirect($checkoutSession->url);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
