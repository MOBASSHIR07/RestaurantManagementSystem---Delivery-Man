document.addEventListener('DOMContentLoaded', function () {

    let fullnameField = document.getElementsByName("fullname")[0];
    fullnameField.addEventListener('keyup', function () {
        validateField(fullnameField, "fullnameError", "Fullname is required");
    });

    let phoneField = document.getElementsByName("phone")[0];
         phoneField.addEventListener('keyup', function () {
    validatePhoneField(phoneField, "phoneError", "Phone is required", "Invalid phone number");
});

    let emailField = document.getElementsByName("email")[0];
     let isValidEmail = false;

    emailField.addEventListener('keyup', function () {
        console.log('Email field keyup event triggered')
         validateEmail(emailField);
        isValidEmail = validateEmail(emailField); 
        if (isValidEmail)  {
           
           checkEmail(emailField.value);
        }
        //  console.log(isValidEmail);
        //  checkEmail(emailField.value);

    });

    let addressField = document.getElementsByName("address")[0];
    addressField.addEventListener('keyup', function () {
        validateField(addressField, "addressError", "Address is required");
    });

    let dobField = document.getElementsByName("dob")[0];
    dobField.addEventListener('change', function () {
        validateField(dobField, "dateError", "Date of Birth is required");
    });

    let religionField = document.getElementsByName("religion")[0];
    religionField.addEventListener('change', function () {
        validateSelectField(religionField, "religionError", "Religion is required");
    });

    let usernameField = document.getElementsByName("username")[0];
    usernameField.addEventListener('keyup', function () {
        validateField(usernameField, "usernameError", "Username is required");
    });

    let passwordField = document.getElementsByName("password")[0];
    passwordField.addEventListener('keyup', function () {
        validateField(passwordField, "passwordError", "Password is required");
    });

    let cpasswordField = document.getElementsByName("cpassword")[0];
    cpasswordField.addEventListener('keyup', function () {
        validateConfirmPassword(passwordField, cpasswordField, "cpasswordError", "Passwords do not match");
    });

    

    function validateField(fieldRef, errorId, errorMessage) {
        let value = fieldRef.value;

        if (!value) {
            displayError(errorId, errorMessage);
            return false;
        }

        clearError(errorId);
        return true;
    }
    function validatePhoneField(fieldRef, errorId, requiredErrorMessage, numericErrorMessage) {
        let value = fieldRef.value;
    
        if (!value) {
            displayError(errorId, requiredErrorMessage);
            return false;
        }
    
        if (!/^\d{11}$/.test(value)) {
            displayError(errorId, numericErrorMessage);
            return false;
        }
        
    
        clearError(errorId);
        return true;
    }

    function validateEmail(fieldRef) {
      let value = fieldRef.value;
       // console.log(value);
     //  let value = email.trim();

        if (!value) {
            displayError("emailError", "Email is required");
            return false;
        }

        if (!value.includes("@")) {
            displayError("emailError", "Email is not valid");
            return false;
        }

        clearError("emailError");
        return true;
    }

    function validateSelectField(fieldRef, errorId, errorMessage) {
        let value = fieldRef.value;

        if (value === "Not Selected") {
            displayError(errorId, errorMessage);
            return false;
        }

        clearError(errorId);
        return true;
    }

    function validateConfirmPassword(passwordField, cpasswordField, errorId, errorMessage) {
        let passwordValue = passwordField.value;
        let cpasswordValue = cpasswordField.value;

        if (passwordValue !== cpasswordValue) {
            displayError(errorId, errorMessage);
            return false;
        }

        clearError(errorId);
        return true;
    }

    function displayError(errorId, message) {
        let errorElement = document.getElementById(errorId);
        errorElement.innerText = message;
        errorElement.style.color = "red";
    }

    function clearError(errorId) {
        document.getElementById(errorId).innerText = "";
    }

    function checkEmail(email) {
console.log("check email method call");
        
    

        
        const apiEndpoint = `http://localhost:8081/Final/RestaurantManagementSystem%20-%20Delivery%20Man/api/user-email-check.php?email=${encodeURIComponent(email)}`;

        
        fetch(apiEndpoint)
        .then(response => response.json())
        .then(data => {
            
            console.log(data);

           
            if(data===null){

                clearError("emailError");
            }
            else{

                displayError("emailError", "Email is already used");
            }

        })
        .catch(error => {
            console.error('Error:', error);
        });
    }


});
