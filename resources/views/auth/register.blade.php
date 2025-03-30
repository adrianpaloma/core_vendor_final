<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Vendor Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(-45deg, #663C1F, #895129, #E08543);
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

        .register-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            color: white;
        }

        .form-label {
            color: white;
        }

        #other_gender_input {
            display: none;
        }

        /* Floating Back Button */
        .back-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #895129, #E08543);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 30px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .back-btn:hover {
            transform: scale(1.1);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.4);
        }


        .back-btn i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <h3 class="mb-4 text-center"><i class="fas fa-user-plus"></i> Create an Account</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row">
                <!-- Left Side -->
                <div class="col-md-6">
                    <!-- Store Name -->
                    <div class="mb-3">
                        <label for="store_name" class="form-label fw-bold"><i class="fas fa-store"></i> Store Name</label>
                        <input id="store_name" class="form-control" type="text" name="store_name" required placeholder="Enter store name">
                    </div>

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold"><i class="fas fa-user"></i> Name</label>
                        <input id="name" class="form-control" type="text" name="name" required placeholder="Enter your name">
                    </div>

                    <!-- Age -->
                    <div class="mb-3">
                        <label for="age" class="form-label fw-bold"><i class="fas fa-birthday-cake"></i> Age</label>
                        <input id="age" class="form-control" type="number" name="age" required placeholder="Enter your age">
                    </div>

                    <!-- Gender -->
                    <div class="mb-3">
                        <label for="gender" class="form-label fw-bold"><i class="fas fa-venus-mars"></i> Gender</label>
                        <select id="gender" class="form-control" name="gender" required onchange="toggleOtherGenderInput()">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <input id="other_gender_input" class="form-control mt-2" type="text" name="other_gender" placeholder="Please specify" />
                    </div>
                </div>

                <!-- Right Side -->
                <div class="col-md-6">
                    <!-- Location -->
                    <div class="mb-3">
                        <label for="location" class="form-label fw-bold"><i class="fas fa-map-marker-alt"></i> Location/Address</label>
                        <input id="location" class="form-control" type="text" name="location" required placeholder="Enter store location">
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold"><i class="fas fa-envelope"></i> Email</label>
                        <input id="email" class="form-control" type="email" name="email" required placeholder="Enter your email">
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold"><i class="fas fa-lock"></i> Password</label>
                        <input id="password" class="form-control" type="password" name="password" required placeholder="Create a password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-bold"><i class="fas fa-lock"></i> Confirm Password</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required placeholder="Confirm your password">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>

            <div class="mt-3 text-center">
                <a class="text-white" href="{{ route('login') }}">Already have an account? Login</a>
            </div>
        </form>
    </div>

    <!-- Floating Back Button -->
    <a href="{{ url('/') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Back to Vendor Platform
    </a>

    <script>
        function toggleOtherGenderInput() {
            var genderSelect = document.getElementById("gender");
            var otherGenderInput = document.getElementById("other_gender_input");
            if (genderSelect.value === "Other") {
                otherGenderInput.style.display = "block";
                otherGenderInput.setAttribute("required", "true");
            } else {
                otherGenderInput.style.display = "none";
                otherGenderInput.removeAttribute("required");
                otherGenderInput.value = "";
            }
        }
    </script>
</body>
</html>