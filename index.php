<?php
// Initialize variables and handle errors
$name = $email = $password = $confirm_password = $phone_number = '';
$msg = '';
$errors = [];

if (isset($_POST['submit'])) {
    // Sanitize input
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $phone_number = trim($_POST['phone']);

    // Validation
    if (empty($name)) {
        $errors[] = "Name is required"; 
    }
    if (!$email) {
        $errors[] = "Valid email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    if (empty($phone_number)) {
        $errors[] = "Phone number is required";
    }

    // If no errors, connect to database and insert
    if (empty($errors)) {
        $servername = "localhost"; // Replace with your values
        $username = "root";
        $password = "";
        $dbname = "neighbour";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepared statement 
            $stmt = $conn->prepare("INSERT INTO users (id, name, email, phone_number, password, created_date) VALUES (NULL, ?, ?, ?, ?, NOW())");
            $stmt->execute([$name, $email, $phone_number, $hashed_password]);
            
            $msg = "Registration successful! <a href='login.php'>Log in</a>";

        } catch (PDOException $e) {
            $msg = "Error: " . $e->getMessage(); // Handle database errors
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Form - Neighbour Emergency Alert System</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="./style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/image2.svg" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        <p>Register To Emergency Alert System. </p>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter Your Name"
                                value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email"
                                value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
                            <input type="text" class="phone" name="phone" placeholder="Enter Your Phone Number"
                                value="<?php if (isset($_POST['submit'])) { echo $phone_number; } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password"
                                required>
                            <input type="password" class="confirm-password" name="confirm-password"
                                placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="login.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script>
        $(document).ready(function () {
            $('.alert-close').on('click', function () {
                $('.main-mockup').fadeOut('slow', function () {
                    // Action to be performed after fading out
                    // For example, you can remove the element from the DOM:
                    $('.main-mockup').remove();
                });
            });
        });
    </script>
</body>

</html>
