<?php
include 'config.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit(); // Stop further execution
    }

    // Password hashing (important for security!)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); 

    // Build the insertion query
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        // Redirect to dashboard after successful registration
        header("Location: dashboard.php");
        exit(); // Stop further execution
    } else {
        // Log the error instead of echoing to the page
        error_log("Error during registration: " . $conn->error);
        // Display a user-friendly message
        echo "An error occurred during registration. Please try again later.";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login / Register</title>
  <link rel="stylesheet" href="login.css"> 
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="register.php" method="POST"> 
        <h1>Create Account</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" name="name" placeholder="Name" required />
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
        <button type="submit" name="register">Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="login.php" method="POST">
        <h1>Sign in</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your account</span>
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <a href="#">Forgot your password?</a>
        <button type="submit" name="login">Sign In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To stay connected, please login with your personal info</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your details to begin your journey with us</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <footer>
      <p>Created with <i class="fa fa-heart"></i> by Me
      </p>
  </footer>

  <script src="login.js"></script> 
</body>
</html>
