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
        



