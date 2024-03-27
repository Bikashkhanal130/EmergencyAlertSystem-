// $(document).ready(function() {
//     $('.emergency-tab').click(function() { 
//         $(this).toggleClass('active'); // Toggle the 'active' class
//     });
// });


const helpButton = document.getElementById('helpButton');

helpButton.addEventListener('click', async () => {
    // Check if Geolocation is supported
    if (navigator.geolocation) { 
        try {
            // Request user's permission for location access
            const position = await navigator.geolocation.getCurrentPosition();

            const userLatitude = position.coords.latitude;
            const userLongitude = position.coords.longitude;

            // Send location to the server with error handling
            try {
                const response = await fetch('/get-nearby-users', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ userLatitude, userLongitude })
                });

                if (!response.ok) { // Check if the server response is successful
                    throw new Error(`Server Error: ${response.status}`);
                }

                const nearbyUsers = await response.json();
                console.log('Nearby Users:', nearbyUsers);

                // Display nearby users on the dashboard 
                displayNearbyUsers(nearbyUsers); // You'll need to create this function 

            } catch (error) {
                console.error('Error fetching nearby users:', error);
                displayErrorMessage("Error fetching nearby users."); // Create this function too
            }

        } catch (error) { 
            // Handle potential errors in getting the location 
            if (error.code === error.PERMISSION_DENIED) {
                console.error("User denied location permission.");
                displayErrorMessage("Location permission denied.");
            } else {
                console.error("Error retrieving location:", error);
                displayErrorMessage("Error getting location. Please try again."); 
            }
        } 
  } else {
      console.error("Geolocation is not supported.");
      displayErrorMessage("Geolocation is not supported by your device.");
  }
});

// Helper functions (you'll need to implement these)
function displayNearbyUsers(users) {
    // Update the dashboard with the retrieved nearby users
}

function displayErrorMessage(message) {
    // Display an error message to the user, e.g., using an alert box or updating a UI element 
}
