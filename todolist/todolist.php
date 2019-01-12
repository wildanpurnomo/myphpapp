<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/kuisonline/koneksi.php';
include_once 'delete.php';

if (!isset($_SESSION['username'])) {
    header('Location: /kuisonline/index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-do-lists</title>
</head>
<body>
    <div class="form">
        <form action="" method="POST">
            <label id="lblActivity">Activity </label>
            <input type="text" name="activity" required>
            &nbsp;
            <label id="lblTime">Date</label>
            <input type="date" name="date" required>
            &nbsp;
            <input type="submit" name="submitLists" value="Submit">
            &nbsp;
            <a href= "../mainpage.php">Back</a>
        </form>
    </div>

    <hr>

    <div class="listsdisplayer">
        <h3>Your To-Do-Lists</h3>
        <div class="searchdate">
            <form action="" method="GET">
                <label id="lblSearchByDate">Search by date: </label>
                <input type="date" name="searchedDate">
                &nbsp;
                <input type="submit" name="searchButton" value="Search">
                &nbsp;
                <a href="?alllists=true">All lists</a>
            </form>
        </div>
        <br>
        <?php
        if(isset($_GET['searchButton'])) {
            $searchedDate = $_GET['searchedDate'];
            $sqlSearchByDate = "SELECT agenda, date(jadwal_agenda) FROM todolist WHERE username = ? AND jadwal_agenda = '$searchedDate' ORDER BY jadwal_agenda ASC";
            if($stmtSearchByDate = $conn->prepare($sqlSearchByDate)){
                $stmtSearchByDate->bind_param('s', $_SESSION['username']);
                $stmtSearchByDate->execute();
                $stmtSearchByDate->bind_result($agenda, $jadwal_agenda);
            }

            while ($stmtSearchByDate->fetch()) {
                $linkDelete = "<a class = 'hapusData' href = 'todolist.php?agenda=" . $agenda . "&jadwal_agenda=" . $jadwal_agenda ."'>Delete</a>";
                echo $agenda . "->" . $jadwal_agenda . " " . $linkDelete . "<br>";
            }
        }

        else if(isset($_GET['alllists'])){
            $sqlDisplayLists = "SELECT agenda, date(jadwal_agenda) FROM todolist WHERE username = ? ORDER BY jadwal_agenda ASC";
            if($stmtDisplayLists = $conn->prepare($sqlDisplayLists)){
                $stmtDisplayLists->bind_param('s', $_SESSION['username']);
                $stmtDisplayLists->execute();
                $stmtDisplayLists->bind_result($agenda, $jadwal_agenda);
    
                while ($stmtDisplayLists->fetch()) {
                    $linkDelete = "<a class = 'hapusData' href = 'todolist.php?agenda=" . $agenda . "&jadwal_agenda=" . $jadwal_agenda ."'>Delete</a>";
                    echo $agenda . "->" . $jadwal_agenda . " " . $linkDelete . "<br>";
                }
            }
        }

        else if(isset($_GET['agenda']) && isset($_GET['jadwal_agenda'])){
            $agenda = $_GET['agenda'];
            $jadwal = $_GET['jadwal_agenda'];
        
            if(deleteList($agenda, $jadwal)){
                $sqlDisplayLists = "SELECT agenda, date(jadwal_agenda) FROM todolist WHERE username = ? ORDER BY jadwal_agenda ASC";
                if($stmtDisplayLists = $conn->prepare($sqlDisplayLists)){
                    $stmtDisplayLists->bind_param('s', $_SESSION['username']);
                    $stmtDisplayLists->execute();
                    $stmtDisplayLists->bind_result($agenda, $jadwal_agenda);
        
                    while ($stmtDisplayLists->fetch()) {
                        $linkDelete = "<a class = 'hapusData' href = 'todolist.php?agenda=" . $agenda . "&jadwal_agenda=" . $jadwal_agenda ."'>Delete</a>";                    echo $agenda . "->" . $jadwal_agenda . " " . $linkDelete . "<br>";
                    }
                }
            }
        }

        else{
            $sqlDisplayLists = "SELECT agenda, date(jadwal_agenda) FROM todolist WHERE username = ? ORDER BY jadwal_agenda ASC";
            if($stmtDisplayLists = $conn->prepare($sqlDisplayLists)){
                $stmtDisplayLists->bind_param('s', $_SESSION['username']);
                $stmtDisplayLists->execute();
                $stmtDisplayLists->bind_result($agenda, $jadwal_agenda);
    
                while ($stmtDisplayLists->fetch()) {
                    $linkDelete = "<a class = 'hapusData' href = 'todolist.php?agenda=" . $agenda . "&jadwal_agenda=" . $jadwal_agenda ."'>Delete</a>";                    echo $agenda . "->" . $jadwal_agenda . " " . $linkDelete . "<br>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
<?php
if(isset($_POST['submitLists'])){
    $activity = $_POST['activity'];
    $date = $_POST['date'];

    $sqlListInput = "INSERT INTO todolist (username, agenda, jadwal_agenda) VALUES (?,'$activity','$date')";
    if($stmtListInput = $conn->prepare($sqlListInput)){
        $stmtListInput->bind_param('s', $_SESSION['username']);
        $stmtListInput->execute();
        $stmtListInput->close();
    }
    echo "<meta http-equiv='refresh' content='0'>";
}



