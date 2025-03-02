<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Vendor Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* Background Animation */
        body {
            background: linear-gradient(-45deg, #3a1c71, #d76d77, #ffaf7b);
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Glassmorphism Card */
        .forgot-password-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            color: white;
            text-align: center;
        }

        .forgot-password-card h3 {
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Notification */
        .alert {
            background: rgba(0, 255, 0, 0.2);
            padding: 10px;
            border-radius: 8px;
            color: #0f0;
        }

        /* Input Styling */
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 8px;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        /* Buttons */
        .btn-custom {
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background: linear-gradient(90deg, #ff758c, #ff7eb3);
            color: white;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #ff7eb3, #ff758c);
            transform: translateY(-2px);
        }

    </style>
</head>
<body>

    <div class="forgot-password-card">
        <h3 class="mb-3"><i class="fas fa-unlock-alt"></i> Forgot Password?</h3>

        <p>Enter your email address and we'll send you a link to reset your password.</p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert mt-3">
                {{ session('status') }}
            </div>
        @endif

        <!-- Forgot Password Form -->
        <form method="POST" action="{{ route('password.email') }}" class="mt-3">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-bold"><i class="fas fa-envelope"></i> Email Address</label>
                <input id="email" type="email" name="email" class="form-control" placeholder="Enter your email" required autofocus>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-custom"><i class="fas fa-paper-plane"></i> Send Reset Link</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
