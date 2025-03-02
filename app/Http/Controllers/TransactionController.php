<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function index(){
        $user = Auth::user();

        $orders = \Stripe\Checkout\Session::all();
        $orders = array_filter($orders->data, function($item) use ($user){
            return $item->metadata->vendor_id == $user->stripe_account_id;
        });

        return view('PaymentProcessing.TransactionHistory', compact('orders'));
    }
}
