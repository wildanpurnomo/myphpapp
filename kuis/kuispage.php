<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/kuisonline/koneksi.php';
include_once 'grading.php';



if (!isset($_SESSION['username'])) {
    header('Location: /kuisonline/index.php');
}

if(checkTesStatus($_SESSION['username'])){
    header('Location: result.php');
}

function checkTesStatus($username){
    global $conn;
    $sqlStatusCheck = "SELECT tes_status FROM users WHERE username = ?";
    if($stmtStatusCheck = $conn->prepare($sqlStatusCheck)){
        $stmtStatusCheck->bind_param('s', $username);
        $stmtStatusCheck->execute();
        $stmtStatusCheck->bind_result($catch);
        $stmtStatusCheck->fetch();
        $stmtStatusCheck->close();

        if($catch == 1){
            return TRUE;
        }

        return FALSE;

    }
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuis Online</title>
</head>
<body>
<h3>Soal gampang gampangan</h3>

<div class="soal">

<form action="kuispage.php" method="POST">

<div class="no1">
1. Apa lambang Indonesia <br>
<input type="radio" name="question-1-answers" value="Singa"> Singa
<input type="radio" name="question-1-answers" value="Macan"> Macan
<input type="radio" name="question-1-answers" value="Garuda"> Garuda
</div>

<br>

<div class="no2">
2. Siapakah Presiden Indonesia saat ini <br>
<input type="radio" name="question-2-answers" value="SBY"> SBY
<input type="radio" name="question-2-answers" value="Jokowi"> Jokowi
<input type="radio" name="question-2-answers" value="#2019gantipresiden"> #2019gantipresiden
</div>

<br>

<div class="no3">
3. Dimana ibukota Indonesia? <br>
<input type="radio" name="question-3-answers" value="Jakarta"> Jakarta
<input type="radio" name="question-3-answers" value="Sidoarjo pls choose ths"> Sidoarjo pls choose this
<input type="radio" name="question-3-answers" value="Bali"> Bali
</div>

<br>

<div class="no4">
4. Developer project ini? <br>
<input type="radio" name="question-4-answers" value="Wildan"> Wildan
<input type="radio" name="question-4-answers" value="notWildan"> notWildan
<input type="radio" name="question-4-answers" value="!Wildan"> !Wildan
</div>

<br><br>

<input type="submit" name = "submitAnswers" value="Submit" onclick="return confirm('Are you sure')">
</form>

</div>

</body>
</html>

<?php
if(isset($_POST['submitAnswers'])){
    $answers = array($_POST['question-1-answers'], $_POST['question-2-answers'], $_POST['question-3-answers'], $_POST['question-4-answers']);

    if(grade($_SESSION['username'], $answers)){
        header('Location: result.php');
    }
}
?>