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
    <title>Sales Report</title>
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
        .sales-metrics {
            display: flex;
            justify-content: space-around;
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
            height: 300px;
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
                
                <!-- Sales Report Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" style="color: white;">Sales Report</h5>
                            </div>
                            <div class="card-body">
                                <!-- Filter Options -->
                                <div class="filter-section">
                                    <div>
                                        <label for="date-range">Date Range:</label>
                                        <input type="date" id="start-date"> to <input type="date" id="end-date">
                                    </div>
                                    <button class="btn btn-primary">Filter</button>
                                </div>

                                <!-- Sales Metrics -->
                                @php
                                    $total_sales = number_format(array_sum(array_column($orders, 'amount_total')) / 100, 2);
                                    $total_orders = count($orders);
                                    $avg_order_value = $total_orders > 0 ? number_format($total_sales / $total_orders, 2) : 0;

                                    $customer_ids = array_column($orders, 'customer');
                                    $unique_customers = array_unique($customer_ids);
                                    $customer_count = count($unique_customers);

                                    $customer_order_count = array_count_values($customer_ids);
                                    $returning_customers = count(array_filter($customer_order_count, function($count) {
                                        return $count > 1;
                                    }));

                                    $returning_customer_percentage = $customer_count > 0 ? number_format(($returning_customers / $customer_count) * 100, 2) : 0;
                                @endphp

                                <div class="sales-metrics">
                                    <div class="metrics-card">
                                        <h6>Total Sales</h6>
                                        <p class="font-weight-bold">₱{{ $total_sales }}</p>
                                    </div>
                                    <div class="metrics-card">
                                        <h6>Orders</h6>
                                        <p class="font-weight-bold">{{ $total_orders }}</p>
                                    </div>
                                    <div class="metrics-card">
                                        <h6>Customers</h6>
                                        <p class="font-weight-bold">{{ $customer_count }}</p>
                                    </div>
                                    <div class="metrics-card">
                                        <h6>Avg. Order Value</h6>
                                        <p class="font-weight-bold">₱{{ $avg_order_value }}</p>
                                    </div>
                                    <div class="metrics-card">
                                        <h6>Returning Customers</h6>
                                        <p class="font-weight-bold">{{ $returning_customer_percentage }}%</p>
                                    </div>
                                </div>


                                <!-- Sales Chart -->
                                <div class="chart-container">
                                    <!-- Example placeholder chart -->
                                    <canvas id="sales-analytics-chart"></canvas>
                                </div>

                                <!-- Sales Data Table -->
                                <table class="table table-hover mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            @php
                                                $customer = \Stripe\Customer::retrieve($order->customer);
                                            @endphp

                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($order->created)->format('M d, Y h:i A') }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($order->id, 20) }}</td>
                                                <td>{{ ucwords(strtolower($customer->name)) }}</td>
                                                <td>{{ number_format($order->amount_total / 100 , 2) }}</td>
                                                <td><span class="">{{ $order->metadata->order_status }}</span></td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>2024-11-11</td>
                                            <td>#00124</td>
                                            <td>Jane Smith</td>
                                            <td>₱240</td>
                                            <td><span class="badge badge-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>2024-11-12</td>
                                            <td>#00125</td>
                                            <td>Mark Wilson</td>
                                            <td>₱300</td>
                                            <td><span class="badge badge-success">Completed</span></td>
                                        </tr>
                                        <tr>
                                            <td>2024-11-13</td>
                                            <td>#00126</td>
                                            <td>Emily Johnson</td>
                                            <td>₱180</td>
                                            <td><span class="badge badge-success">Completed</span></td>
                                        </tr> --}}
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sales Report Section -->

            </div>
        </div>
    </div>

    @include('home.footer')
</div>

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
                }
            }

            $sales_json = json_encode(array_values($sales_by_month));

@endphp

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
