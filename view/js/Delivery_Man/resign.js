function isValid(pform){

    const password= pform.password.value;
    const passwordError = document.getElementById("resignError");
    passwordError.innerHTML="";
    
    let flag = true;
    if(password ==="")
    {
        passwordError.innerHTML= "Please fill up the field";
        passwordError.style.color="red";
        flag = false;
     
    }
     
    
     return flag;
    
    }