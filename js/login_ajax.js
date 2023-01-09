// Add a submit event to the login form
$("#loginForm").submit(function (event) {
    // Prevent the form from being submitted
    event.preventDefault();

    // Get the values of the email and password fields
    var email = $("#email").val();
    var password = $("#password").val();

    // Send a POST request to the server with the login data
    $.ajax({
        type: "POST",
        url: "/login",
        data: {
            email: email,
            password: password
        },
        success: function (response) {
            // If the login was successful, redirect the user to the dashboard
            window.location.href = "/dashboard";
        },
        error: function (response) {
            // If the login was unsuccessful, display an error message
            alert("Login failed. Please try again.");
        }
    });
});