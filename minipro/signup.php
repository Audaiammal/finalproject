<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .container {
            background-color: lightskyblue;
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: navy;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            max-width: 100%;
        }
        .btn-primary {
            background-color: #003366;
            border-color: #003366;
        }
        .btn-primary:hover {
            background-color: #002244;
            border-color: #002244;
        }
        .error-message {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }
        .valid-message {
            color: green;
            font-size: 0.875rem;
            margin-top: 5px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Signup</h2>
    <form id="signupForm" action="process_signup.php" method="POST">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
            <div id="firstnameError" class="error-message" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
            <div id="lastnameError" class="error-message" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
            <div id="usernameError" class="error-message" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div id="emailError" class="error-message" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <img src="images/eye.jpg" alt="Show Password" id="eyeIcon" style="width: 20px; height: 20px;">
                    </span>
                </div>
            </div>
            <div id="passwordError" class="error-message" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                        <img src="images/eye.jpg" alt="Show Password" id="confirmEyeIcon" style="width: 20px; height: 20px;">
                    </span>
                </div>
            </div>
            <div id="confirmPasswordError" class="error-message" style="display: none;"></div>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="student">Student</option>
            </select>
        </div>

        <div id="studentFields" style="display: none;">
            <div class="form-group">
                <label for="rollno">Roll Number</label>
                <input type="text" class="form-control" id="rollno" name="rollno">
                <div id="rollnoError" class="error-message" style="display: none;"></div>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="tel" class="form-control" id="mobile" name="mobile">
                <div id="mobileError" class="error-message" style="display: none;"></div>
                <div id="mobileValid" class="valid-message" style="display: none;">Valid mobile number.</div>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <select class="form-control" id="year" name="year">
                    <option value="1st">1st Year</option>
                    <option value="2nd">2nd Year</option>
                    <option value="3rd">3rd Year</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Signup</button>
        <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
    </form>
</div>

<script>
    
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.src = 'images/eyeopen.jpg';
        } else {
            passwordInput.type = 'password';
            eyeIcon.src = 'images/eye.jpg';
        }
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
        const confirmPasswordInput = document.getElementById('confirm_password');
        const confirmEyeIcon = document.getElementById('confirmEyeIcon');
        if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            confirmEyeIcon.src = 'images/eyeopen.jpg';
        } else {
            confirmPasswordInput.type = 'password';
            confirmEyeIcon.src = 'images/eye.jpg';
        }
    });
    document.getElementById('role').addEventListener('change', function () {
        const studentFields = document.getElementById('studentFields');
        if (this.value === 'student') {
            studentFields.style.display = 'block'; 
        } else {
            studentFields.style.display = 'none'; 
        }
    });
    document.getElementById('firstname').addEventListener('input', function () {
        const errorDiv = document.getElementById('firstnameError');
        if (this.value.trim() === '') {
            errorDiv.textContent = 'First name is required.';
            errorDiv.style.display = 'block';
        } else {
            errorDiv.style.display = 'none';
        }
    });

    document.getElementById('lastname').addEventListener('input', function () {
        const errorDiv = document.getElementById('lastnameError');
        if (this.value.trim() === '') {
            errorDiv.textContent = 'Last name is required.';
            errorDiv.style.display = 'block';
        } else {
            errorDiv.style.display = 'none';
        }
    });

    document.getElementById('username').addEventListener('input', function () {
        const errorDiv = document.getElementById('usernameError');
        if (this.value.trim() === '') {
            errorDiv.textContent = 'Username is required.';
            errorDiv.style.display = 'block';
        } else {
            errorDiv.style.display = 'none';
        }
    });
    document.getElementById('email').addEventListener('input', function () {
        const email = this.value.trim();
        const errorDiv = document.getElementById('emailError');
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === '') {
            errorDiv.textContent = 'Email is required.';
            errorDiv.style.display = 'block';
        } else if (!emailPattern.test(email)) {
            errorDiv.textContent = 'Please enter a valid email address.';
            errorDiv.style.display = 'block';
        } else {
            errorDiv.style.display = 'none'; 
        }
    });

    document.getElementById('password').addEventListener('input', function () {
        const errorDiv = document.getElementById('passwordError');
        if (this.value.trim() === '') {
            errorDiv.textContent = 'Password is required.';
            errorDiv.style.display = 'block';
        } else {
            errorDiv.style.display = 'none';
        }
    });

    document.getElementById('confirm_password').addEventListener('input', function () {
        const errorDiv = document.getElementById('confirmPasswordError');
        const password = document.getElementById('password').value;
        if (this.value.trim() === '') {
            errorDiv.textContent = 'Please confirm your password.';
            errorDiv.style.display = 'block';
        } else if (this.value !== password) {
            errorDiv.textContent = 'Passwords do not match.';
            errorDiv.style.display = 'block';
        } else {
            errorDiv.style.display = 'none';
        }
    });
    document.getElementById('mobile').addEventListener('input', function () {
        const errorDiv = document.getElementById('mobileError');
        const validDiv = document.getElementById('mobileValid');
        const mobilePattern = /^[0-9]{10}$/; 
        if (this.value.trim() === '') {
            errorDiv.textContent = 'Mobile number is required.';
            errorDiv.style.display = 'block';
            validDiv.style.display = 'none';
        } else if (!mobilePattern.test(this.value.trim())) {
            errorDiv.textContent = 'Invalid mobile number. Must be 10 digits.';
            errorDiv.style.display = 'block';
            validDiv.style.display = 'none';
        } else {
            errorDiv.style.display = 'none';
            validDiv.style.display = 'block';
        }
    });
</script>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
