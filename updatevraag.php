<?php
    include "_appsofunctions.php";
    
    $antwoordpredb = $_REQUEST['antwoord'];
    $vraagid = $_REQUEST['vraagid'];
    $studentid = $_REQUEST['studentid'];
    
    $conn= connectToDB();
    $antwoord = encodeDBtekst($antwoordpredb, $conn);
//    $antwoord = encodeDBtekst(nl2br($antwoordpredb), $conn);
    //checkIfAlreadyInserted("antwoord", $vraagid, $studentid);
    $sql = "UPDATE `fe_antwoord` SET `antwoordtekst` = '$antwoord' WHERE `vraag_id`=$vraagid AND `student_id`=$studentid ;";
    $conn->query($sql);
    $conn->close();
    echo $antwoordpredb;
        



