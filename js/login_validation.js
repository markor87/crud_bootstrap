function validateForm() {
    // Get the values of the email and password fields
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Validate the email field
    if (email === "") {
        // If the email field is empty, display an error message
        document.getElementById("emailHelp").style.display = "block";
        document.getElementById("emailHelp").innerHTML = "Please enter your email.";
        return false;
    }

    // Validate the password field
    if (password === "") {
        // If the password field is empty, display an error message
        document.getElementById("passwordHelp").style.display = "block";
        document.getElementById("passwordHelp").innerHTML = "Please enter your password.";
        return false;
    }

    // If the email and password fields are not empty, submit the form
    return true;
}