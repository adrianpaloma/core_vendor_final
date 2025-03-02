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
    <title>Payout Request</title>
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
        .form-label {
            font-weight: 600;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6e4b3d, #9e5d3b);
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 30px;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #9e5d3b, #6e4b3d);
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
                            <div class="card">
                                <div class="card-header">Payout Request</div>
                                <div class="card-body">
                                    <h4>Pending Payout: {{ number_format($balance->pending[0]->amount / 100, 2) }}</h4>
                                    <h4>Available Payout: {{ number_format($balance->available[0]->amount / 100, 2) }}</h4>
                                    <form>
                                        <div class="mb-3">
                                            <label for="paymentMethod" class="form-label">Disbursement Account</label>
                                            <select class="form-control" id="paymentMethod" required>
                                                @foreach ($external_accounts->data as $external_account)
                                                    @if ($external_account->object == 'bank_account')
                                                        <option value="{{ $external_account->id }}">
                                                            {{ $external_account->bank_name }} | {{ $external_account->account_holder_name }} 
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="payoutAmount" class="form-label">Payout Amount</label>
                                            <input type="number" class="form-control" value="{{ number_format($balance->available[0]->amount / 100, 2) }}" id="payoutAmount" placeholder="Enter amount" required>
                                        </div>
                                                                                
                                        {{-- <div class="mb-3">
                                            <label for="accountDetails" class="form-label">Account Details</label>
                                            <textarea class="form-control" id="accountDetails" placeholder="Enter your account details" rows="3" required></textarea>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary">Submit Request</button>
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
</body>
</html>
