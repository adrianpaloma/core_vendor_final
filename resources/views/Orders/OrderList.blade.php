<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="home/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="home/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="home/assets/libs/css/style.css">
    <link rel="stylesheet" href="home/assets/vendor/font-awesome/fontawesome.css">
    <link rel="stylesheet" href="home/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Order List</title>
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
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .badge {
            font-size: 0.9rem;
        }
        .status-icon {
            font-size: 1.1rem;
            vertical-align: middle;
            margin-right: 0.3rem;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        /* General Button Styling */
.btn {
    border-radius: 25px;
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

/* Approve Button Styling */
.btn-outline-success {
    border-color: #28a745;
    color: #28a745;
    background-color: transparent;
}

.btn-outline-success:hover {
    background-color: #28a745;
    color: white;
}

/* Reject Button Styling */
/* .btn-outline-danger {
    border-color: #dc3545;
    color: #dc3545;
    background-color: transparent;
} */

.btn-outline-danger:hover {
    background-color: #dc3545;
    color: white;
}

/* View Button Styling */
.btn-outline-primary {
    border-color: #007bff;
    color: #007bff;
    background-color: transparent;
}

.btn-outline-primary:hover {
    background-color: #007bff;
    color: white;
}

/* Button icon spacing */
.btn i {
    margin-right: 5px;
}

/* Table Button Spacing */
.table td .btn {
    margin-right: 5px;
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
                
                <!-- Start Order List Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" style="color: white;">Order List</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Total Amount</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ \Illuminate\Support\Str::limit($order->id, 20) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($order->created)->format('M d, Y h:i A') }}</td>
                                                <td>{{ number_format($order->amount_total / 100, 2) }}</td>
                                                <td>{{ $order->metadata->order_status }}</td>
                                                <td>
                                                    {{-- <a href="#" class="btn btn-outline-success btn-sm">Approve</a> --}}
                                                    {{-- <a href="#" class="btn btn-outline-danger btn-sm">Reject</a> --}}
                                                    <a href="{{ route('OrderDetails', $order->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- Example order rows -->
                                        {{-- <tr>
                                            <td>#12345</td>
                                            <td>PON001</td>
                                            <td>2024-11-12</td>
                                            <td>₱250</td>
                                            <td><span class="badge badge-warning"><i class="fa fa-clock status-icon"></i>Pending</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-success btn-sm">Approve</a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">Reject</a>
                                                <a href="{{route('OrderDetails')}}" class="btn btn-outline-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#12346</td>
                                            <td>PON002</td>
                                            <td>2024-11-13</td>
                                            <td>₱150</td>
                                            <td><span class="badge badge-warning"><i class="fa fa-clock status-icon"></i>Pending</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-success btn-sm">Approve</a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">Reject</a>
                                                <a href="{{route('OrderDetails')}}" class="btn btn-outline-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#12347</td>
                                            <td>PON003</td>
                                            <td>2024-11-14</td>
                                            <td>₱320</td>
                                            <td><span class="badge badge-warning"><i class="fa fa-clock status-icon"></i>Pending</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-success btn-sm">Approve</a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">Reject</a>
                                                <a href="{{route('OrderDetails')}}" class="btn btn-outline-primary btn-sm">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#12348</td>
                                            <td>PON004</td>
                                            <td>2024-11-15</td>
                                            <td>₱180</td>
                                            <td><span class="badge badge-warning"><i class="fa fa-clock status-icon"></i>Pending</span></td>
                                            <td>
                                                <a href="#" class="btn btn-outline-success btn-sm">Approve</a>
                                                <a href="#" class="btn btn-outline-danger btn-sm">Reject</a>
                                                <a href="{{route('OrderDetails')}}" class="btn btn-outline-primary btn-sm">View</a>
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Order List Section -->

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