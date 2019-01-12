<?php
include_once 'koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>

<form method="POST" action = "register.php" >
<label id="lblUsername">Username</label>
<input type="text" name = "username" required><br><br>

<label id="lblPassword">Password</label>
<input type="password" name = "password" required> <br><br>

<input type="submit" name = "submitRegister" value = "Register">
    
</body>
</html>

<?php
function checkUname($username){
    global $conn;
    $sqlUnameAuth = "SELECT username FROM users WHERE username = ?";

    if($stmtUnameAuth = $conn->prepare($sqlUnameAuth)){
        $stmtUnameAuth->bind_param('s', $username);
        $stmtUnameAuth->execute();
        $stmtUnameAuth->bind_result($catch);
        $stmtUnameAuth->fetch();

        if($catch == $username){
            echo "Username has been used.";
            return FALSE;
        }
        
        $stmtUnameAuth->close();
        return TRUE;
    }
}

if (isset($_POST['submitRegister'])){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if(checkuname($username)){
        //insert user data
        $sqlRegister = "INSERT INTO users (username, password) VALUES (?,?)";
        
        if ($stmtRegister = $conn->prepare($sqlRegister)) {
            $stmtRegister->bind_param("ss", $username, $password);
            $stmtRegister->execute();
            $stmtRegister->close();

            $_SESSION['username'] = $username;
            header('Location: mainpage.php');
        }
    }

}
?>

