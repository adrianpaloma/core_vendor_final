<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class InventoryController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function index(){
        $user = FacadesAuth::user();
        $products = \Stripe\Product::all();
        $products = array_filter($products->data, function($item) use ($user){
            return $item->metadata->stripe_account == $user->stripe_account_id && $item->metadata->status != 'Archieved';
        });

        return view('InventoryManagement.StocksControl', compact('products'));
    }

    public function update_stock(Request $request, $product_id){
        $request->validate([
            'stock' => 'required|integer',
        ]);

        try {
            \Stripe\Product::update(
            $product_id,
                [
                    'metadata' => [
                    'stock' => $request->stock,
                    'category' => $request->category,
                    ],
                ]
            );

            return redirect()->back()->with('success', 'Stock updated');
        } catch (\Exception $e) {
            echo $e->getMessage();
        } 
    }

    public function low_stock_alerts(){
        $user = FacadesAuth::user();
        $products = \Stripe\Product::all();
        $products = array_filter($products->data, function($item) use ($user){
            return $item->metadata->stripe_account == $user->stripe_account_id && $item->metadata->status != 'Archieved';
        });

        return view('InventoryManagement.LowStockAlerts', compact('products'));
    }
}
