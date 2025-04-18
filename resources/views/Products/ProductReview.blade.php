<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="home/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="home/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="home/assets/libs/css/style.css">
    <link rel="stylesheet" href="home/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="css/txt.css">
    <!-- Use a more specific title -->
    <title>Product Reviews</title>
    <style>
        /* Styles from your Product List page */
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px; /* Keep margin consistent */
        }
        .card-header {
            background-color: #744c24; /* Or choose a different color for reviews if desired */
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        /* Button Styling from your Product List page */
        .btn {
            border-radius: 25px;
            padding: 8px 12px; /* Slightly smaller padding for action buttons */
            font-size: 13px; /* Slightly smaller font */
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Smaller shadow */
        }
        .btn-sm {
             padding: 5px 10px;
             font-size: 12px;
        }
        .btn-success { background-color: #2ecc71; border-color: #2ecc71; color: white; }
        .btn-success:hover { background-color: #27ae60; border-color: #27ae60; transform: translateY(-1px); }
        .btn-danger { background-color: #e74c3c; border-color: #e74c3c; color: white; }
        .btn-danger:hover { background-color: #c0392b; border-color: #c0392b; transform: translateY(-1px); }
        .btn-info { background-color: #3498db; border-color: #3498db; color: white; }
        .btn-info:hover { background-color: #2980b9; border-color: #2980b9; transform: translateY(-1px); }
        .btn i { margin-right: 4px; } /* Slightly less margin */

        /* --- Styles Specific to Product Reviews --- */
        .review-item {
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .review-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .review-header {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
        }
        .reviewer-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }
        .reviewer-info .name {
            font-weight: 600;
            margin-bottom: 0;
            font-size: 1rem;
        }
        .reviewer-info .date {
            color: #6c757d; /* Bootstrap's text-muted color */
            font-size: 0.85rem;
        }
        .review-rating .fa-star {
            color: #f39c12; /* Warning color for stars */
        }
        .review-rating .far.fa-star {
            color: #ccc; /* Lighter color for empty stars */
        }
        .review-content p {
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }
        .review-actions {
            text-align: right; /* Align buttons to the right */
            margin-top: 10px;
        }
        .review-actions .btn {
            margin-left: 5px; /* Space between action buttons */
        }

        /* Style for pending reviews (optional) */
        .review-item.pending {
             background-color: #fffbeb; /* Light yellow background */
             border-left: 3px solid #f39c12; /* Yellow left border */
             padding-left: 15px;
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

                <!-- ============================================================== -->
                <!-- Product Reviews Card -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header">
                        <!-- You might want to dynamically add the product name here -->
                        <h5 class="mb-0" style="color: white;">Product Reviews for [Product Name]</h5>
                    </div>
                    <div class="card-body">

                        {{-- Check if there are reviews to display --}}
                        {{-- @if ($reviews->count() > 0) --}}

                        {{-- Example Review 1 (Approved) --}}
                        <div class="review-item">
                            <div class="review-header">
                                <img src="{{ asset('home/assets/images/avatar-2.jpg') }}" alt="Reviewer Avatar" class="reviewer-avatar">
                                <div class="reviewer-info flex-grow-1">
                                    <p class="name">Jane Doe</p>
                                    {{-- Replace with actual review date --}}
                                    <span class="date">Reviewed on: January 15, 2024</span>
                                </div>
                                <div class="review-rating">
                                    {{-- Example: 4 Stars --}}
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa="star"></i>
                                    <i class="far fa-star"></i> {{-- Empty star --}}
                                </div>
                            </div>
                            <div class="review-content">
                                <h6>Excellent Quality!</h6>
                                <p>This product exceeded my expectations. The material is top-notch and it works perfectly. Highly recommended for anyone looking for quality.</p>
                            </div>
                            <div class="review-actions">
                                {{-- Add relevant actions for approved reviews --}}
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteReviewModal1">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                                {{-- Maybe a 'Feature' button? --}}
                                {{-- <button class="btn btn-info btn-sm">
                                    <i class="fas fa-thumbtack"></i> Feature
                                </button> --}}
                            </div>
                        </div>

                        {{-- Example Review 2 (Pending) --}}
                        <div class="review-item pending"> {{-- Add 'pending' class for visual cue --}}
                            <div class="review-header">
                                <img src="{{ asset('home/assets/images/avatar-3.jpg') }}" alt="Reviewer Avatar" class="reviewer-avatar">
                                <div class="reviewer-info flex-grow-1">
                                    <p class="name">John Smith</p>
                                     {{-- Replace with actual review date --}}
                                    <span class="date">Reviewed on: January 14, 2024</span>
                                </div>
                                <div class="review-rating">
                                     {{-- Example: 5 Stars --}}
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="review-content">
                                <h6>Amazing Product and Fast Shipping</h6>
                                <p>I'm really impressed. The product arrived faster than expected and was exactly as described. Five stars!</p>
                            </div>
                             <div class="review-actions">
                                {{-- Add relevant actions for pending reviews --}}
                                 <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approveReviewModal2">
                                    <i class="fas fa-check"></i> Approve
                                </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteReviewModal2">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>

                        {{-- Example Review 3 (Lower Rating) --}}
                        <div class="review-item">
                            <div class="review-header">
                                <img src="{{ asset('home/assets/images/avatar.png') }}" alt="Reviewer Avatar" class="reviewer-avatar"> {{-- Default Avatar --}}
                                <div class="reviewer-info flex-grow-1">
                                    <p class="name">Anonymous Reviewer</p>
                                     {{-- Replace with actual review date --}}
                                    <span class="date">Reviewed on: January 12, 2024</span>
                                </div>
                                <div class="review-rating">
                                     {{-- Example: 2 Stars --}}
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <div class="review-content">
                                <h6>Didn't meet expectations</h6>
                                <p>It's okay, but not what I was hoping for. The size was a bit off and the color wasn't exactly like the picture.</p>
                            </div>
                             <div class="review-actions">
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteReviewModal3">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>

                        {{-- Loop through actual reviews here using @foreach --}}
                        {{-- @foreach ($reviews as $review)
                            <div class="review-item {{ $review->status == 'pending' ? 'pending' : '' }}">
                                <div class="review-header">
                                    <img src="{{ $review->user->avatar ?? asset('home/assets/images/avatar.png') }}" alt="Reviewer Avatar" class="reviewer-avatar">
                                    <div class="reviewer-info flex-grow-1">
                                        <p class="name">{{ $review->user->name ?? 'Anonymous' }}</p>
                                        <span class="date">Reviewed on: {{ $review->created_at->format('F d, Y') }}</span>
                                    </div>
                                    <div class="review-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="{{ $i <= $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                        @endfor
                                    </div>
                                </div>
                                <div class="review-content">
                                     @if($review->title)
                                        <h6>{{ $review->title }}</h6>
                                     @endif
                                    <p>{{ $review->comment }}</p>
                                </div>
                                <div class="review-actions">
                                    @if($review->status == 'pending')
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#approveReviewModal{{ $review->id }}">
                                            <i class="fas fa-check"></i> Approve
                                        </button>
                                    @endif
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteReviewModal{{ $review->id }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </div>
                            </div>

                            <!-- Include Modals for Approve/Delete Actions for each review -->
                            @include('partials.modals.approve_review_modal', ['review' => $review])
                            @include('partials.modals.delete_review_modal', ['review' => $review])

                        @endforeach --}}

                        {{-- Else block for when there are no reviews --}}
                        {{-- @else
                            <p class="text-center text-muted mt-3">No reviews found for this product yet.</p>
                        @endif --}}


                         {{-- Pagination Links (if needed) --}}
                         {{-- <div class="mt-4 d-flex justify-content-center">
                            {{ $reviews->links() }}
                         </div> --}}

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Product Reviews Card -->
                <!-- ============================================================== -->

            </div>
        </div>
        {{-- Include Footer if you have one --}}
        {{-- @include('home.footer') --}}
    </div>
</div>

<!-- ============================================================== -->
<!-- Modals (Placeholders - You'll need to create these) -->
<!-- ============================================================== -->

<!-- Example Delete Modal (Adapt for Approve Modal) -->
<div class="modal fade" id="deleteReviewModal1" tabindex="-1" aria-labelledby="deleteReviewModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteReviewModalLabel1">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> {{-- Use data-bs-dismiss for Bootstrap 5 --}}
      </div>
      <div class="modal-body">
        Are you sure you want to delete this review? This action cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        {{-- Link this button to your delete route/action --}}
        <button type="button" class="btn btn-danger">Delete Review</button>
      </div>
    </div>
  </div>
</div>

{{-- Add similar modals for approve actions and for other review IDs --}}


<!-- ============================================================== -->
<!-- All Required Javascript Files -->
<!-- ============================================================== -->
<script src="home/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> {{-- Use bundle for Popper --}}
{{-- Include other necessary JS like sidenav scripts if any --}}
{{-- <script src="home/assets/libs/js/main-js.js"></script> --}}


<script>
    // Optional: Add any specific JS needed for the review page here
    // Example: Initialize tooltips if you use them
    // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    //   return new bootstrap.Tooltip(tooltipTriggerEl)
    // })
</script>

</body>
</html>