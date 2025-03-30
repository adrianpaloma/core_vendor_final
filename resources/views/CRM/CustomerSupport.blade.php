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
    <title>CRM</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        /* Card Styling with Borders */
        .crm-card {
            border: 2px solid #dee2e6; /* Added border */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .crm-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
            border-color: #007bff; /* Highlight border on hover */
        }

        /* Icon Circle */
        .icon-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            margin-right: 15px;
        }

        .icon-blue {
            background-color: #007bff;
        }

        /* Button Styling */
        .btn-reply {
            background-color: #28a745;
            color: white;
            border-radius: 20px;
            transition: background-color 0.2s ease;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid #28a745;
        }

        .btn-reply:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-send {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            transition: background-color 0.2s ease;
            padding: 8px 20px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid #007bff;
        }

        .btn-send:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Border for textarea */
        textarea.form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            transition: border-color 0.2s ease;
        }

        textarea.form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="dashboard-main-wrapper">
        @include('home.header')
        @include('home.sidenav')

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h2 class="mb-4 text-center">Client Messages</h2>

                        <!-- Example of a single client message -->
                        <div class="card crm-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle icon-blue">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0">John Doe</h5>
                                        <small class="text-muted">john.doe@example.com</small>
                                    </div>
                                </div>
                                <p class="mb-3">
                                    <strong>Message:</strong>  
                                    <span class="d-block mt-1">
                                        I need help with my recent order. It hasn’t arrived yet.
                                    </span>
                                </p>

                                <!-- Reply Section -->
                                <form>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="3" placeholder="Type your reply here..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-reply">Send Reply</button>
                                </form>
                            </div>
                        </div>
                        <!-- End of Single Message -->

                        <!-- Repeat this block for more messages -->
                        <div class="card crm-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle icon-blue">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-0">Jane Smith</h5>
                                        <small class="text-muted">jane.smith@example.com</small>
                                    </div>
                                </div>
                                <p class="mb-3">
                                    <strong>Message:</strong>  
                                    <span class="d-block mt-1">
                                        How do I change my account details?
                                    </span>
                                </p>

                                <!-- Reply Section -->
                                <form>
                                    <div class="mb-3">
                                        <textarea class="form-control" rows="3" placeholder="Type your reply here..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-reply">Send Reply</button>
                                </form>
                            </div>
                        </div>
                        <!-- End of Single Message -->

                    </div>
                </div>
            </div>
        </div>

        @include('home.footer')
    </div>

    <script src="home/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
