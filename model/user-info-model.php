<?php
require_once('database.php');

$row;

function login($email, $password){

    global $row;

    $con = dbConnection();
    $sql = $con -> prepare ("select * from UserInfo where email = ? and password = ?");
    $sql -> bind_param("ss", $email, $password);
    $sql -> execute();
    $result = $sql -> get_result();
    $count = mysqli_num_rows($result);

    if($count == 1) 
    {
    $row = mysqli_fetch_assoc($result);
    return $row;
    }
    else return null;


}

// function login($email, $password) {
//     global $row;

//     $con = dbConnection();
//     $sql = $con->prepare("SELECT * FROM UserInfo WHERE email = ? AND password = ?");
//     $sql->bind_param("ss", $email, $password);
//     $sql->execute();
//     $result = $sql->get_result();
//     $count = mysqli_num_rows($result);

//     if ($count == 1) {
//         $row = mysqli_fetch_assoc($result);

//         // Check if login is successful
//         if ($row) {
//             // Remove sensitive information before returning user data
//             unset($row['password']);

//             // Return a structured response
//             return array('success' => true, 'user' => $row);
//         }
//     }

//     // Login failed
//     return array('success' => false, 'error' => 'Invalid credentials');
// }



function addUser($fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role) {
    $con = dbConnection();
    $sql = "INSERT INTO UserInfo VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, 'Uploads/Images/default_pfp.png', ?, 'Active')";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssss", $fullname, $phone, $email, $address, $dob, $religion, $username, $password, $role);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    $con->close();
}

function uniqueEmail($email) {
    $con = dbConnection();
    $sql = "SELECT email FROM UserInfo WHERE email = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $count = $result->num_rows;

    if ($count == 1) {
        return false;
    } else {
        return true;
    }
    $con->close();
}

function getUserByMail($email) {
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Email = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
    $con->close();
}
function changePassword($id, $newpass) {
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET Password = ? WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $newpass, $id);

    if ($stmt->execute()) {
        $con->close();
        return true;
    } else {
        $errorDetails = $stmt->error;
        $con->close();
        error_log("Error updating password: $errorDetails");
        return false;
    }
}


// function changePassword($id, $newpass) {
//     $con = dbConnection();
//     $sql = "UPDATE UserInfo SET Password = ? WHERE UserID = ?";
    
//     $stmt = $con->prepare($sql);
//     $stmt->bind_param("si", $newpass, $id);

//     if ($stmt->execute()) {
//         return true;
//     } else {
//         return false;
//     }
//     $con->close();
// }
// function changePassword($id, $newpass) {
//     $con = dbConnection();
//     $sql = "UPDATE UserInfo SET Password = ? WHERE UserID = ?";
    
//     $stmt = $con->prepare($sql);
//     $stmt->bind_param("si", $newpass, $id);

//     if ($stmt->execute()) {
//         $con->close();
//         return true;
//     } else {
//         $con->close();
//         return false;
//     }
// }


function userInfo($id) {
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

function updateProfilePicture($imagename, $id) {
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET ProfilePicture = ? WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $imagename, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function updateUserInfo($id, $fullname, $email, $phone, $address, $religion, $username) {
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET Fullname = ?, Username = ?, Phone = ?, Email = ?, Religion = ?, Address = ? WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssssi", $fullname, $username, $phone, $email, $religion, $address, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function getAllDeliveryPerson() {
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role = 'Delivery Man' AND status = 'Active'";
    
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result;
}

function getAllCustomer() {
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role = 'Customer' AND status = 'Active'";
    
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result;
}

function getAllManager() {
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role = 'Manager' AND status = 'Active'";
    
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result;
}

function numberOfCustomer() {
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role='Customer' AND status='Active'";
    
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->num_rows;
}

function numberOfDeliveryMan() {
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE Role='Delivery Man' AND status='Active'";
    
    $stmt = $con->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    return $result->num_rows;
}

function getUsernameByID($id) {
    $con = dbConnection();
    $sql = "SELECT Username FROM UserInfo WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['Username'];
}

function banCustomer($id) {
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET status = 'Inactive' WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    
    $result = $stmt->execute();

    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function resign($id) {
    $con = dbConnection();
    $sql = "UPDATE UserInfo SET status = 'Resigning' WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);

    $result = $stmt->execute();

    if ($result) {
        return true;
    } else {
        return false;
    }
}
function getIncome($userID) {
    $con = dbConnection();
    $sql = "SELECT Income FROM UserInfo WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $userID);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['Income'];
}


function getIDByFullname($fullname) {
    $con = dbConnection();
    $sql = "SELECT UserID FROM UserInfo WHERE Fullname = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $fullname);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['UserID'];
    $con->close();
}
function addDeliveryBonus($userID) {
    $con = dbConnection();

    
    $sql = "UPDATE userinfo SET Income = Income + 40 WHERE UserID = ?";

    
    if ($stmt = mysqli_prepare($con, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "i", $userID);

        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt); 
            mysqli_close($con); 
            return true;
        } else {
            
            mysqli_stmt_close($stmt); 
            mysqli_close($con); 
            return false;
        }
    } else {
        
        mysqli_close($con); 
        return false;
    }
}
function userEmailCheck($email){
    global $row;

    $con = dbConnection();
    $sql = $con -> prepare ("select * from UserInfo where email = ?");
    $sql -> bind_param("s", $email,);
    $sql -> execute();
    $result = $sql -> get_result();
    $count = mysqli_num_rows($result);

    if($count == 1) 
    {
    $row = mysqli_fetch_assoc($result);
    return $row;
    }
    else return null;



}
// function userPasswordCheck($password){
//     global $row;

//     $con = dbConnection();
//     $sql = $con -> prepare ("select * from UserInfo where password = ?");
//     $sql -> bind_param("s", $password,);
//     $sql -> execute();
//     $result = $sql -> get_result();
//     $count = mysqli_num_rows($result);

//     if($count == 1) 
//     {
//     $row = mysqli_fetch_assoc($result);
//     return $row;
//     }
//     else return null;



// }
function userInformation($id) {
    $con = dbConnection();
    $sql = "SELECT * FROM UserInfo WHERE UserID = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id); 
    $stmt->execute();

    $result = $stmt->get_result();
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = array(
                'UserID' => $row["UserID"],
                'Username' => $row["Username"],
                'Fullname' => $row["Fullname"],
                'Phone' => $row["Phone"],
                'Email' => $row["Email"],
                'Address' => $row["Address"]
            );
        }
    }

    return $data;
}



?>
