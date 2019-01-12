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
</head>
<body>
<div class="title">
    <h3>"All in One" Side Project</h3>
</div>

<div class="form">
    <form method="POST" action = index.php >
        <label id="lblUsername">Username</label>
        <input type="text" name = "username" required><br><br>

        <label id="lblPassword" >Password</label>
        <input type="password" name = "password" required> <br><br>

        <input type="submit" name = "submitLogin" value = "Login">

        <a href="register.php">Buat akun!</a>
    </form>
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