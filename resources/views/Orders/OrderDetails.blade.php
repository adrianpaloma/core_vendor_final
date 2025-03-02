<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('home/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('home/assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">  
    <link rel="stylesheet" href="{{ asset('home/assets/vendor/charts/chartist-bundle/chartist.css') }}">
    <title>Order Details</title>
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
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #495057;
            border-left: 3px solid #efcead;
            padding-left: 10px;
            margin-top: 15px;
        }
        .list-unstyled li {
            margin-bottom: 8px;
        }
        .badge-success {
            background-color: #28a745;
            color: white;
            font-size: 0.9rem;
        }
        .table {
            background-color: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
        }
        .table th {
            background-color: #bb9351;
            color: white;
            font-weight: 600;
            text-align: center;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        .table td, .table th {
            vertical-align: middle;
            text-align: center;
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

                    <!-- Order Details Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0" style="color: white;">Order Details</h5>
                                </div>
                                <div class="card-body">
                                    
                                    <!-- Customer Info -->
                                    <div class="mb-4">
                                        <p class="section-title">Customer Information</p>
                                        <ul class="list-unstyled">
                                            <li><strong>Name:</strong>{{ ucwords(strtolower($customer->name)) }}</li>
                                            <li><strong>Email:</strong>{{ $customer->email }}</li>
                                            <li><strong>Phone:</strong>{{ $customer->phone }}</li>
                                            <li><strong>Address:</strong>{{ $customer->address }}</li>
                                        </ul>
                                    </div>

                                    <!-- Order Summary -->
                                    <div class="mb-4">
                                        <p class="section-title">Order Summary</p>
                                        <ul class="list-unstyled">
                                            <li><strong>Order Date:</strong>{{ \Carbon\Carbon::parse($order->created)->format('M d, Y h:i A') }}</li>
                                            <li><strong>Status:</strong> <span class="badge badge-success">{{ $order->metadata->order_status }}</span></li>
                                            <li><strong>Payment Method:</strong>{{ $order->payment }}</li>
                                            <li><strong>Total Amount:</strong>{{ number_format($order->amount_total / 100, 2) }}</li>
                                        </ul>
                                    </div>

                                    <!-- Ordered Items -->
                                    <div class="mb-4">
                                        <p class="section-title">Ordered Items</p>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Price</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tbody>
                                                    @foreach ($order_items as $item)
                                                        <tr>
                                                            <td>{{ $item->description }}</td>
                                                            <td>{{ $item->quantity }}</td> <!-- Display the quantity here -->
                                                            <td>{{ number_format($item->amount_subtotal / 100, 2) }}</td>
                                                            <td>{{ number_format($item->amount_total / 100, 2) }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3" class="text-right"><strong>Total</strong></td>
                                                        <td><strong>₱{{ number_format(collect($order_items)->sum(function($item) { return $item->amount_total; }) / 100, 2) }}</strong></td>
                                                    </tr>
                                                </tbody>                                                
                                            </tbody>                                            
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Order Details Section -->

                </div>
            </div>
        </div>

        @include('home.footer')
    </div>

    <script src="{{ asset('home/assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('home/assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('home/assets/libs/js/main-js.js') }}"></script>
</body>
</html>
