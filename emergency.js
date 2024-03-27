const helpButton = document.getElementById('help-button');
const helpModal = new bootstrap.Modal(document.getElementById('helpModal'));
const helpForm = document.getElementById('helpForm');

helpButton.addEventListener('click', () => {
  helpModal.show();
});

helpForm.addEventListener('submit', (event) => {
  event.preventDefault(); // Prevent default form submission

  // Gather form data (you'll need to get the textarea content)
  const formData = {
    // ... Add your data here
  };

  // Send the data to your PHP script using an AJAX request
  fetch('send_alert.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(formData)
  })
  .then(response => {
      // Handle the response, e.g., display success/error message
  })
  .catch(error => console.error('Error submitting help request:', error));
});
