


// Call getUserLocation when the Help Me button is clicked
const helpButton = document.getElementById('helpButton');
console.log("Help button:", helpButton);
helpButton.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default behavior of the button
    getUserLocation(); // Call the getUserLocation function
});


helpButton.addEventListener('click', async () => {
    // Get user permission to access location
    if (navigator.geolocation) {
        await navigator.geolocation.getCurrentPosition(async (position) => {
            const userLatitude = position.coords.latitude;
            const userLongitude = position.coords.longitude;

            // Send user's location to server-side script
            const response = await fetch('/get-nearby-users', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ userLatitude, userLongitude })
            });

            // Handle the response from the server (locations of nearby users)
            const nearbyUsers = await response.json();
            console.log('Nearby Users:', nearbyUsers); // Replace with your logic for displaying nearby users

        }, (error) => {
            console.error('Error getting user location:', error);
            // Handle errors (e.g., display error message to user)
        });
    } else {
        console.error("Geolocation is not supported by this browser.");
        // Handle situation where geolocation is not supported
    }
});
