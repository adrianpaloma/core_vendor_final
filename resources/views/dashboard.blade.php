<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="home/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/assets/libs/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <title>Vendor Dashboard</title>
    <style>
        body {
            background-color: #f7f8fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .dashboard-metrics {
            display: flex;
            justify-content: space-between;
        }
        .sales-analytics {
            height: 250px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="dashboard-main-wrapper">
        @include('home.header')
        @include('home.sidenav')

        @php
            use Stripe\Checkout\Session;
            use Illuminate\Support\Facades\Auth;

            $user = Auth::user();

            $sales_by_month = [
                'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0,
                'Jul' => 0, 'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0
            ];

            $product_sales = [];

            foreach ($orders as $order) {
                if ($order->payment_status == 'paid' && 
                    $order->mode == 'payment' && 
                    isset($order->metadata->vendor_id) && 
                    $order->metadata->vendor_id == $user->stripe_account_id) {
                    
                    $month = date('M', $order->created);
                    $sales_by_month[$month] += $order->amount_total / 100;

                    $order_items = $order->allLineItems($order->id);

                    foreach ($order_items as $item) {
                        $product_id = $item->price->product;
                        $unit_amount = $item->price->unit_amount;
                        $total_amount = $unit_amount * $item->quantity;

                        if (!isset($product_sales[$product_id])) {
                            $product_sales[$product_id] = 0;
                        }
                        $product_sales[$product_id] += $total_amount / 100;
                    }
                }
            }

            arsort($product_sales);
            $top_products_ids = array_slice($product_sales, 0, 3, true);

            $top_products = [];

            foreach ($top_products_ids as $product_id => $sales) { 
                $product = \Stripe\Product::retrieve($product_id);
                
                $top_products[] = [
                    'product_name' => $product->name,
                    'product_sales' => $sales 
                ];
            }

            $sales_json = json_encode(array_values($sales_by_month));
        @endphp

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row mb-4 dashboard-metrics">
                    <div class="col-md-4">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-box"></i> Total Products</h5>
                                <p class="card-text">{{ count($products) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Total Orders</h5>
                                <p class="card-text">{{ count($orders) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-hand-holding-usd"></i> Total Revenue</h5>
                                <p class="card-text">{{ number_format($balance->available[0]->amount + $balance->pending[0]->amount / 100, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Sales Analytics</h5>
                                <canvas id="sales-analytics-chart" class="sales-analytics"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Top Selling Products</h5>
                                <ul>
                                    @foreach ($top_products as $product)
                                        <li>{{ $product['product_name'] }} - {{ $product['product_sales'] }} Sales</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Recent Orders</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            @php
                                                $customer = \Stripe\Customer::retrieve($order->customer);
                                            @endphp
                                            <tr>
                                                <td>{{ \Illuminate\Support\Str::limit($order->id, 20) }}</td>
                                                <td>{{ ucwords(strtolower($customer->name)) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($order->created)->format('M d, Y h:i A') }}</td>
                                                <td><span>{{ $order->metadata->order_status }}</span></td>
                                                <td>${{ number_format($order->amount_total / 100, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="home/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('sales-analytics-chart').getContext('2d');
        var salesData = {!! $sales_json !!};
    
        var salesAnalyticsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales ($)',
                    data: salesData,
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: { title: { display: true, text: 'Month' } },
                    y: { title: { display: true, text: 'Sales ($)' } }
                }
            }
        });
    </script>

</body>

</html>