function isValid(pform){

const email= pform.email.value;
const emailError = document.getElementById("emailERROR");
emailError.innerHTML="";

let flag = true;
if(email =="")
{
  // alert("Before setting error message");
    emailError.innerHTML= "Please fill up the field";
    emailError.style.color="red";
    flag = false;
  // alert("After setting error message");
   // alert();

}
 else if (!email.includes("@")){

    emailError.innerHTML= "Email not valid";
    emailError.style.color="red";
    flag = false;
}

 return flag;

}