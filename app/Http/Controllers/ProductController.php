<?php

namespace App\Http\Controllers;

use Exception;
use PDO;
use Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function index()
    {
        $user = Auth::user();
        $products = \Stripe\Product::all(
            ['type' => 'good']
        );
        $products = array_filter($products->data, function ($item) use ($user) {
            return $item->metadata->stripe_account == $user->stripe_account_id && $item->active == true;
        });

        $prices = \Stripe\Price::all();

        return view('Products.ProductList', compact('products', 'prices'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'stock' => 'required|integer|min:0',
            'description' => 'required',
            'productImage' => 'required|image|mimes:jpeg,png|max:2048',
            'variants' => 'array',
            'variants.*.color' => 'required_with:variants.*.size|nullable|string|max:255',
            'variants.*.size' => 'required_with:variants.*.color|nullable|string|max:255',
        ]);

        try {
            $product = \Stripe\Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'active' => true,
                'type' => 'good',
                'metadata' => [
                    'stock' => $request->stock,
                    'status' => 'Pending',
                    'category' => $request->category,
                    'stripe_account' => $user->stripe_account_id,
                    'variants' => json_encode($request->variants),
                ],
            ]);

            if ($request->hasFile('productImage')) {
                $file = $request->file('productImage');

                if (!$file->isValid()) {
                    return back()->with('error', 'Invalid file upload.');
                }

                $filePath = $file->getPathname();
                $fileMime = $file->getMimeType();

                $fileUpload = curl_file_create($filePath, $fileMime, $file->getClientOriginalName());

                $stripeFile = \Stripe\File::create([
                    'file' => $fileUpload,
                    'purpose' => 'product_image',
                ]);

                $link = \Stripe\FileLink::create([
                    'file' => $stripeFile->id,
                ]);

                \Stripe\Product::update($product->id, [
                    'images' => [$link->url],
                ]);
            }

            \Stripe\Price::create([
                'currency' => 'usd',
                'unit_amount' => $request->price * 100,
                'product' => $product->id,
                'metadata' => [
                    'stripe_account' => $user->stripe_account_id,
                ],
            ]);

            return redirect()->back()->with('success', 'Product added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $product_id)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'stock' => 'required|integer',
            'category' => 'required',
        ]);

        try {
            \Stripe\Product::update(
                $product_id,
                [
                    'name' => $request->name,
                    'description' => $request->desc,
                    'metadata' => [
                        'stock' => $request->stock,
                        'category' => $request->category,
                    ],
                ]
            );

            return redirect()->back()->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function destroy($product_id)
    {
        try {
            \Stripe\Product::update(
                $product_id,
                [
                    'active' => false,
                    'metadata' => [
                        'status' => 'Archived',
                    ],
                ]
            );

            return redirect()->back()->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
