<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/kuisonline/koneksi.php';

if(!isset($_SESSION)){
    session_start();
}


if (!isset($_SESSION['username'])) {
    header('Location: /kuisonline/index.php');
}

function grade($username, $answers){  
    global $conn;

    $score = 0;
    $kunci = array("Garuda", "Jokowi", "Jakarta", "Wildan");

    for($i = 0 ; $i < 4 ; $i++){
        if($answers[$i] == $kunci[$i]){
            $score += 25;
        }
    }
    
    //input grade to DB and tes_status = true
    $sqlGradeInput = "UPDATE users SET nilai = '$score', tes_status = 1 WHERE username = ?";
    if($stmtGradeInput = $conn->prepare($sqlGradeInput)){
        $stmtGradeInput->bind_param('s', $_SESSION['username']);
        $stmtGradeInput->execute();
        $stmtGradeInput->close();
        return TRUE;
    }

    return FALSE;
}

?>