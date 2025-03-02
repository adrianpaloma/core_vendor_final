<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS and other styling libraries -->
    <link rel="stylesheet" href="home/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="home/assets/vendor/fonts/circular-std/style.css">
    <link rel="stylesheet" href="home/assets/libs/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css">
    <title>Vendor Dashboard</title>
    <style>
        /* General Styles */
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

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 2rem;
            font-weight: bold;
        }

        .sales-analytics {
            height: 250px;
        }

        .trending-coffee img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .trending-coffee .coffee-item:hover img {
            transform: scale(1.1);
        }

        .coffee-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .price {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .recent-orders table {
            border-radius: 15px;
            overflow: hidden;
        }

        .recent-orders th,
        .recent-orders td {
            padding: 1rem;
        }

        /* Additional Styles for logos */
        .card-logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .card-body-content {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .card-body-content .card-title {
            margin-right: 15px;
        }

        /* Coffee Specials */
        .coffee-specials .card {
            background-color: #f1f1f1;
            border: 1px dashed #ccc;
            transition: background-color 0.3s ease;
        }

        .coffee-specials .card:hover {
            background-color: #f7e0b1;
        }

        .coffee-specials .card-body {
            text-align: center;
        }

        .feedback-card {
            background-color: #f8f9fa;
            border-left: 4px solid #4caf50;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        /* Additional Styling */
        .container-fluid {
            padding-top: 3rem;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
        }
    </style>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div class="dashboard-main-wrapper">
        @include('home.header')
        @include('home.sidenav')

        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">

                <!-- Overview Section -->
                <div class="row mb-4">
                    <!-- Total Orders Card -->
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-white" style="background: linear-gradient(145deg, #efcead, #9b6b43);">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-box"></i> Total Orders
                                </h5>
                                <p class="card-text" style="font-size: 2rem; font-weight: bold;">21,375</p>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="card-text text-warning">-2.33%</p>
                                <p class="card-text">Orders This Month: <strong>5,760</strong></p>
                            </div>
                        </div>
                    </div>
                
                    <!-- New Customers Card -->
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-white" style="background: linear-gradient(145deg, #efcead, #9b6b43);">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-users"></i> New Customers
                                </h5>
                                <p class="card-text" style="font-size: 2rem; font-weight: bold;">1,012</p>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="card-text text-success">+32.40%</p>
                                <p class="card-text">Active Customers: <strong>600</strong></p>
                            </div>
                        </div>
                    </div>
                
                    <!-- Total Sales Card -->
                    <div class="col-md-4 mb-4">
                        <div class="card text-center text-white" style="background: linear-gradient(145deg, #efcead, #9b6b43);">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-dollar-sign"></i> Total Sales
                                </h5>
                                <p class="card-text" style="font-size: 2rem; font-weight: bold;">₱24,254</p>
                                <div class="progress mb-2" style="height: 8px;">
                                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="card-text text-success">+25%</p>
                                <p class="card-text">Sales This Month: <strong>₱8,540</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                

                <!-- Sales Analytics Chart -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Sales Analytics</h5>
                                <!-- Canvas element for Chart.js -->
                                <canvas id="sales-analytics-chart" class="sales-analytics"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Trending Coffee Section -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Coffee Supplies for Your Shop</h5>
                                <div class="trending-coffee">
                                    <div class="coffee-item">
                                        <img src="https://www.coffeehit.co.uk/cdn/shop/articles/coffee-beans-101-the-4-most-popular-beans-explained.jpg?v=1708448895&width=1500" alt="Coffee Beans">
                                        <span>Coffee Beans</span>
                                        <spa    n class="price">₱45.00 (250 kg)</span>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                    <div class="coffee-item">
                                        <img src="https://www.frontrangefed.com/wp-content/uploads/2023/10/cold-brew-coffee-3.jpg" alt="Ground Coffee">
                                        <span>Ground Coffee</span>
                                        <span class="price">₱38.00 (300 kg)</span>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                    <div class="coffee-item">
                                        <img src="https://i5.walmartimages.com/asr/889a05f3-c88e-46a0-a920-fca005bbf45c.aa51acc2a1a312ee9ffc8094f7812324.jpeg?odnHeight=768&odnWidth=768&odnBg=FFFFFF" alt="Espresso Pods">
                                        <span>Espresso Pods</span>
                                        <span class="price">₱50.00 (200 kg)</span>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                    <div class="coffee-item">
                                        <img src="https://media.twgtea.com/images/default-source/product-images/loose-leaf-teas/4-5-2000x2500/t14_01.tmb-twg_rs450.webp?sfvrsn=a4496484_1" alt="Loose Leaf Tea">
                                        <span>Loose Leaf Tea</span>
                                        <span class="price">₱60.00 (150 kg)</span>
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coffee Specials -->
<div class="row mb-4 coffee-specials">
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">New Coffee Special</h5>
                <p class="card-text">Offer of the month: Buy 1 Get 1 Free on Coffee Beans!</p>
                <button class="btn btn-warning">Shop Now</button>
            </div>
        </div>
    </div>
    <!-- New Card 1 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Limited Time Offer</h5>
                <p class="card-text">20% off on Ground Coffee! Don't miss out.</p>
                <button class="btn btn-warning">Shop Now</button>
            </div>
        </div>
    </div>
    <!-- New Card 2 -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Special Discount</h5>
                <p class="card-text">Espresso Pods at a discounted price for a limited time.</p>
                <button class="btn btn-warning">Shop Now</button>
            </div>
        </div>
    </div>
</div>


                <!-- Recent Orders -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card recent-orders">
                            <div class="card-body">
                                <h5 class="card-title">Recent Orders</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Product</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12345</td>
                                            <td>Coffee Beans</td>
                                            <td>Shipped</td>
                                            <td>2024-11-22</td>
                                        </tr>
                                        <tr>
                                            <td>12346</td>
                                            <td>Espresso Pods</td>
                                            <td>Pending</td>
                                            <td>2024-11-23</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feedback Section -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card feedback-card">
                            <div class="card-body">
                                <h5 class="card-title">Feedback</h5>
                                <p>Thank you for being a valued supplier! Your feedback is important for improving our platform and services.</p>
                                <button class="btn btn-success">Provide Feedback</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS and other dependencies -->
    <script src="home/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- JavaScript for the Sales Analytics Chart -->
    <script>
        var ctx = document.getElementById('sales-analytics-chart').getContext('2d');
        var salesAnalyticsChart = new Chart(ctx, {
            type: 'line',  // Line chart
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],  // Monthly labels
                datasets: [{
                    label: 'Sales (₱)',
                    data: [2000, 2500, 2300, 2800, 3000, 3500, 4000],  // Example sales data
                    borderColor: '#4c3228',
                    backgroundColor: 'rgba(76, 50, 40, 0.2)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return '₱' + tooltipItem.raw.toFixed(2);
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Sales (₱)'
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>
