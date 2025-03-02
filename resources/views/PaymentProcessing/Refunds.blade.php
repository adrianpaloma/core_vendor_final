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
    <title>Refunds</title>
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

        .refund-table {
            margin-bottom: 0;
            border-collapse: collapse;
            width: 100%;
        }

        .refund-table th, .refund-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        .refund-table th {
            background-color: #f7f7f7;
            font-weight: 600;
        }

        .badge {
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
            border-radius: 30px;
        }

        .refund-icon {
            font-size: 1.2rem;
            vertical-align: middle;
            margin-right: 0.3rem;
        }

        .refund-amount {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .approved {
            color: #28a745;
        }

        .rejected {
            color: #dc3545;
        }

        .processing {
            color: #ffc107;
        }

        .action-btn {
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            font-weight: 600;
        }

        .action-btn:hover {
            background-color: #f1f1f1;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }

        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }

        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
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

        .table-responsive {
            overflow-x: auto;
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
                
                <!-- Start Refunds Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" style="color: white;">Refunds</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover refund-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Refund ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Request Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Refund Amount</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Example refund rows -->
                                            <tr>
                                                <td>#RF12345</td>
                                                <td>John Doe</td>
                                                <td>2024-11-12</td>
                                                <td><span class="badge badge-success"><i class="fa fa-check-circle refund-icon approved"></i>Approved</span></td>
                                                <td class="refund-amount approved">₱250</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-primary btn-sm action-btn">View</a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm action-btn">Process</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RF12346</td>
                                                <td>Jane Smith</td>
                                                <td>2024-11-13</td>
                                                <td><span class="badge badge-warning"><i class="fa fa-clock refund-icon processing"></i>Processing</span></td>
                                                <td class="refund-amount processing">₱150</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-primary btn-sm action-btn">View</a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm action-btn">Process</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RF12347</td>
                                                <td>Mike Johnson</td>
                                                <td>2024-11-14</td>
                                                <td><span class="badge badge-danger"><i class="fa fa-times-circle refund-icon rejected"></i>Rejected</span></td>
                                                <td class="refund-amount rejected">₱320</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-primary btn-sm action-btn">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#RF12348</td>
                                                <td>Sarah Lee</td>
                                                <td>2024-11-15</td>
                                                <td><span class="badge badge-info"><i class="fa fa-cog refund-icon processing"></i>In Review</span></td>
                                                <td class="refund-amount">₱180</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-primary btn-sm action-btn">View</a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm action-btn">Process</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Refunds Section -->

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
