// Get the form element
let form = document.getElementById("login-form");

// Add a submit event listener to the form
form.addEventListener("submit", function(event) {
    // Prevent the form from being submitted
    event.preventDefault();

    // Get the email and password input elements
    let email = document.getElementById("emailInput");
    let password = document.getElementById("passwordInput");

    // Validate the email and password
    if (!email.value) {
        // Email is empty, display an error message
        alert("Please enter your email.");
    } else if (!password.value) {
        // Password is empty, display an error message
        alert("Please enter your password.");
    } else {
        // Email and password are valid, submit the form
        form.submit();
    }
});

// Add a registration button
let button = document.getElementById("register-button");
button.addEventListener("click", function(event) {
    // Open the registration form in a new window
    window.open("/register.php", "_blank", "height=500, width=500");
});
