function isValid(pform) {
    const fileInput = pform.querySelector('input[name="myfile"]');
    const file = fileInput.value;
    const pftError = document.getElementById("pftError");
    pftError.innerHTML = "";

    let flag = true;

    if (file === "") {
        pftError.innerHTML = "Please select a file";
        pftError.style.color = "red";
        flag = false;
    }

    return flag;
}
