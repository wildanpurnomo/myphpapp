<?php
include_once 'koneksi.php';

function auth($username, $password){ 
    global $conn;
    //check whether username exist
    $sqlUnameAuth = "SELECT username FROM users WHERE username = ?";
    if($stmtUnameAuth = $conn->prepare($sqlUnameAuth)){
        $stmtUnameAuth->bind_param('s', $username);
        $stmtUnameAuth->execute();
        $stmtUnameAuth->bind_result($catch);
        $stmtUnameAuth->fetch();

        if(!$catch){
            echo "Username is not exist.";
            return FALSE;
        }
        $stmtUnameAuth->close();
    }

    //check password
    $sqlPassAuth = "SELECT password FROM users WHERE username = ?";
    if($stmtPassAuth = $conn->prepare($sqlPassAuth)){
        $stmtPassAuth->bind_param('s', $username);
        $stmtPassAuth->execute();
        $stmtPassAuth->bind_result($catch);
        $stmtPassAuth->fetch();

        if(!password_verify($password, $catch)){
            echo "Password is wrong";
            return FALSE;
        }
        $stmtPassAuth->close();
    }
    return TRUE;
}
?>