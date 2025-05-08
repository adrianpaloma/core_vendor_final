<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="home/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="home/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="home/assets/libs/css/style.css">
    <link rel="stylesheet" href="home/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="css/txt.css"> <!-- Your custom styles -->
    <title>Product Reviews</title>
    <style>
        /* --- Styles from your Original Template (Adapted for Table) --- */
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 30px;
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
        /* Button Styling */
        .btn {
            border-radius: 25px;
            padding: 8px 12px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn-sm {
             padding: 5px 10px;
             font-size: 12px;
        }
        .btn-success { background-color: #2ecc71; border-color: #2ecc71; color: white; }
        .btn-success:hover { background-color: #27ae60; border-color: #27ae60; transform: translateY(-1px); }
        .btn-info { background-color: #3498db; border-color: #3498db; color: white; }
        .btn-info:hover { background-color: #2980b9; border-color: #2980b9; transform: translateY(-1px); }
        .btn-secondary { background-color: #6c757d; border-color: #6c757d; color: white; }
        .btn-secondary:hover { background-color: #5a6268; border-color: #5a6268; transform: translateY(-1px); }
        .btn i { margin-right: 4px; }

        /* --- Table Specific Styles --- */
        .table th {
            font-weight: 600;
            font-size: 0.9rem;
            color: #495057;
            vertical-align: middle;
            border-bottom-width: 2px; /* Stronger header border */
        }
        .table td {
            vertical-align: middle; /* Align content vertically */
            font-size: 0.9rem;
            padding: 0.75rem; /* Standard padding */
        }
        .table tbody tr:last-child td {
             /* border-bottom: none;  Might look weird with reply rows */
        }

        /* --- Reviewer Cell Content --- */
        .reviewer-cell {
            display: flex;
            align-items: center;
        }
        .reviewer-avatar {
            width: 40px; /* Slightly smaller for table */
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            flex-shrink: 0;
        }
        .reviewer-info .name {
            font-weight: 600;
            margin-bottom: 0;
            font-size: 0.95rem;
            display: block; /* Ensure name takes full width */
        }
        .reviewer-info .date {
            color: #6c757d;
            font-size: 0.8rem;
        }

        /* --- Rating Cell --- */
        .review-rating .fa-star { color: #f39c12; }
        .review-rating .far.fa-star { color: #ccc; }
        .review-rating { font-size: 0.9rem; }

        /* --- Review Comment Cell --- */
        .review-comment h6 {
            font-weight: bold;
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
        }
        .review-comment p {
            margin-bottom: 0;
            line-height: 1.5;
            font-size: 0.9rem;
            color: #555;
        }

        /* --- Pending Review Row Style --- */
         /* Apply to the <tr> element */
        .pending-row {
             background-color: #fffbeb !important; /* Light yellow background */
        }
        .pending-row td {
            border-left: 3px solid #f39c12; /* Yellow left border on first cell */
        }
         .pending-row td:first-child {
            border-left: 3px solid #f39c12; /* Yellow left border on first cell */
        }
         .pending-row td:not(:first-child) {
            border-left: none;
         }


        /* --- Reply Row & Content --- */
        .reply-section {
            display: none; /* Hidden by default, toggled by JS */
        }
        .reply-section td {
            padding: 1rem 1.5rem !important; /* More padding for the reply area */
            background-color: #f8f9fa; /* Slightly different background */
            border-top: 1px dashed #ccc !important; /* Separator */
        }
        .existing-reply {
            /* Styles from previous version are mostly fine */
            background-color: #eef; /* Slightly different background for distinction */
            border: 1px solid #d6d6e0;
            padding: 10px 15px;
            margin-bottom: 15px; /* Space before reply form */
            border-radius: 8px;
            font-size: 0.9rem;
        }
        .reply-form-container {
            /* Styles from previous version are mostly fine */
            padding: 15px;
            border: 1px dashed #ccc;
            border-radius: 8px;
            background-color: #fff;
        }
        .reply-form-container textarea {
            resize: vertical;
            min-height: 70px; /* Smaller textarea */
            font-size: 0.9rem;
        }
        .reply-form-container .btn {
            margin-top: 10px;
            margin-right: 5px;
        }
        .text-right {
             text-align: right;
        }

    </style>
</head>
<body>

    <div class="dashboard-main-wrapper">
        @include('home.header')
        @include('home.sidenav')
    
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content py-3">
    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Product Reviews</h2>
                            </div>
                        </div>
                    </div>
    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0" style="color: white;">Product Reviews</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Reviewer</th>
                                            <th>Rating</th>
                                            <th>Review</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            @php
                                                $product = collect($products)->firstWhere('id', $review->product_id);
                                                $productName = $product ? $product->name : 'Unknown Product';
                                            @endphp
                                            <tr>
                                                <td>{{ $productName }}</td>
                                                <td>
                                                    <div class="reviewer-cell">
                                                        <img src="{{ asset('home/assets/images/avatar-placeholder.png') }}" alt="Reviewer Avatar" class="reviewer-avatar" width="40">
                                                        <div class="reviewer-info">
                                                            <span class="name">{{ $review->name ?? 'Anonymous' }}</span>
                                                            <span class="date">{{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="review-rating">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                                        @endfor
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="review-comment">
                                                        <p>{{ $review->comment }}</p>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <button class="btn btn-info btn-sm reply-button" data-review-id="{{ $review->id }}">
                                                        <i class="fas fa-reply"></i> Reply
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="reply-section d-none" id="reply-section-{{ $review->id }}">
                                                <td colspan="5">
                                                    <div class="reply-form-container">
                                                        <form method="POST" action="#">
                                                            @csrf
                                                            <div class="form-group mb-2">
                                                                <label for="reply-text-{{ $review->id }}" class="sr-only">Your Reply</label>
                                                                <textarea class="form-control" id="reply-text-{{ $review->id }}" name="reply_content" rows="3" placeholder="Enter your reply here..." required></textarea>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Submit Reply</button>
                                                                <button type="button" class="btn btn-secondary btn-sm cancel-reply-button" data-review-id="{{ $review->id }}"><i class="fas fa-times"></i> Cancel</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</body>
</html>