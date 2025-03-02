<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor Subscription Plans</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .plans-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 40px 20px;
        }

        .card {
            width: 22rem;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            text-align: center;
            padding: 25px;
            border: 1px solid #ddd;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
        }

        .price {
            font-size: 1.4rem;
            font-weight: bold;
            color: #007bff;
        }

        .interval {
            font-size: 1rem;
            color: #666;
        }

        .card-button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease-in-out, transform 0.2s;
        }

        .card-button:hover {
            background: linear-gradient(135deg, #0056b3, #003d82);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Choose Your Subscription Plan</h2>
        <div class="plans-container">
            @foreach ($plans as $product)
                @php
                    $product_price = null;
                    foreach ($prices as $price) {
                        if ($price->product == $product->id && $price->active) {
                            $product_price = $price;
                            break;
                        }
                    }
                @endphp

                @if ($product_price)
                    <div class="card">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="price">{{ number_format($product_price->unit_amount / 100, 2) }} {{ strtoupper($product_price->currency) }}</p>
                        <p class="interval">per {{ $product_price->recurring['interval'] }}</p>
                        <p class="card-description">{{ \Illuminate\Support\Str::words($product->description, 30) }}</p>

                        <form action="{{ route('subscribe') }}" method="POST">
                            @csrf()
                            @method('POST')

                            <input type="hidden" value="{{ $product_price->id }}" name="price_id">
                            <button type="submit" class="card-button">Subscribe Now</button>
                        </form>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
