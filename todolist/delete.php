<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/kuisonline/koneksi.php';

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['username'])){
    header('Location: /kuisonline/index.php');
}

function deleteList($agenda, $jadwal){
    global $conn;
    $sqlDeleteList = "DELETE FROM todolist WHERE agenda=? AND jadwal_agenda='$jadwal'";
    if($stmtDeleteList=$conn->prepare($sqlDeleteList)){
        $stmtDeleteList->bind_param('s', $agenda);
        $stmtDeleteList->execute();
        $stmtDeleteList->close();
        return TRUE;
    }

    return FALSE;
}





