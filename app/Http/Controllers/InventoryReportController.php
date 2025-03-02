<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryReportController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function index(){
        $user = Auth::user();
        $products = \Stripe\Product::all(['type' => 'good']);
        $products = array_filter($products->data, function($product) use ($user){
            return $product->metadata->stripe_account == $user->stripe_account_id && $product->active == true;
        });
        $prices = \Stripe\Price::all();

        return view('ReportAnalytics.InventoryReports',compact('products', 'prices'));
    }
}
