<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="home/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="home/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="home/assets/libs/css/style.css">
    <link rel="stylesheet" href="home/assets/vendor/font-awesome/fontawesome.css">
    <link rel="stylesheet" href="home/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Transaction History</title>
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

        .transaction-table {
            margin-bottom: 0;
            border-collapse: collapse;
            width: 100%;
        }

        .transaction-table th, .transaction-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .transaction-table th {
            background-color: #f7f7f7;
            font-weight: 600;
        }

        .badge {
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
            border-radius: 30px;
        }

        .transaction-icon {
            font-size: 1.3rem;
            vertical-align: middle;
            margin-right: 0.5rem;
        }

        .transaction-amount {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .credit {
            color: #28a745;
        }

        .debit {
            color: #dc3545;
        }

        .action-btn {
            font-size: 0.85rem;
            padding: 0.5rem 1.25rem;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .action-btn:hover {
            background-color: #007bff;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        .card {
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .card-body {
            padding: 2rem;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .card-body .btn-outline-primary {
            border-radius: 30px;
            font-weight: 600;
        }

        .transaction-table td .btn {
            padding: 0.3rem 0.8rem;
        }
        
        /* Adding a focus effect to buttons */
        .action-btn:focus {
            box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.5);
            outline: none;
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
                
                <!-- Start Transaction History Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" style="color: white;">Transaction History</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover transaction-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example transaction rows -->
                                        @foreach ($orders as $order)
                                        @php
                                            $exchangeRate = 57.94; // Set your exchange rate (update as needed)
                                            $amountPHP = ($order->amount_total / 100) * $exchangeRate;
                                        @endphp
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($order->created)->setTimezone('Asia/Manila')->format('m/d/y h:i A') }}</td>
                                                <td>Order</td>
                                                <td><span class="badge badge-success">{{ $order->payment_status }}</span></td>
                                                <td class="transaction-amount debit">{{ number_format($amountPHP, 2) }}</td>
                                                <td>
                                                    <a href="{{ route('OrderDetails', $order->id) }}" class="btn btn-outline-primary btn-sm action-btn">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Transaction History Section -->

            </div>
        </div>
    </div>

    @include('home.footer')
</div>

<script src="home/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="home/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="home/assets/libs/js/main-js.js"></script>
</body>
</html>
