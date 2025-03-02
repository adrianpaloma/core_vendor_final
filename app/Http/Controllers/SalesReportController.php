<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class SalesReportController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function index(){
        $user = Auth::user();

        $orders = \Stripe\Checkout\Session::all();
        $orders = array_filter($orders->data, function($order) use ($user){
            return $order->metadata->vendor_id == $user->stripe_account_id && $order->status == 'complete';
        });
        
        return view('ReportAnalytics.SalesReport', compact('orders'));
    }
}
