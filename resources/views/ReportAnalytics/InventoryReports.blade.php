<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="home/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="home/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="home/assets/libs/css/style.css">
    <link rel="stylesheet" href="home/assets/vendor/font-awesome/fontawesome.css">
    <link rel="stylesheet" href="home/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Inventory Report</title>
    <style>
            .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px;
        }
        .card-header {
            background-color: #744c24;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .inventory-metrics {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        .metrics-card {
            background-color: #f1f3f5;
            padding: 1rem;
            border-radius: 8px;
            width: 18%;
            text-align: center;
        }
        .chart-container {
            width: 100%;
            height: 350px;
        }
        .filter-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<div class="dashboard-main-wrapper">
    @include('home.header')
    @include('home.sidenav')

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                
                <!-- Coffee Inventory Report Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" style="color: white;">Inventory Reports</h5>
                            </div>
                            <div class="card-body">
                                <!-- Filter Options -->
                                
                                <div class="inventory-metrics">
                                    @php
                                        $out_of_stock = count(array_filter($products, function($item) {
                                            return $item->metadata->stock <= 0;
                                        }));
                                        
                                        $in_stock = count(array_filter($products, function($item) {
                                            return $item->metadata->stock > 15;
                                        }));
                                        
                                        $low_stock = count(array_filter($products, function($item) {
                                            return $item->metadata->stock <= 15 && $item->metadata->stock > 0;
                                        }));
                                        
                                        $total_sales = array_sum(array_map(function($item) use ($prices) {
                                            $product_price = collect($prices)->firstWhere('product', $item->id);
                                                return ($item->metadata->stock > 1 && $product_price) ? $product_price->unit_amount / 100 : 0;
                                        }, $products));

                                        $total_sales = number_format($total_sales, 2);
                                    @endphp

                                    <div class="metrics-card">
                                        <h6>Total Products</h6>
                                        <p class="font-weight-bold">{{ count($products) }}</p>
                                    </div>
                                    <div class="metrics-card">
                                        <h6>In Stock</h6>
                                        <p class="font-weight-bold">{{ $in_stock }}</p>
                                    </div>
                                    <div class="metrics-card">
                                        <h6>Out of Stock</h6>
                                        <p class="font-weight-bold">{{ $out_of_stock }}</p>
                                    </div>
                                    <div class="metrics-card">
                                        <h6>Low Stock</h6>
                                        <p class="font-weight-bold">{{ $low_stock }}</p>
                                    </div>
                                    <div class="metrics-card">
                                        <h6>Value of Stock</h6>
                                        <p class="font-weight-bold">₱{{ $total_sales }}</p>
                                    </div>
                                </div>

                                <!-- Coffee Stock Level Chart -->
                                <div class="chart-container">
                                    <!-- Updated chart -->
                                    <canvas id="coffeeChart"></canvas>
                                </div>

                                <!-- Coffee Inventory Data Table -->
                                <table class="table table-hover mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Stock Level</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            @php
                                                foreach ($prices as $item) {
                                                    if($item->product == $product->id){
                                                        $price = $item;
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->metadata->stock }}</td>
                                                <td>₱{{ number_format($price->unit_amount / 100, 2) }}</td>
                                                @if($product->metadata->stock == 0)
                                                    <td><span class="badge badge-danger">Out of Stock</span></td>
                                                @elseif($product->metadata->stock < 15)
                                                    <td><span class="badge badge-warning">Low Stock</span></td>
                                                @else
                                                    <td><span class="badge badge-success">In Stock</span></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>Robusta Ground</td>
                                            <td>Ground</td>
                                            <td>20</td>
                                            <td>₱120</td>
                                            <td><span class="badge badge-warning">Low Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>Instant Coffee Pack</td>
                                            <td>Instant</td>
                                            <td>0</td>
                                            <td>₱25</td>
                                            <td><span class="badge badge-danger">Out of Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>Espresso Beans</td>
                                            <td>Beans</td>
                                            <td>80</td>
                                            <td>₱350</td>
                                            <td><span class="badge badge-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>Decaf Ground</td>
                                            <td>Ground</td>
                                            <td>50</td>
                                            <td>₱200</td>
                                            <td><span class="badge badge-success">In Stock</span></td>
                                        </tr>
                                        <tr>
                                            <td>Cappuccino Instant</td>
                                            <td>Instant</td>
                                            <td>10</td>
                                            <td>₱60</td>
                                            <td><span class="badge badge-warning">Low Stock</span></td>
                                        </tr> --}}
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Coffee Inventory Report Section -->

            </div>
        </div>
    </div>

    @include('home.footer')
</div>

@php
    use Stripe\Product;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();

    $products = Product::all();
    $products = array_filter($products->data, function($item) use ($user) {
        return $item->type == 'good' && $item->metadata->stripe_account == $user->stripe_account_id;
    });

    $product_stock = [];
    foreach ($products as $product) {
        $product_stock[$product->id] = (int) ($product->metadata->stock ?? 0);
    }

    asort($product_stock); 
    $lowest_product_ids = array_slice($product_stock, 0, 5, true);

    $lowest_product = [];
    foreach ($lowest_product_ids as $product_id => $stock) {
        $product = Product::retrieve($product_id);

        $lowest_product[] = [
            'product_name' => $product->name,
            'product_stock' => $stock 
        ];
    }
@endphp

<script src="home/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('coffeeChart').getContext('2d');

        const productData = @json($lowest_product);

        const labels = productData.map(item => item.product_name);
        const data = productData.map(item => item.product_stock);

        const backgroundColors = data.map(stock => {
            if (stock === 0) return '#dc3545';
            if (stock > 0 && stock <= 15) return '#ffc107';
            return '#28a745';
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Stock Level',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: backgroundColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>

</body>
</html>
