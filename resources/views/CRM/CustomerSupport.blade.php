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
    <title>Customer Support</title>
    <style>
        .support-card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .icon-blue { background-color: #007bff; color: white; }
        .icon-green { background-color: #28a745; color: white; }
        .icon-orange { background-color: #fd7e14; color: white; }
        .icon-red { background-color: #dc3545; color: white; }
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
                        <div class="card support-card p-4">
                            <h2 class="mb-4 text-center">Customer Support</h2>

                            <div class="row">
                                <!-- Ticket Submission -->
                                <div class="col-md-6">
                                    <div class="card mb-4 support-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle icon-blue me-3">
                                                    <i class="fas fa-ticket-alt"></i>
                                                </div>
                                                <h5 class="mb-0">Submit a Support Ticket</h5>
                                            </div>
                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label">Subject</label>
                                                    <input type="text" class="form-control" placeholder="Enter issue subject">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control" rows="4" placeholder="Describe your issue"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary w-100">Submit Ticket</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Live Chat -->
                                <div class="col-md-6">
                                    <div class="card mb-4 support-card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="icon-circle icon-green me-3">
                                                    <i class="fas fa-comments"></i>
                                                </div>
                                                <h5 class="mb-0">Live Chat Support</h5>
                                            </div>
                                            <p>Chat with our support team instantly.</p>
                                            <button class="btn btn-success w-100">Start Chat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- FAQ Section -->
                            <div class="card support-card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-circle icon-orange me-3">
                                            <i class="fas fa-question-circle"></i>
                                        </div>
                                        <h5 class="mb-0">Frequently Asked Questions</h5>
                                    </div>
                                    <div class="accordion" id="faqAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">How do I reset my password?</button>
                                            </h2>
                                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">Go to settings and select 'Reset Password'.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">How do I contact support?</button>
                                            </h2>
                                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">You can submit a ticket or use live chat.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End FAQ Section -->
                        </div> <!-- End Main Support Card -->
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
</body>
</html>