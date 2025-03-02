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
    <title>Vehicle Reservation</title>
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

                  
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0" style="color: white;">Vehicle Reservation</h5>
                    </div>
                    <div class="card-body">
                        
                        <form>
                            <div class="mb-3">
                                <p class="section-title">Order Information</p>
                                <label for="orderId" class="form-label">Select Order ID</label>
                                <select class="form-control" id="orderId" required>
                                    <option disabled selected>Choose an Order ID</option>
                                    @foreach ($orders as $order)
                                        <option value="{{ $order->id }}">{{ \Illuminate\Support\Str::limit($order->id, 20) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="mb-3">
                                <p class="section-title">Customer Information</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="customerName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="customerName" placeholder="Enter your name" required readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="customerEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="customerEmail" placeholder="Enter your email" required readonly>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="mb-3">
                                <p class="section-title">Vehicle Details</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="vehicleType" class="form-label">Select Vehicle</label>
                                        <select class="form-control" id="vehicleType" required>
                                            <option value="">Choose a vehicle</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="SUV">SUV</option>
                                            <option value="Truck">Truck</option>
                                            <option value="Van">Van</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="vehicleNumber" class="form-label">Vehicle Number</label>
                                        <input type="text" class="form-control" id="vehicleNumber" placeholder="Enter vehicle number" required>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="mb-3">
                                <p class="section-title">Reservation Schedule</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="reservationDate" class="form-label">Reservation Date</label>
                                        <input type="date" class="form-control" id="reservationDate" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="reservationTime" class="form-label">Time Slot</label>
                                        <select class="form-control" id="reservationTime" required>
                                            <option value="">Select Time Slot</option>
                                            <option value="08:00 AM">08:00 AM - 10:00 AM</option>
                                            <option value="10:00 AM">10:00 AM - 12:00 PM</option>
                                            <option value="01:00 PM">01:00 PM - 03:00 PM</option>
                                            <option value="03:00 PM">03:00 PM - 05:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Reserve Vehicle</button>
                        </form>
                        

                    </div>
                </div>
            </div>
        </div>

                </div>
            </div>
        </div>

        @include('home.footer')
    </div>

    <script src="home/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="home/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="home/assets/libs/js/main-js.js"></script>

    <script>
        $(document).ready(function() {
            $('#orderId').change(function() {
                var orderId = $(this).val();
                
                $.ajax({
                    url: '/CustomerInfo/' + orderId, 
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            $('#customerName').val(response.customer.name);
                            $('#customerEmail').val(response.customer.email);

                            $('#displayCustomerName').text(response.customer.name);
                            $('#displayCustomerEmail').text(response.customer.email);
                            $('#customerDetails').show();
                        }
                    }
                });

            });
        });
    </script>

</body>
</html>
