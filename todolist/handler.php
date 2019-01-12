<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/kuisonline/koneksi.php';

if (!isset($_SESSION['username'])) {
    header('Location: /kuisonline/index.php');
}

function loadData(){
    global $conn;

    $sqlDisplayLists = "SELECT agenda, jadwal_agenda FROM todolist WHERE username = ?";
    if($stmtDisplayLists = $conn->prepare($sqlDisplayLists)){
        $stmtDisplayLists->bind_param('s', $_SESSION['username']);
        $stmtDisplayLists->execute();
        $stmtDisplayLists->bind_result($agenda, $jadwal_agenda);

        while ($stmtDisplayLists->fetch()) {
            echo $agenda . "->" . $jadwal_agenda . "<br>";
        }
    }
}