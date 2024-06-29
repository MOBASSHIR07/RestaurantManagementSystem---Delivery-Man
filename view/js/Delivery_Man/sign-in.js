document.addEventListener('DOMContentLoaded', function () {
    let emailField = document.getElementById("email");
    emailField.addEventListener('keyup', function () {
        emailValidate(emailField);
    });

    let passwordField = document.getElementById("password");
    passwordField.addEventListener('keyup', function () {
        passwordValidate(passwordField);
    });

    let signinButton = document.getElementById("sign-in-btn");
    signinButton.addEventListener("click", function () {
        let emailIsValid = emailValidate(emailField);
        let passwordIsValid = passwordValidate(passwordField);

        if (!emailIsValid || !passwordIsValid) {
            // Form invalid
            return;
        }

        // signIn(emailField.value, passwordField.value);
    });

    function emailValidate(fieldRef) {
        let value = fieldRef.value;

        if (!value) {
            document.getElementById("emailError").innerText = "Email is required";
            document.getElementById("emailError").style.color = "red";
            return false;
        }

        if (!value.includes("@")) {
            document.getElementById("emailError").innerText = "Email is not valid";
            document.getElementById("emailError").style.color = "red";
            return false;
        }

        document.getElementById("emailError").innerText = "";
        return true;
    }

    function passwordValidate(fieldRef) {
        let value = fieldRef.value;

        if (!value) {
            document.getElementById("passwordError").innerText = "Password is required";
            document.getElementById("passwordError").style.color = "red";
            return false;
        }

        document.getElementById("passwordError").innerText = "";
        return true;
    }

    // function signIn(email, password) {
    //     console.log("signIn function called with email:", email, "and password:", password);
    
    //     const apiEndpoint = `http://localhost:8081/Final/RestaurantManagementSystem%20-%20Delivery%20Man/api/user-check.php`;
    
    //     fetch(apiEndpoint, {
    //         method: 'POST',
    //         //  headers: {
    //         //      'Content-Type': 'application/json',
    //         //  },
    //         body: JSON.stringify({ email: email, password: password }),
    //     })
    //     .then(response => {
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }
    //         console.log("Full API Response:", response);
    //         return response.json();
    //     })
    //     .then(data => {
    //         console.log("API Response Data:", data);
    
    //         if (data.success) {
    //             alert("Login successful!");
    //         } else {
    //             alert("Login failed. Please check your credentials.");
    //         }
    //     })
    //     .catch(error => {
    //         console.log('Error during fetch:', error);
    //         alert("An error occurred during the login process. Please try again.");
    //     });
    // }
    
});
