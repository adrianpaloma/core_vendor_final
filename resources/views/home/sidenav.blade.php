<div class="nav-left-sidebar" style="background-color: #463426;">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        <p style="color:white;">Menu</p>
                    </li>
                    
                    <!-- Dashboard Section -->
                    <li class="nav-item">
                        <a class="nav-link" href={{route('dashboard')}}>
                            <i class="fa fa-tachometer-alt" style="color:white"></i>
                            <p style="color:white;">Dashboard</p>
                        </a>
                    </li>
                    
                    <!-- Orders Section -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-orders" aria-controls="submenu-orders">
                            <i class="fa fa-shopping-basket" style="color:white"></i>
                            <p style="color:white;">Orders</p>
                        </a>
                        <div id="submenu-orders" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('OrderList')}}">Order List</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{route('ManageReturns')}}">Manage Returns</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('VehicleReservation')}}">Vehicle Reservation</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Products Section -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-products" aria-controls="submenu-products">
                            <i class="fa fa-box" style="color:white"></i>
                            <p style="color:white;">Products</p>
                        </a>
                        <div id="submenu-products" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('ProductList')}}">Product List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('AddNewProducts')}}">Add New Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('ProductReview')}}">Product Review</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Inventory Management Section -->
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-inventory" aria-controls="submenu-inventory">
                            <i class="fa fa-warehouse" style="color:white"></i>
                            <p style="color:white;">Inventory Management</p>
                        </a>
                        <div id="submenu-inventory" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('StocksControl')}}">Stock Control</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('LowStockAlerts')}}">Low Stock Alerts</a>
                                </li>
                            </ul>
                        </div>
                    </li> 

                    <!-- Payment Processing Section -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-payment" aria-controls="submenu-payment">
                            <i class="fa fa-credit-card" style="color:white"></i>
                            <p style="color:white;">Payment Processing</p>
                        </a>
                        <div id="submenu-payment" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('TransactionHistory')}}">Transaction History</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{route('Refunds')}}">Refunds</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('PayoutRequest')}}">Payout Request</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Report Analytics Section -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-reports" aria-controls="submenu-reports">
                            <i class="fa fa-chart-line" style="color:white"></i>
                            <p style="color:white;">Report Analytics</p>
                        </a>
                        <div id="submenu-reports" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('SalesReport')}}">Sales Reports</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="InventoryReports">Inventory Reports</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- CRM Section -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-crm" aria-controls="submenu-crm">
                            <i class="fa fa-users" style="color:white"></i>
                            <p style="color:white;">CRM</p>
                        </a>
                        <div id="submenu-crm" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('CustomerSupport')}}">Customer Support</a>
                            </ul>
                        </div>
                    </li> 
                </ul>
            </div>
        </nav>
    </div>
</div>