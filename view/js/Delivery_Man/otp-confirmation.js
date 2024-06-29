document.addEventListener('DOMContentLoaded', function (){

    let passwordField = document.getElementsByName("password")[0];
    passwordField.addEventListener('keyup', function () {
        validateField(passwordField, "passwordError", "Field can not be empty");
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

    function displayError(errorId, message) {
        let errorElement = document.getElementById(errorId);
        errorElement.innerText = message;
        errorElement.style.color = "red";
    }

    function clearError(errorId) {
        document.getElementById(errorId).innerText = "";
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

});