<?php
include 'config.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  // Retrieve user data from the database
  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row["password"])) {
          // Redirect to dashboard or success page
          header("location: dashboard.php");
          exit();
      } else {
          echo "Invalid email or password!";
      }
  } else {
      echo "Invalid email or password!";
  }
  
  $stmt->close();
}

$conn->close(); // Close the database connection
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login / Register</title>
  <link rel="stylesheet" href="login.css"> 
  <script src="https://kit.fontawesome.com/d62b10e8dc.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="index.php" method="POST"> <!-- Changed action to index.php -->
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
        <!-- Removed confirm_password input -->
        <button type="submit" name="register">Sign Up</button> <!-- Added name attribute -->
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="dashboard.php" method="POST">
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
        <button type="submit" name="login">Sign In</button> <!-- Added name attribute -->
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
