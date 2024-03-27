


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
    <link rel="stylesheet" href="../header/dashboard.cssS">
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

    <script>
    console.log("Script loaded successfully!");

    const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
    sidebar = body.querySelector("nav");
    sidebarToggle = body.querySelector(".sidebar-toggle");

    sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        if(sidebar.classList.contains("close")){
            localStorage.setItem("status", "close");
        } else {
            localStorage.setItem("status", "open");
        }
    });

    // Initialize Leaflet map
    var mymap = L.map('map').setView([51.505, -0.09], 13); // Set initial view to London

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    // Add a marker to represent your location
    var marker = L.marker([51.5, -0.09]).addTo(mymap); // Default location is London
    marker.bindPopup("<b>You are here!</b>").openPopup(); // Popup message

    // Replace the default location with user's location obtained through geolocation
    // Make sure to update the marker's position and map's view when user's location is obtained
    function updateUserLocation(lat, lng) {
        console.log("Updating user location:", lat, lng);
        marker.setLatLng([lat, lng]).update(); // Update marker position
        mymap.setView([lat, lng], 13); // Update map view
    }

    // Function to get user's location and update map
    async function getUserLocation() {
        console.log("Getting user location...");
        if (navigator.geolocation) {
            try {
                const position = await navigator.geolocation.getCurrentPosition();
                const { latitude, longitude } = position.coords;
                console.log("User location obtained:", latitude, longitude);
                updateUserLocation(latitude, longitude);
            } catch (error) {
                console.error('Error getting user location:', error);
            }
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    }

    // Call getUserLocation when the Help Me button is clicked
    const helpButton = document.getElementById('helpButton');
    console.log("Help button:", helpButton);
    helpButton.addEventListener('click', getUserLocation);
</script>

    <script src="../header/dashboard.js"></script>
</body>
</html>
