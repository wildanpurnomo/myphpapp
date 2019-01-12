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
</head>
<body>
<?php
echo "Logged in as " . $_SESSION['username'];
?>
<br>
<a href="?link=1">Mengerjakan soal</a>
<a href="?link=2">To-do list</a>
<a href="?link=3">Kembali ke login page</a>

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