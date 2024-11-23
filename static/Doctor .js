document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally
    
    // Get form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    // Simple validation
    if (name && email && message) {
        alert('Thank you for your message, ' + name + '! We will get back to you shortly.');
        // Here you would typically send the form data to a server
        // For now, we just clear the form
        document.getElementById('contactForm').reset();
    } else {
        alert('Please fill in all fields.');
    }
});
