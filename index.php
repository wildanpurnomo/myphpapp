<?php
include_once 'koneksi.php';
include_once 'auth.php';

session_start();

if(isset($_SESSION['username'])){
    header('Location: mainpage.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="cont">
        <div class="title">
            <h3>"All in One" Side Project</h3>
        </div>
        <div class="form">
            <form method="POST" action=index.php>
                <input id="formUsername" type="text" name="username" placeholder="Username" required><br><br>
                <input id="formPassword" type="password" name="password" placeholder="Password" required> <br><br>
                <input id="formSubmitLogin" type="submit" name="submitLogin" value="Login"><br>
                <a id="linkRegister" href="register.php">Buat akun!</a>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['submitLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (auth($username, $password)) {
        $_SESSION['username'] = $username;
        header('Location: mainpage.php');
    }
}
?>