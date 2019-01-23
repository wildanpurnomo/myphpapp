<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/kuisonline/koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: /kuisonline/index.php');
}

$score = fetchScore($_SESSION['username']);

function fetchScore($username){
    global $conn;

    $sqlFetchScore = "SELECT nilai FROM users WHERE username = ?";
    if($stmtFetchScore = $conn->prepare($sqlFetchScore)){
        $stmtFetchScore->bind_param('s', $username);
        $stmtFetchScore->execute();
        $stmtFetchScore->bind_result($catch);
        $stmtFetchScore->fetch();

        return $catch;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/result.css">
</head>
<body>
    <div class="cont">
        <h1>
            <?php 
                echo "You have taken the quiz \n";
                echo "Your Score is " . $score . "\n";
                if($score == 100){
                    echo "Well Played!\n";
                }
            ?>  
            <a href= "../mainpage.php">Back</a>
        </h1>
    </div>
</body>
</html>