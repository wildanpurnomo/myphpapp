<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/mainpage.css">
</head>
<body>
<div class="cont">
    <div class="headerUsername">
        <center>
            <h1>Welcome, <?php echo $_SESSION['username'];?> </h1>
        </center>
        </div>
        <div class="menu">
            <h2>Available menu: </h2>
            <ol>
                <li><a href="?link=1">Mengerjakan soal</a></li><br>
                <li><a href="?link=2">To-do list</a></li><br>
                <li><a href="?link=3">Kembali ke login page</a></li><br>
            </ol>
        </div>
    </div>
<?php
switch ((isset($_GET['link']) ? $_GET['link'] : '')) {
    case '1':
        header('Location: /kuisonline/kuis/kuispage.php');
        break;

    case '2':
        header('Location: /kuisonline/todolist/todolist.php');
        break;

    case '3':
        session_unset();
        session_destroy();
        header('Location: index.php');
        break;
    
    default:
        echo "<body>";
        break;

}
?>
</body>
</html>