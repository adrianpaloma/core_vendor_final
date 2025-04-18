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
    <title>Customer Support Tickets</title>
    <style>
        /* --- Styles from your Original Template (Core) --- */
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 20px;
            margin-bottom: 30px;
            border: none;
        }
        .card-header {
            background-color: #744c24; /* Original Header Color */
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
         .card-body {
             padding: 1.25rem;
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
        .btn-xs {
             padding: 3px 8px;
             font-size: 11px;
             border-radius: 15px;
        }
        .btn-success { background-color: #2ecc71; border-color: #2ecc71; color: white; }
        .btn-success:hover { background-color: #27ae60; border-color: #27ae60; transform: translateY(-1px); }
        .btn-info { background-color: #3498db; border-color: #3498db; color: white; }
        .btn-info:hover { background-color: #2980b9; border-color: #2980b9; transform: translateY(-1px); }
        .btn-warning { background-color: #f39c12; border-color: #f39c12; color: white; }
        .btn-warning:hover { background-color: #e67e22; border-color: #d35400; transform: translateY(-1px); }
        .btn-danger { background-color: #e74c3c; border-color: #e74c3c; color: white; }
        .btn-danger:hover { background-color: #c0392b; border-color: #c0392b; transform: translateY(-1px); }
        .btn-secondary { background-color: #6c757d; border-color: #6c757d; color: white; }
        .btn-secondary:hover { background-color: #5a6268; border-color: #5a6268; transform: translateY(-1px); }
        .btn i { margin-right: 4px; }

        /* --- Table Styles --- */
        .table th {
            font-weight: 600;
            font-size: 0.85rem;
            color: #495057;
            vertical-align: middle;
            border-bottom-width: 2px;
            white-space: nowrap;
        }
        .table td {
            vertical-align: middle;
            font-size: 0.9rem;
            padding: 0.75rem;
            color: #555;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa; /* Slightly different hover */
        }

        /* --- Customer Cell --- */
        .customer-cell {
            display: flex;
            align-items: center;
        }
        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            flex-shrink: 0;
        }
        .customer-info .name {
            font-weight: 600;
            margin-bottom: 0;
            font-size: 0.95rem;
            color: #333;
            display: block;
        }
        .customer-info .sub-text { /* For email or company */
            color: #6c757d;
            font-size: 0.8rem;
        }

        /* --- Badges for Status/Priority --- */
        .badge {
            font-size: 75%;
            font-weight: 600; /* Bold badges */
            padding: 0.35em 0.6em; /* Slightly more padding */
            border-radius: 10rem; /* Pill shape */
        }
        .badge-status-open { background-color: #e74c3c; color: white; } /* Red */
        .badge-status-pending { background-color: #f39c12; color: white; } /* Orange */
        .badge-status-replied { background-color: #3498db; color: white; } /* Blue */
        .badge-status-resolved { background-color: #2ecc71; color: white; } /* Green */
        .badge-status-closed { background-color: #6c757d; color: white; } /* Gray */

        .badge-priority-high { border: 1px solid #e74c3c; color: #e74c3c; background-color: transparent; }
        .badge-priority-medium { border: 1px solid #f39c12; color: #f39c12; background-color: transparent; }
        .badge-priority-low { border: 1px solid #6c757d; color: #6c757d; background-color: transparent; }

        /* --- Ticket Details/Reply Row --- */
        .ticket-details-section {
            display: none; /* Hidden by default */
        }
        .ticket-details-section td {
            padding: 1.5rem 1.5rem !important; /* More padding */
            background-color: #f8f9fa;
            border-top: 2px dashed #dee2e6 !important; /* Stronger dashed separator */
        }
        .customer-message, .reply-history, .reply-form-container {
            margin-bottom: 1.5rem;
        }
         .customer-message:last-child, .reply-history:last-child, .reply-form-container:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-weight: 600;
            font-size: 1rem;
            color: #744c24; /* Match header */
            margin-bottom: 0.75rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e0e0e0;
        }
        .message-body {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
            line-height: 1.6;
            font-size: 0.9rem;
        }
        /* Style for individual replies in history */
        .reply-item {
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 0.9rem;
            border: 1px solid #e9ecef;
        }
        .reply-item.agent-reply { /* Agent's reply */
            background-color: #eef; /* Light blue */
            border-left: 3px solid #3498db; /* Blue left border */
        }
        .reply-item.customer-reply { /* Customer's reply */
            background-color: #fdf8e5; /* Light yellow */
             border-left: 3px solid #f39c12; /* Orange left border */
        }
        .reply-meta {
            font-size: 0.8rem;
            color: #6c757d;
            margin-bottom: 5px;
        }
         .reply-meta .name { font-weight: 600; }

        .reply-form-container {
            padding: 15px;
            border: 1px dashed #ccc;
            border-radius: 8px;
            background-color: #fff;
        }
        .reply-form-container textarea {
            resize: vertical;
            min-height: 90px; /* Slightly taller textarea */
            font-size: 0.9rem;
        }
        .reply-form-container .btn {
            margin-top: 10px;
            margin-right: 5px;
        }
        .text-right { text-align: right; }

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
                            {{-- <h2 class="pageheader-title">Customer Support Tickets</h2> --}}
                        </div>
                    </div>
                </div>

                <!-- Single Card for All Tickets Table -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0" style="color: white;">Ticket Queue</h5>
                        {{-- Optional: Add Ticket Button --}}
                        {{-- <button class="btn btn-light btn-sm"><i class="fas fa-plus"></i> New Ticket</button> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Priority</th>
                                        <th>Last Updated</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Loop through tickets --}}
                                    {{-- @foreach ($tickets as $ticket) --}}

                                    {{-- Example Ticket Row 1 (Open, High Priority) --}}
                                    <tr>
                                        <td>#TKT-1023 {{-- {{ $ticket->ticket_id }} --}}</td>
                                        <td>
                                            <div class="customer-cell">
                                                <img src="{{ asset('home/assets/images/avatar-4.jpg') }}" alt="Customer Avatar" class="customer-avatar">
                                                <div class="customer-info">
                                                    <span class="name">Sarah Chen {{-- {{ $ticket->customer->name }} --}}</span>
                                                    <span class="sub-text">s.chen@email.com {{-- {{ $ticket->customer->email }} --}}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Login Issue on Mobile App {{-- {{ $ticket->subject }} --}}</td>
                                        <td><span class="badge badge-status-open">Open {{-- {{ $ticket->status }} --}}</span></td>
                                        <td><span class="badge badge-priority-high">High {{-- {{ $ticket->priority }} --}}</span></td>
                                        <td>Jan 18, 2024 10:30 AM {{-- {{ $ticket->updated_at->format('M d, Y h:i A') }} --}}</td>
                                        <td class="text-right">
                                            {{-- Toggle Details/Reply Row Button --}}
                                            <button class="btn btn-info btn-sm view-reply-button" data-ticket-id="1023">
                                                <i class="fas fa-envelope-open-text"></i> View / Reply
                                            </button>
                                            {{-- Optional quick actions --}}
                                            {{-- <button class="btn btn-secondary btn-sm btn-xs" title="Assign"><i class="fas fa-user-tag"></i></button> --}}
                                            {{-- <button class="btn btn-success btn-sm btn-xs" title="Mark Resolved"><i class="fas fa-check-circle"></i></button> --}}
                                        </td>
                                    </tr>
                                    {{-- Hidden Row for Details/Reply for Ticket 1 --}}
                                    <tr class="ticket-details-section" id="details-section-1023">
                                        <td colspan="7"> {{-- Span all columns --}}
                                            {{-- Customer's Original Message --}}
                                            <div class="customer-message">
                                                <h6 class="section-title">Customer Message:</h6>
                                                <div class="message-body">
                                                    Hi Support Team, I'm unable to log in to the mobile application since the last update. It keeps saying "Authentication Failed" even though my password is correct. I can log in fine on the website. My device is an iPhone 13 Pro. Please help! Thanks, Sarah. {{-- {{ $ticket->description }} --}}
                                                </div>
                                            </div>

                                            {{-- Reply History (Example) --}}
                                            <div class="reply-history">
                                                 <h6 class="section-title">Conversation History:</h6>
                                                 {{-- Loop through $ticket->replies --}}
                                                 <div class="reply-item agent-reply"> {{-- Agent reply style --}}
                                                     <div class="reply-meta">
                                                         <span class="name">Agent John Doe</span> replied on Jan 18, 2024 11:15 AM
                                                    </div>
                                                    <p>Hi Sarah, thanks for reaching out. Could you please try clearing the app's cache and data, then restart the app and try logging in again? Let me know if that works.</p>
                                                 </div>
                                                   <div class="reply-item customer-reply"> {{-- Customer reply style --}}
                                                     <div class="reply-meta">
                                                         <span class="name">Sarah Chen</span> replied on Jan 18, 2024 11:45 AM
                                                    </div>
                                                    <p>Hi John, I tried clearing the cache/data and restarting, but it still gives the same error.</p>
                                                 </div>
                                                  {{-- End Loop --}}
                                            </div>

                                            {{-- Agent Reply Form --}}
                                            <div class="reply-form-container">
                                                <h6 class="section-title">Your Reply:</h6>
                                                {{-- Point form to your backend route for submitting replies --}}
                                                {{-- <form method="POST" action="{{ route('support.tickets.reply', $ticket->id) }}"> --}}
                                                <form>
                                                    {{-- @csrf --}}
                                                    <div class="form-group mb-2">
                                                        <label for="reply-text-1023" class="sr-only">Your Reply</label>
                                                        <textarea class="form-control" id="reply-text-1023" name="reply_content" rows="4" placeholder="Enter your detailed reply here..." required></textarea>
                                                        {{-- Hidden field for ticket ID if needed --}}
                                                        {{-- <input type="hidden" name="ticket_id" value="{{ $ticket->id }}"> --}}
                                                    </div>
                                                    <div class="text-right">
                                                        {{-- Optional: Quick actions like changing status --}}
                                                        {{-- <select name="status_update" class="form-control-sm d-inline-block w-auto mr-2">
                                                            <option value="">Update Status (Optional)</option>
                                                            <option value="Pending">Pending Customer</option>
                                                            <option value="Resolved">Resolved</option>
                                                        </select> --}}
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Send Reply</button>
                                                        <button type="button" class="btn btn-secondary btn-sm cancel-reply-button" data-ticket-id="1023"><i class="fas fa-times"></i> Cancel</button>
                                                    </div>
                                                {{-- </form> --}}
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- End Example Ticket 1 --}}


                                    {{-- Example Ticket Row 2 (Pending, Medium Priority) --}}
                                    <tr>
                                        <td>#TKT-1021</td>
                                        <td>
                                            <div class="customer-cell">
                                                 <img src="{{ asset('home/assets/images/avatar-5.jpg') }}" alt="Customer Avatar" class="customer-avatar">
                                                <div class="customer-info">
                                                    <span class="name">Mike Lee</span>
                                                    <span class="sub-text">mike.lee@company.net</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Question about billing cycle</td>
                                        <td><span class="badge badge-status-pending">Pending Customer</span></td>
                                        <td><span class="badge badge-priority-medium">Medium</span></td>
                                        <td>Jan 17, 2024 03:00 PM</td>
                                        <td class="text-right">
                                            <button class="btn btn-info btn-sm view-reply-button" data-ticket-id="1021">
                                                 <i class="fas fa-envelope-open-text"></i> View / Reply
                                            </button>
                                        </td>
                                    </tr>
                                     {{-- Hidden Row for Details/Reply for Ticket 2 --}}
                                    <tr class="ticket-details-section" id="details-section-1021">
                                        <td colspan="7">
                                            {{-- Placeholder for Ticket 1021 details and reply form --}}
                                             <div class="customer-message">
                                                <h6 class="section-title">Customer Message:</h6>
                                                <div class="message-body">
                                                   When does my next billing cycle start? My last invoice was on Dec 15th.
                                                </div>
                                            </div>
                                             <div class="reply-history">
                                                 <h6 class="section-title">Conversation History:</h6>
                                                  <div class="reply-item agent-reply">
                                                     <div class="reply-meta"><span class="name">Agent Emily White</span> replied on Jan 17, 2024 03:00 PM</div>
                                                    <p>Hi Mike, your account is on a monthly billing cycle starting on the 15th. Your next cycle will begin on January 15th, and the invoice should be generated shortly after. Please let us know if you have further questions.</p>
                                                 </div>
                                            </div>
                                             <div class="reply-form-container">
                                                  <h6 class="section-title">Your Reply:</h6>
                                                 <form>
                                                    <div class="form-group mb-2">
                                                        <textarea class="form-control" id="reply-text-1021" name="reply_content" rows="4" placeholder="Enter your detailed reply here..." required></textarea>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Send Reply</button>
                                                        <button type="button" class="btn btn-secondary btn-sm cancel-reply-button" data-ticket-id="1021"><i class="fas fa-times"></i> Cancel</button>
                                                    </div>
                                                </form>
                                             </div>
                                        </td>
                                    </tr>
                                    {{-- End Example Ticket 2 --}}

                                    {{-- @endforeach --}}
                                    {{-- Add row if no tickets found --}}
                                    {{-- @if ($tickets->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">No support tickets found.</td>
                                        </tr>
                                    @endif --}}
                                </tbody>
                            </table>
                        </div>

                         {{-- Pagination Links (if needed) --}}
                         {{-- <div class="mt-4 d-flex justify-content-center">
                            {{ $tickets->links() }}
                         </div> --}}
                    </div>
                </div>
                <!-- End Ticket Table Card -->

            </div> {{-- End container-fluid --}}
        </div> {{-- End dashboard-ecommerce --}}

        {{-- @include('home.footer') --}}

    </div> {{-- End dashboard-wrapper --}}
</div> {{-- End dashboard-main-wrapper --}}

<!-- JS Files -->
<script src="home/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="home/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
{{-- <script src="home/assets/libs/js/main-js.js"></script> --}}

<script>
$(document).ready(function() {
    // --- View/Reply Button Click Handler ---
    $('.view-reply-button').on('click', function() {
        var ticketId = $(this).data('ticket-id');
        // Find the main ticket row
        var $ticketRow = $(this).closest('tr');
        // Find the *next* row which is the details section
        var $detailsSectionRow = $ticketRow.next('.ticket-details-section');

        // Safety check
        if ($detailsSectionRow.length === 0 || $detailsSectionRow.attr('id') !== 'details-section-' + ticketId) {
            console.error("Could not find matching details section row for ticket ID:", ticketId);
            return;
        }

        // Hide all *other* details section rows
        $('.ticket-details-section').not($detailsSectionRow).slideUp(200);

        // Toggle the target details section row
        $detailsSectionRow.slideToggle(300, function() {
            // Optional: Focus textarea when form is shown within the details section
            if ($detailsSectionRow.is(':visible')) {
                $detailsSectionRow.find('.reply-form-container textarea').focus();
            }
        });
    });

    // --- Cancel Reply Button Click Handler (within details section) ---
    $('.cancel-reply-button').on('click', function() {
        // Find the closest parent details section row and hide it
        $(this).closest('.ticket-details-section').slideUp(300);
    });

    // --- Optional: AJAX Form Submission for Replies ---
    // $('.reply-form-container form').on('submit', function(e) {
    //     e.preventDefault();
    //     var form = $(this);
    //     var $detailsSectionRow = form.closest('.ticket-details-section');
    //     var ticketId = $detailsSectionRow.attr('id').replace('details-section-', ''); // Get ID from row
    //     var url = form.attr('action'); // Ensure form action is set
    //     var formData = form.serialize(); // Includes reply_content, status_update (if added)

    //     var $submitButton = form.find('button[type="submit"]');
    //     var originalButtonHtml = $submitButton.html();
    //     $submitButton.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Sending...');

    //     $.ajax({
    //         type: "POST",
    //         url: url, // Backend route to handle reply
    //         data: formData,
    //         success: function(response) {
    //             console.log('Reply sent:', response);

    //             // --- Update UI ---
    //             // 1. Add the new reply to the history
    //             var newReplyHtml = `
    //                 <div class="reply-item agent-reply">
    //                     <div class="reply-meta">
    //                         <span class="name">${response.agent_name || 'You'}</span> replied on ${response.reply_date || 'Just now'}
    //                     </div>
    //                     <p>${response.reply_content || form.find('textarea').val()}</p>
    //                 </div>`;
    //             $detailsSectionRow.find('.reply-history').append(newReplyHtml); // Append to history div

    //             // 2. Clear the textarea
    //             form.find('textarea').val('');

    //             // 3. Optionally update the status badge in the main ticket row
    //             if (response.new_status) {
    //                 var $ticketRow = $detailsSectionRow.prev('tr'); // Get the main ticket row
    //                 // Find the status badge and update its class and text
    //                 // Example: $ticketRow.find('.badge-status-...') might need adjustment based on how you select it
    //                 // This part requires careful class management for statuses
    //                 console.log("Status updated to:", response.new_status);
    //             }

    //             // 4. Maybe hide the section after success, or show a confirmation
    //             // $detailsSectionRow.slideUp(1000);
    //             alert('Reply sent successfully!');

    //         },
    //         error: function(xhr, status, error) {
    //             console.error("Error sending reply:", xhr.responseText);
    //             alert('Error sending reply. Please try again.');
    //         },
    //         complete: function() {
    //             // Restore button state
    //             $submitButton.prop('disabled', false).html(originalButtonHtml);
    //         }
    //     });
    // });

});
</script>

</body>
</html>