<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class PayoutController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function index(){
        $user = Auth::user();
        $balance = \Stripe\Balance::retrieve(['stripe_account' => $user->stripe_account_id]);
    
        // Retrieve external accounts (bank accounts or debit cards) associated with the Stripe account
        $external_accounts = \Stripe\Account::allExternalAccounts($user->stripe_account_id);
    
        // Pass the external accounts and balance to the view
        return view('PaymentProcessing.PayoutRequest', compact('balance', 'external_accounts'));
    }
    
}
