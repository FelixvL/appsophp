<?php
    include "_appsofunctions.php";
    
    $antwoord = $_REQUEST['antwoord'];
    $vraagid = $_REQUEST['vraagid'];
    $studentid = $_REQUEST['studentid'];
    
    $conn= connectToDB();
    checkIfAlreadyInserted("antwoord", $vraagid, $studentid);
    $sql = "UPDATE `antwoord` SET `antwoordtekst` = '$antwoord' WHERE `vraag_id`=$vraagid AND `student_id`=$studentid ;";
    $conn->query($sql);
    
    echo $antwoord;
        
    function checkIfAlreadyInserted($table, $vraagid, $studentid){
        $conn= connectToDB();
        $sql = "SELECT * FROM $table WHERE student_id = $studentid AND vraag_id = $vraagid;";
        $result = $conn->query($sql);
        if($result->num_rows == 0){
            $sql = "INSERT INTO $table (`student_id`, `vraag_id`) VALUES ($studentid,$vraagid);";
            $result = $conn->query($sql);
            checkIfAlreadyInserted($table, $vraagid, $studentid);
        }else{
            return true;
        }
    }


