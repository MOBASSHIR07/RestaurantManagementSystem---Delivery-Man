document.addEventListener('DOMContentLoaded', function () {

    console.log("DOM is ready");
    let form = document.getElementById('ajax');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        
        let formData = new FormData(form);

       
        fetch('../controller/edit-information-controller.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            
            if (data.success) {
                
                alert(data.message);
                
            } else {
                
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });

    let fullnameField = document.getElementsByName("fullname")[0];
    fullnameField.addEventListener('keyup', function () {
        validateField(fullnameField, "fullnameError", "Fullname is required");
    });

    let phoneField = document.getElementsByName("phone")[0];
         phoneField.addEventListener('keyup', function () {
    validatePhoneField(phoneField, "phoneError", "Phone is required", "Invalid phone number");
});

    let emailField = document.getElementsByName("email")[0];
    emailField.addEventListener('keyup', function () {
        validateEmail(emailField);
    });

    let addressField = document.getElementsByName("address")[0];
    addressField.addEventListener('keyup', function () {
        validateField(addressField, "addressError", "Address is required");
    });

   

    let religionField = document.getElementsByName("religion")[0];
    religionField.addEventListener('change', function () {
        validateSelectField(religionField, "religionError", "Religion is required");
    });

    let usernameField = document.getElementsByName("username")[0];
    usernameField.addEventListener('keyup', function () {
        validateField(usernameField, "usernameError", "Username is required");
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

   

    function displayError(errorId, message) {
        let errorElement = document.getElementById(errorId);
        errorElement.innerText = message;
        errorElement.style.color = "red";
    }

    function clearError(errorId) {
        document.getElementById(errorId).innerText = "";
    }

    /*function validateSignUpForm() {
        let fullnameIsValid = validateField(fullnameField, "fullnameError", "Fullname is required");
        let phoneIsValid = validateField(phoneField, "phoneError", "Phone is required");
        let emailIsValid = validateEmail(emailField);
        let addressIsValid = validateField(addressField, "addressError", "Address is required");
        let dobIsValid = validateField(dobField, "dateError", "Date of Birth is required");
        let religionIsValid = validateSelectField(religionField, "religionError", "Religion is required");
        let usernameIsValid = validateField(usernameField, "usernameError", "Username is required");
        let passwordIsValid = validateField(passwordField, "passwordError", "Password is required");
        let cpasswordIsValid = validateConfirmPassword(passwordField, cpasswordField, "cpasswordError", "Passwords do not match");

        return fullnameIsValid && phoneIsValid && emailIsValid && addressIsValid &&
            dobIsValid && religionIsValid && usernameIsValid && passwordIsValid && cpasswordIsValid;
    }*/

});
