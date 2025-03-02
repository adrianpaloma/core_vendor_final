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
    <title>Category Management</title>
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

        /* Primary Button */
        .btn-primary {
            background: linear-gradient(135deg, #6e4b3d, #9e5d3b);
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #9e5d3b, #6e4b3d);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        /* Outline Primary Button (Edit Button) */
        .btn-outline-primary {
            border: 2px solid #007bff;
            color: #007bff;
            background-color: transparent;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }

        /* Outline Danger Button (Delete Button) */
        .btn-outline-danger {
            border: 2px solid #dc3545;
            color: #dc3545;
            background-color: transparent;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        /* Modal Button Styles */
        .modal-footer .btn {
            border-radius: 20px;
            font-size: 16px;
        }

        /* Specific Hover for Action Buttons (Edit/Delete) */
        .table .btn-outline-primary:hover,
        .table .btn-outline-danger:hover {
            cursor: pointer;
            opacity: 0.85;
        }

        /* Input Fields Styling */
        .form-control {
            border-radius: 25px;
            padding: 12px 20px;
            font-size: 14px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Focus Effect for Input Fields */
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
        }

        /* Label Styling */
        .form-group label {
            font-weight: 600;
            color: #444;
            font-size: 15px;
        }

        /* Modal Close Button */
        .btn-close {
            color: white;
            background: transparent;
            border: none;
            font-size: 1.5rem;
        }

        /* Table Hover Effects */
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .modal-body .form-group label {
            font-weight: bold;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-content {
            border-radius: 10px;
        }

        .btn-close {
            color: white;
            background: transparent;
            border: none;
            font-size: 1.2rem;
        }

        .form-control {
            border-radius: 10px;
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

                    <!-- Start Category Management Section -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0" style="color: white;">Category Management</h5>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add New Category</button>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Category ID</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Example category rows -->
                                            <tr>
                                                <td>1</td>
                                                <td>Coffee Beans</td>
                                                <td>Various types of coffee beans.</td>
                                                <td>
                                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editCategoryModal">Edit</button>
                                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Espresso Machines</td>
                                                <td>Machines for making espresso drinks.</td>
                                                <td>
                                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editCategoryModal">Edit</button>
                                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                                </td>
                                            </tr>
                                            <!-- Add more categories as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Category Management Section -->

                    <!-- Add Category Modal -->
                    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="/categories/add" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="categoryName">Category Name</label>
                                            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="categoryDescription">Description</label>
                                            <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3"></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Add Category Modal -->

                    <!-- Edit Category Modal -->
                    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form action="/categories/edit" method="POST">
                                        @csrf
                                        <input type="hidden" id="editCategoryId" name="categoryId">
                                        <div class="form-group">
                                            <label for="editCategoryName">Category Name</label>
                                            <input type="text" class="form-control" id="editCategoryName" name="categoryName" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="editCategoryDescription">Description</label>
                                            <textarea class="form-control" id="editCategoryDescription" name="categoryDescription" rows="3"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Update Category</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Edit Category Modal -->

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
