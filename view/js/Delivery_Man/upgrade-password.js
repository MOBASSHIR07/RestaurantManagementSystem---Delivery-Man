document.addEventListener('DOMContentLoaded', function (){

   

       
    //     fetch('update-password-controller.php', {
    //         method: 'POST',
    //         body: formData,
    //     })
        
    //     .then(response => response.json())
    //     .then(data => {
           
    //         if (data.success) {
                
    //             displaySuccessMessage("Password updated successfully!");
    //         } else {
               
    //             displayErrorMessage(data.error || "Password update failed");
    //         }
    //     })
    //     .catch(error => {
    //         console.error('Error:', error);
           
    //         displayErrorMessage("An error occurred during the password update.");
    //     });
    // });


    let prevpasswordField = document.getElementsByName("prevpassword")[0];
    prevpasswordField.addEventListener('keyup', function () {
        validateField(prevpasswordField, "prevpasswordError", "Field can not be empty");
    });


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