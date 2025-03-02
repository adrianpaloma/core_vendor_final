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
    <title>Manage Suppliers</title>
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
        .card-body {
            padding: 1.5rem;
        }
        .supplier-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .supplier-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }
        /* Enhanced Button Styles */
        .btn-primary, .btn-secondary {
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6e4b3d, #9e5d3b);
            color: #fff;
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #9e5d3b, #6e4b3d);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-outline-primary, .btn-outline-secondary {
            border-radius: 30px;
            font-size: 0.9rem;
            padding: 0.75rem 1.25rem;
            border: 2px solid transparent;
            color: #5e5e5e;
            transition: all 0.3s ease;
        }
        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
            box-shadow: 0px 5px 15px rgba(0, 123, 255, 0.1);
        }
        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
            border-color: #6c757d;
            box-shadow: 0px 5px 15px rgba(108, 117, 125, 0.1);
        }
        .badge-status {
            font-size: 0.9rem;
            padding: 0.4rem 0.8rem;
        }
        .modal-content {
            border-radius: 8px;
        }
        .form-control {
            border-radius: 30px;
        }
        .modal-footer .btn {
            border-radius: 30px;
        }
        .card-title {
            font-weight: 600;
        }
        .card-text {
            font-size: 0.9rem;
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
                
                <!-- Start Manage Suppliers Section -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0" style="color: white;">Manage Suppliers</h5>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addSupplierModal">Add New Supplier</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Example Supplier Cards -->
                                    <div class="col-md-4">
                                        <div class="card supplier-card mb-4">
                                            <div class="card-body">
                                                <h6 class="card-title">Acme Coffee Supplies</h6>
                                                <p class="mb-2"><strong>Contact:</strong> John Doe</p>
                                                <p class="mb-2"><strong>Email:</strong> john@acmesupplies.com</p>
                                                <p class="mb-2"><strong>Status:</strong> 
                                                    <span class="badge badge-success badge-status">Active</span>
                                                </p>
                                                <div class="d-flex justify-content-between mt-3">
                                                    <a href="#" class="btn btn-outline-primary btn-sm">View</a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card supplier-card mb-4">
                                            <div class="card-body">
                                                <h6 class="card-title">Global Coffee Traders</h6>
                                                <p class="mb-2"><strong>Contact:</strong> Sarah Lee</p>
                                                <p class="mb-2"><strong>Email:</strong> sarah@globalcoffee.com</p>
                                                <p class="mb-2"><strong>Status:</strong> 
                                                    <span class="badge badge-warning badge-status">Pending</span>
                                                </p>
                                                <div class="d-flex justify-content-between mt-3">
                                                    <a href="#" class="btn btn-outline-primary btn-sm">View</a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Additional suppliers can be added similarly -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Manage Suppliers Section -->

                <!-- Add Supplier Modal -->
                <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSupplierModalLabel">Add New Supplier</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/suppliers/add" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="supplierName">Supplier Name</label>
                                        <input type="text" class="form-control" id="supplierName" name="supplierName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="contactName">Contact Name</label>
                                        <input type="text" class="form-control" id="contactName" name="contactName">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Add Supplier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Add Supplier Modal -->

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
