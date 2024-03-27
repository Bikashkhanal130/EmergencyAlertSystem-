<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="dashboard.css">
    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Emergency Alert System Dashboard</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <!-- <div class="logo-image">
               <img src="images/logo.png" alt="Emergency Alert System Logo">
            </div> -->
            <span class="logo_name">Emergency Alert</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="report_form.php">
                    <i class="uil uil-exclamation-triangle"></i>
                    <span class="link-name">Report Emergency</span>
                </a></li>
                <li><a href="view_status.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">View Status</span>
                </a></li>
                <li><a href="contact.php">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Contact Us</span>
                </a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <!-- <i class="uil uil-signout"></i> -->
                    <span class="logout">Logout</span>
                </a></li>
                <!-- <div class="mode-toggle">
                  <span class="switch"></span>
                </div> -->
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Emergency Alert Dashboard</span>
                </div>
            </div>
        </div>
    </section>

    <script>
        const body = document.querySelector("body"),
            modeToggle = body.querySelector(".mode-toggle");
        sidebar = body.querySelector("nav");
        sidebarToggle = body.querySelector(".sidebar-toggle");

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if(sidebar.classList.contains("close")){
                localStorage.setItem("status", "close");
            }else{
                localStorage.setItem("status", "open");
            }
        });
    </script>
</body>
</html>
