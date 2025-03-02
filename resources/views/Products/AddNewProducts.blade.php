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
    <title>Add New Product</title>
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
        .form-control {
            font-size: 0.9rem;
        }
        .btn-primary, .btn-secondary {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }
        .form-group img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
        .form-group .input-group {
            width: 100%;
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

                @if(session()->has('success') || session('error'))
                    <div class="alert {{ session()->has('success') ? 'alert-success' : 'alert-warning' }}">
                        {{ session('success') }} {{ session('warning') }}
                    </div>
                @endif
                <!-- Start Add New Product Section -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0" style="color: white;">Add New Products</h5>
                            </div>
                            
                            <div class="card-body">
                                <form action="{{ route('product_store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="productName">Product Name</label>
                                        <input type="text" class="form-control" id="productName" name="name" placeholder="Enter product name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="productDescription">Description</label>
                                        <textarea class="form-control" id="productDescription" name="description" rows="4" placeholder="Enter product description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="category">
                                            <option value="Technology">Technology</option>
                                            <option value="Fashion">Fashion</option>
                                            <option value="Beauty & Personal Care">Beauty & Personal Care</option>
                                            <option value="Home & Furniture">Home & Furniture</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price ($)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter product price" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Stock Quantity</label>
                                        <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="productImage">Upload Image</label>
                                        <input type="file" class="form-control-file" id="productImage" name="productImage" accept="image/*" onchange="previewImage(event)">
                                        <img id="imagePreview" class="mt-3" src="#" alt="Image Preview" style="display: none;">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Add Product</button>
                                    </div>
                                    <div class="form-group">
                                        <a href="/products" class="btn btn-secondary btn-block">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Add New Product Section -->

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
    function previewImage(event) {
        const output = document.getElementById('imagePreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            output.style.display = 'block';
            output.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>

</body>
</html>
