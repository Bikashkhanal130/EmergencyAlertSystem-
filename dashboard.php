<?php 

include 'config.php';


// header('Location: dashboard.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" integrity="sha384-NOeqY/Oq13KuWk8vCOsveNSzFIdntFvRcDqpxr1ggQaGc0TqiaqXplzjoD8oLoM2" crossorigin=""/>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js" integrity="sha384-dzEI2F3q3dP0+taUqcjLstP6pysIq11LLhcrjZ+XnctFv2bHpbeqFKRz4gpOe2/l" crossorigin=""></script>

    <!-- CSS -->
    <link rel="stylesheet" href="./dashboard.css">
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
                   
                </a></li>
                <!-- <div class="mode-toggle">
                  <span class="switch"></span>
                </div> -->
            </ul>
        </div>

            </ul>
            <ul class="logout-mode">
                <li><a href="logout.php">
                    <!-- <i class="uil uil-signout"></i> -->
                    <span class="logout">Logout</span>
                </a></li>
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="dash-content">
            <div id="map" class="map-container"></div> <!-- This div will contain the map -->
            <div id="emergency-content" class="hidden"> 
                <div class="btn-danger">
                    <button id="helpButton" class="btn btn-danger">Help Me</button>
                </div>
                <form id="emergency-response-form"></form>
            </div>
        </div>
    </section>

<script src="./dashboard.js"></script>
    <script>
console.log("Script loaded successfully!");

// Call getUserLocation when the Help Me button is clicked
const helpButton = document.getElementById('helpButton');
console.log("Help button:", helpButton);
helpButton.addEventListener('click', getUserLocation);

// Function to get user's location and display alert
async function getUserLocation() {
    console.log("Getting user location...");
    if (navigator.geolocation) {
        try {
            const position = await navigator.geolocation.getCurrentPosition();
            const { latitude, longitude } = position.coords;
            console.log("User location obtained:", latitude, longitude);
            // Show notification
            alert("Your location is: Latitude " + latitude + ", Longitude " + longitude);
        } catch (error) {
            console.error('Error getting user location:', error);
        }
    } else {
        console.error("Geolocation is not supported by this browser.");
    }
}
</script>

 
</body>
</html>
