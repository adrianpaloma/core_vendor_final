<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Vendor Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        /* Background with gradient animation */
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
        .login-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            color: white;
            text-align: center;
        }

        .login-card h3 {
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Input Fields */
        .form-control {
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.5);
            color: white;
            box-shadow: none;
        }

        /* Custom Login Button */
        .login-btn {
            width: 100%;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background: linear-gradient(90deg, #ff758c, #ff7eb3);
            color: white;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: linear-gradient(90deg, #ff7eb3, #ff758c);
            transform: translateY(-2px);
        }

        /* Forgot Password & Sign Up Link */
        .link {
            font-size: 0.9rem;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .link:hover {
            text-decoration: underline;
            color: #ffebcd;
        }

        /* Remember Me Checkbox */
        .form-check-label {
            color: white;
        }

    </style>
</head>
<body>

    <div class="login-card">
        <h3 class="mb-4"><i class="fas fa-user-lock"></i> Welcome Back</h3>

        <!-- Session Status -->
        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label fw-bold"><i class="fas fa-envelope"></i> Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email">
                <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label fw-bold"><i class="fas fa-lock"></i> Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check text-start">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">Remember me</label>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn login-btn"><i class="fas fa-sign-in-alt"></i> Log in</button>

            <!-- Forgot Password & Register -->
            <div class="d-flex justify-content-between mt-3">
                @if (Route::has('password.request'))
                    <a class="link" href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
                <a class="link" href="{{ route('register') }}">Sign Up</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
