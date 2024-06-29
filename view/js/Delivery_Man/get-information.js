// function getusers(){
// let users;
// const xhttp = new XMLHttpRequest();
// xhttp.onload=function()
// {
// users = JSON.parse(xhttp.responseText);
// document.getElementById("data").innerHTML=users[0].UserID;
// document.getElementById("data").innerHTML=users[0].Username;
// document.getElementById("data").innerHTML=users[0].Fullname;
// document.getElementById("data").innerHTML=users[0].Phone;
// document.getElementById("data").innerHTML=users[0].Address;
// }
// xhttp.open("GET","http://localhost:8081/submission/view/api/user-information.php");
// xhttp.send();


// // view\api\user-information.php


// }
function getusers() {
    let users;
    const xhttp = new XMLHttpRequest();
    
    xhttp.onload = function() {
        users = JSON.parse(xhttp.responseText);

        let userInfo = "UserID: " + users[0].UserID + "<br>" +
                        "Username: " + users[0].Username + "<br>" +
                        "Fullname: " + users[0].Fullname + "<br>" +
                        "Phone: " + users[0].Phone + "<br>" +
                        "Address: " + users[0].Address;

        document.getElementById("data").innerHTML = userInfo;
    }

    xhttp.open("GET", "http://localhost:8081/submission/view/api/user-information.php");
    xhttp.send();
}
